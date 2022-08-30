<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ApiController extends Controller
{
    //
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function ajaxSearch()
    {
        if (request('key')) {
            $key = request('key');
            return $this->product::where('name', 'like', '%' . $key . '%')->get();
        }
    }
}