<?php

namespace App\Http\Controllers\Admin;

use App\slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){
        $slider =slider::all();
        return view('admin.slider.index',compact('slider') );
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(Request $request){
        $slider =new slider;
        $slider->heading=$request->input('heading');
        $slider->description= $request-> input('description');
        $slider->description= $request-> input('link');
        $slider->description= $request-> input('link_name');
        if($request->hasfile('image'))
        {
            $file- $request-> file('image');
            $file= $request->file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('upload/slider/', $filename);
            $slider ->image=$filename; 
        }
        $slider-> status=$request->input('status') == true ? '1':'0';
        $slider->save();
        return redirect()->back()->with('status','Slider Addeed succesfully'); 
    }


    public function edit($id)
    {
        $slider =slider::find();
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id){
        $slider = slider::find($id);
        $slider->heading=$request->input('heading');
        $slider->description= $request-> input('description');
        $slider->description= $request-> input('link');
        $slider->description= $request-> input('link_name');
        if($request->hasfile('image'))
        {
            $destination ='upload/slider/'. $slider->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }

            $file- $request-> file('image');
            $file= $request->file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('upload/slider/', $filename);
            $slider ->image=$filename; 
        }
        $slider-> status=$request->input('status') == true ? '1':'0';
        $slider->save();
        return redirect()->back()->with('status','Slider Update succesfully'); 
    }
}
