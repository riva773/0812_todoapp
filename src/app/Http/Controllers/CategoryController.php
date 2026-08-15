<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('/category', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
        ]);
        return redirect('/categories')->with('successMessage', 'カテゴリを作成しました');
    }
    public function update(CategoryRequest $request)
    {
        $category = Category::find($request->id);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect('/categories')->with('successMessage', 'カテゴリを更新しました');
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect('/categories')->with('successMessage', 'カテゴリを削除しました');
    }
}
