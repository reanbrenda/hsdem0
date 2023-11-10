<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $category = Category::firstOrCreate([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.create');
    }

    public function show(string $id)
    {
        $category = Category::find($id);

        return view('admin.categories.show', [
            'category' => $category,
        ]);
    }

    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.show', $category->id);
    }

   public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
