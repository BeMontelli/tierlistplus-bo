<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * INDEX *
     */
    public function index()
    {
        $categories = Category::all()->sortByDesc('id');
        return view('categories.index',
            [
                'title' => __('Categories'),
                'description' => __('Full <i>Categories</i> listing'),
                'addTxt' => __('Create categorie'),
                'noresults' => __('No Category found'),
                'categories' => $categories
            ]
        );
    }

    /**
     * SHOW *
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }

    /**
     * CREATE / STORE *
     */
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
        Category::create($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * EDIT / UPDATE *
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * DESTROY *
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->tierlists()->detach();

        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
