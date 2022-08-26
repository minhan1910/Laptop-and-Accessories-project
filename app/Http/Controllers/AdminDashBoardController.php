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
    $users = DB::table('users')
    ->join('roles', 'users.role_id', '=', 'roles.id')
    ->select('roles.name', DB::raw('COUNT(users.role_id) as number'))
    ->groupBy('roles.name')
    ->get();

        return view('admin.dashboard.index',compact('data','users'));
    }

}
