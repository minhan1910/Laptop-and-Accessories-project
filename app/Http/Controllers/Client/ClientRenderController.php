<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class ClientRenderController extends Controller
{
    //
    private $product;
    private $category;
    private $brand;

    const idGamingTable = 1;
    const idOfficeTable = 2;

    public function __construct(Product $product, Category $category, Brand $brand)
    {
        $this->product = $product;
        $this->category = $category;
        $this->brand = $brand;
    }
    public function index()
    {
        $gamingList = $this
            ->category::find(self::idGamingTable)
            ->products
            ->sortByDesc('created_at')
            ->take(4);

        $officeList = $this
            ->category::find(self::idOfficeTable)
            ->products
            ->sortByDesc('created_at')
            ->take(4);

        $gamingId = $this
            ->category::find(self::idGamingTable)
            ->id;

        $officeId = $this
            ->category::find(self::idOfficeTable)
            ->id;

        return view('client.home', compact('gamingList', 'gamingId', 'officeList', 'officeId'));
    }
    public function getList($id)
    {
        $productList = $this
            ->category
            ->find($id)
            ->products()
            ->paginate(8);

        $productListName = $this
            ->category::find($id)
            ->name;

        return view('client.products', compact('productList', 'productListName'));
    }
    public function getDetail($id)
    {
        $product = $this->product::find($id);
        return view('client.productDetail', compact('product'));
    }

}
