<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class ClientRenderController extends Controller
{
    //
    private $product;
    private $category;
    private $brand;
    public function __construct(Product $product,Category $category,Brand $brand)
    {
        $this->product = $product;
        $this->category = $category;
        $this->brand = $brand;
    }
    public function index()
    {
        $gamingList = $this->category::find(1)->products->sortByDesc('created_at')->take(4);
        $officeList =$this->category::find(2)->products->sortByDesc('created_at')->take(4);
        $gamingId = $this->category::find(1)->id;
        $officeId = $this->category::find(2)->id;
        return view('client.home',compact('gamingList','gamingId','officeList','officeId'));
    }
    public function getList($id)
    {
        $productList = $this->category->find($id)->products()->paginate(8);
        $productListName = $this->category::find($id)->name;
        return view('client.products',compact('productList','productListName'));
    }
    public function getDetail($id)
    {
        $product = $this->product::find($id);
        return view('client.productDetail',compact('product'));
    }
}
