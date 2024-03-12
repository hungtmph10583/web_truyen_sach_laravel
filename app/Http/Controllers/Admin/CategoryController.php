<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function __construct() {
        view()->share('activeCategory', TRUE);
    }

    public function index()
    {
        $categories = Category::select('id','c_name','c_slug','c_status')->latest('id')->paginate(20);
        view()->share('activeCategoryList', TRUE);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        view()->share('activeCategoryAdd', TRUE);
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'c_name' => 'required|unique:categories,c_name|max:255'
            ],
            [
                'c_name.required' => 'Enter category name!',
                'c_name.unique'   => 'Category name already exists!',
                'c_name.max'      => 'Category names cannot exceed 255 characters!'
            ]);
        $category = new Category();
        $category->fill($request->all());
        $category->c_slug = \Str::slug($request->c_name);
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'c_name' => [
                'required',
                Rule::unique('categories')->ignore($id)
            ],
        ],[
            'c_name.required' => 'Enter category name!',
            'c_name.unique'   => 'Category name already exists!'
        ]);

        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('danger', 'Story updated failed!')->withInput();
        }
        $category->fill($request->all());
        $category->c_slug = \Str::slug($request->c_name);
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('danger', 'Story deleted failed!')->withInput();
        }
        if (count($category->stories) > 0) {
            return redirect()->back()->with('danger', 'You cannot delete a category that has stories assigned')->withInput();
        }
        $category->delete();
        return redirect()->back()->with('success', 'Story deleted successfully')->withInput();
    }
}
