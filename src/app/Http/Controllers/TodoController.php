<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\Category;


use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }

    public function store(TodoRequest $request)
    {

        $category = Category::find($request->category_id);
        Todo::create([
            'content' => $request->content,
            'category_id' => $category->id
        ]);
        return redirect('/')->with('successMessage', 'Todoを作成しました');
    }

    public function update(TodoRequest $request)
    {
        $todo = Todo::find($request->id);
        $todo->update([
            'content' => $request->content,
        ]);
        return redirect('/')->with('successMessage', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->delete();
        return redirect('/')->with('successMessage', 'Todoを削除しました');
    }
}
