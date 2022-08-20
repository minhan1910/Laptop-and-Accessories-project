<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recursive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    private $category;
    const defaultParentId = 0;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category
            ->latest()
            ->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        // foreach ($data as $category) {
        //     if ($category['parent_id'] === 0) {
        //         echo '<opion>' . $category['name'] . '</opion>';
        //         foreach ($data as $subCategory) {
        //             if ($subCategory['parent_id'] === $category['id']) {
        //                 echo '<opion>' . $subCategory['name'] . '</opion>';
        //             }
        //         }
        //     }
        // }
        // return view('category.add');
        $htmlOption = $this->getCategory(Self::defaultParentId);

        return view('admin.category.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-'),
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-'),
        ]);;

        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('admin.categories.index');
    }
}
