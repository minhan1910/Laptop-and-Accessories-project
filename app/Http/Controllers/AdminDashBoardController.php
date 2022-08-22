<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashBoardController extends Controller
{
    //
    public function index()
    {
    $data= DB::table('products')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->select('categories.name', DB::raw('COUNT(products.category_id) as number'))
    ->groupBy('categories.name')
    ->get();
        return view('admin.dashboard.index',compact('data'));
    }
}
