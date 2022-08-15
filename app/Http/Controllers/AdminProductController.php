<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    use StorageImageTrait;

    const defaultParentId = 0;
    private $category;
    private $product;
    private $productImage;
    private $productTag;
    private $tag;

    public function __construct(
        Category $category,
        Product $product,
        ProductImage $productImage,
        ProductTag $productTag,
        Tag $tag,
    ) {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $this->tag = $tag;
    }

    public function index()
    {
        // Dùng eager loading ở đây
        $products = $this->product::with('category')
            ->latest()
            ->paginate(3);

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory(Self::defaultParentId);
        return view('admin.product.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {

        try {
            //Có thể dùng $request->all()
            // DB::enableQueryLog();
            DB::beginTransaction();

            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }

            // Insert into products table
            $product = $this->product->create($dataProductCreate);

            // Insert into product_images table
            $productImages = [];

            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $file) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($file, 'product');
                    $productImages[] = [
                        'product_id' => $product->id,
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ];
                }
            }

            $product->images()->insert($productImages);

            // Insert tags for the product
            $tagIds = [];
            if (!empty($request->tags))
                foreach ($request->tags as $tag) {
                    // Insert into tags not duplicate
                    $tagInstance = Tag::firstOrCreate(['name' => $tag]);
                    $tagIds[] = $tagInstance->id;
                }

            // Insert product_tag tbale
            if (!empty($tagIds)) {
                $product->tags()->attach($tagIds);
            }

            DB::commit();
            // dd(DB::getQueryLog());
            // return redirect()->route('product.index');
            $msg = 'Add product successfully !';
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            $msg = 'Add product failed !';
        }
        return redirect()->route('product.index')->msg('msg', $msg);
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $product = $this->product::with('tags')->find($id);
        $htmlOption = $this->getCategory($product->category->id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            //Có thể dùng $request->all()
            // DB::enableQueryLog();
            DB::beginTransaction();

            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }

            // Insert into products table
            $this
                ->product
                ->find($id)
                ->update($dataProductUpdate);

            $product =  $this
                ->product
                ->find($id);

            // Insert into product_images table
            $productImages = [];
            if ($request->hasFile('image_path')) {
                // Delete xong insert
                $this->productImage->where('product_id', $id)->delete();

                foreach ($request->image_path as $file) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($file, 'product');
                    $productImages[] = [
                        'product_id' => $product->id,
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ];
                }
            }
            $product->images()->insert($productImages);

            // Insert tags for the product
            $tagIds = [];
            if (!empty($request->tags))
                foreach ($request->tags as $tag) {
                    // Insert into tags not duplicate bên kia value phải là name
                    $tagInstance = Tag::firstOrCreate(['name' => $tag]);
                    $tagIds[] = $tagInstance->id;
                }

            // Insert product_tag tbale
            if (!empty($tagIds)) {
                $product->tags()->sync($tagIds);
            }

            DB::commit();
            // dd(DB::getQueryLog());
            // return redirect()->route('product.index');
            $msg = 'Add product successfully !';
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            $msg = 'Add product failed !';
        }
        return redirect()->route('admin.products.index')->with('msg', $msg);
    }

    public function delete($id)
    {
        try {

            // Tạm thời xóa như vậy để sau này xong các cái khác rùi handle trường hơp này sau
            // vì chưa có liên kết Fk
            $this
                ->product
                ->find($id)
                ->delete();

            /**
             * product có n tags
             *            n images
             *            n orders
             *            n order - 1 customer          
             */

            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $e) {

            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}