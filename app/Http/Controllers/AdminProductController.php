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
    public function index()
    {
        $productList = $this
            ->product
            ->paginate(4);
        return view('admin.product.index', compact('productList'));
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