<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class AdminBrandController extends Controller
{
    protected $brand;
    //
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
    public function index()
    {
        $brands = $this->brand->paginate(4);
        return view('admin.brand.index', compact('brands'));
    }
    public function create()
    {
        return view('admin.brand.add');
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|min:3']);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'user_id' => Auth::user()->id,
            // 'created_by' => Auth::user()->name,
            // 'updated_by' => Auth::user()->name,
        ];
        $this->brand::create($data);
        return redirect()
            ->route('admin.brands.index')
            ->with('msg', 'Add new brand successfully')
            ->with('type', 'success');
    }
    public function edit(Request $request, $id)
    {
        $brandData = $this->brand::find($id);
        return view('admin.brand.edit', compact('brandData'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|min:3', 'slug' => 'required']);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->slug, '-'),
            'user_id' => Auth::user()->id
        ];
        $this->brand::find($id)->update($data);
        return redirect()->route('admin.brands.index')->with('msg', 'Update  brand successfully')->with('type', 'success');
    }
    public function delete($id)
    {
        $this->brand::destroy($id);
        return redirect()->route('admin.brands.index')->with('msg', 'Delete success fully')->with('type', 'success');
    }
}