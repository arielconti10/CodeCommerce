<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use CodeCommerce\Http\Requests;
use CodeCommerce\Category;

class AdminCategoriesController extends Controller
{
    private $categories;

    public function __construct(Category $category){
        $this->categories = $category;
    }

    public function index(){

        $categories = $this->categories->paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Requests\CategoryRequest $request){

        $input = $request->all();

        $category = $this->categories->fill($input);

        $category->save();

        return redirect()->route('categories');

    }

    public function destroy(Category $category)
    {

        $category->delete();

        return redirect()->route('categories');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Requests\CategoryRequest $categoryRequest, Category $category)
    {
        $input = $categoryRequest->all();

        $category->update($input);

        return redirect()->route('categories');
    }

}
