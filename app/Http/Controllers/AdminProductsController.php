<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Products;
use CodeCommerce\Category;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Products $product){
        $this->products = $product;
    }

    public function index(){

        $products = $this->products->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create(Category $category){
        $categories = $category->lists('name', 'id');

        return view('admin.products.create', compact('categories'));
    }

    public function store(Requests\ProductRequest $productRequest){
        $input = $productRequest->all();

        $input['featured'] = $productRequest->get('featured') ? true : false;
        $input['recommended'] = $productRequest->get('recommended') ? true : false;

        $product = $this->products->fill($input);
        $product->save();

        return redirect()->route('products');
    }

    public function edit(Products $product, Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Requests\ProductRequest $productRequest, Products $product)
    {
        $input = $productRequest->all();

        $input['featured'] = $productRequest->get('featured') ? true : false;
        $input['recommended'] = $productRequest->get('recommended')  ? true : false;

        $product->update($input);

        return redirect()->route('products');
    }

    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products');
    }
}