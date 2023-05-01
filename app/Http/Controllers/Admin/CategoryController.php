<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function index()
    {
        Gate::authorize('app.categories.index');
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        Gate::authorize('app.categories.create');
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.categories.create');
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'slug'  => Str::slug($request->slug),
            'meta_title'  => Str::slug($request->meta_title),
            'meta_desc'  => Str::slug($request->meta_desc),
            'status'  => Str::slug($request->status),
        ];

        Category::create($data);
        return redirect()->route('admin.categories.index');
    }

    public function edit(Request $request,$id)
    {
        $category = Category::findOrfail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'slug'  => Str::slug($request->slug),
            'meta_title'  => Str::slug($request->meta_title),
            'meta_desc'  => Str::slug($request->meta_desc),
            'status'  => Str::slug($request->status),
        ];

        Category::where('id',$id)->update($data);
        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        Category::findOrfail($id)->delete();
        return redirect()->back();
    }
}
