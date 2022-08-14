<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Http\Requests\SliderEditRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SliderAdminController extends Controller
{
    use StorageImageTrait;

    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this
            ->slider
            ->paginate(2);

        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        $dataInsert = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // Handle uplaod file 
        $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
        // dd($dataImageSlider);
        if (!empty($dataImageSlider)) {
            $dataInsert['image_path'] = $dataImageSlider['file_path'];
            $dataInsert['image_name'] = $dataImageSlider['file_name'];
        }

        $this
            ->slider
            ->create($dataInsert);

        return redirect()
            ->route('admin.sliders.index');
    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => [
                    'required',
                    Rule::unique('sliders')->ignore($id, 'id'),
                ],
                'description' => 'required',
                'image_path' => 'required'
            ]
        );

        $dataUpdate = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // Handle uplaod file 
        $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
        // dd($dataImageSlider);
        if (!empty($dataImageSlider)) {
            $dataUpdate['image_path'] = $dataImageSlider['file_path'];
            $dataUpdate['image_name'] = $dataImageSlider['file_name'];
        }

        $this
            ->slider
            ->find($id)
            ->update($dataUpdate);

        return redirect()
            ->route('admin.sliders.index')
            ->with('msg', 'Update slider successfully !');
    }

    public function delete($id)
    {
        $this
            ->slider
            ->find($id)
            ->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('msg', 'Delete slider successfully !!');
    }
}