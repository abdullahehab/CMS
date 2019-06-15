<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('category.index')->with('categories', Category::all());
    }

    public function create()
    {
        return view('category.create');

    }

    public function store(CategoryRequest $request)
    {


        $data = [
            'name' => $request -> name
        ];

        Category::create($data);

        return redirect(route('categories'));
    }

    public function show(Category $category)
    {

    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $validatedData = \request()->validate([
           'name' => 'required'
        ]);

        $category->update($validatedData);

        return redirect(route('categories'));
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('categories'));
    }



}
