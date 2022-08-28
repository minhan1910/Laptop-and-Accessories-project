<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use  App\Models\Brand;
use App\Models\ProductImage;
use App\Http\Requests\ProductAddRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\StorageImageTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    //
    private $product;
    private $category;
    private $productImage;
    use StorageImageTrait;
    public function __construct(Product $product, Category $category, ProductImage $productImage, Brand $brand)
    {
        $this->product = $product;
        $this->category = $category;
        $this->productImage = $productImage;
        $this->brand = $brand;
    }

    public function resetSearch()
    {
        return redirect()->route('admin.products.index');
    }

    public function index(Request $request)
    {
        $data['q'] = $request->query('q');
        $data['category_id'] = $request->query('category_id');
        $data['brand_id'] = $request->query('brand_id');
        $data['operator'] = $request->query('operator');
        $data['start'] = $request->query('start');
        $data['end'] = $request->query('end');
        $data['price_start'] = $request->query('price_start');
        $data['price_end'] = $request->query('price_end');
        $data['categories'] = Category::where('parent_id', '<>', 0)->get();
        // $data['categories'] = Category::all();
        // $category_parents = Category::where('parent_id', '=', 0)->get();
        // $category_parent_names = [];
        // $category_parent_ids = [];
        // foreach ($category_parents as $category_parent) {
        //     $category_parent_ids[] = $category_parent->parent_id;
        //     $category_parent_names[] = $category_parent->name;
        // }
        $data['brands'] = Brand::all();
        $data['operators'] = [
            '=' => 'equal to ( = )',
            '<>' => 'not equal to ( != )',
            '>' => 'greater than ( > )',
            '>=' => 'greater than or equal to ( >= )',
            '<' => 'less than ( < )',
            '<=' => 'less than or equal to ( <= )',
            'between' => 'between',
        ];

        $query = Product::select(
            'products.*',
        )
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where(function (Builder $query) use ($data) {
                $query->where('products.name', 'like', "%{$data['q']}%");
                $query->orWhere('brands.name', 'like', "%{$data['q']}%");
                $query->orWhere('categories.name', 'like', "%{$data['q']}%");
            });

        if ($data['category_id']) {
            $category = Category::find($data['category_id']);
            // if (!in_array($category->parent_id, $category_parent_ids))
            $query->where('categories.id', '=', $data['category_id']);
        }
        if ($data['brand_id'])
            $query->where('brands.id', '=', $data['brand_id']);
        if ($data['start'])
            $query->where('products.created_at', '>=', $data['start']);
        if ($data['end'])
            $query->where('products.created_at', '<=', $data['end']);

        if ($data['operator'])
            if ($data['operator'] === 'between')
                $query->whereBetween('products.price', [$data['price_start'], $data['price_end']]);
            else
                $query->where('p;roducts.price', $data['operator'], $data['price_start']);

        $data['productList'] = $query
            ->paginate(8)
            ->withQueryString();

        return view('admin.product.index', $data);
    }
    public function create()
    {
        $categoryList = $this->category::all();
        $brandList = $this->brand::all();
        return view('admin.product.add', compact('categoryList', 'brandList'));
    }
    public function store(ProductAddRequest $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            // Insert into products table
            $product = $this
                ->product
                ->create($dataProductCreate);
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
            $product
                ->images()
                ->insert($productImages);

            $msg = 'Add product successfully !';
            $err = null;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $err = 'Add product failed !';
            $msg = null;
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
        }
        return redirect()
            ->route('admin.products.index')
            ->with('msg', $msg)
            ->with('err', $err)
            ->with('type', 'success');
    }
    public function edit($id)
    {
        $categoryList = $this->category::all();
        $brandList = $this->brand::all();
        $productInfo = $this->product::find($id);
        return view('admin.product.edit', compact('categoryList', 'productInfo', 'brandList'));
    }
    public function update(ProductAddRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            } else {
                $dataProductUpdate['feature_image_name'] =  $this->product::find($id)->feature_image_name;
                $dataProductUpdate['feature_image_path'] =  $this->product::find($id)->feature_image_path;
            }
            // Insert into products table
            $this
                ->product
                ->find($id)
                ->update($dataProductUpdate);

            $product = $this
                ->product
                ->find($id);
            // Insert into product_images table
            $productImages = [];
            if ($request->hasFile('image_path')) {
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
            DB::commit();
            $msg = 'Update product successfully !';
        } catch (\Exception $e) {
            DB::rollback();
            $msg = 'Add product failed !';
        }
        return redirect()->route('admin.products.index')->with('msg', $msg)->with('type', 'success');
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $this->productImage->where('product_id', $id)->delete();
            $this->product::destroy($id);
            DB::commit();
            $msg = 'Delete product with id: ' . $id . ' successfully!';
            $type = 'success';
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            $type = 'danger';
        }
        return back()->with('msg', $msg)->with('type', $type);
    }
}