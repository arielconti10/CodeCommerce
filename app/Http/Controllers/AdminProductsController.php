<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

use CodeCommerce\Products;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Products $product){
        $this->products = $product;
    }

    public function index(){

        $products = $this->products->all();

        return view('admin.products.index', compact('products'));
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(Requests\ProductRequest $productRequest){
        $input = $productRequest->all();

        $input['featured'] = $productRequest->get('featured') ? true : false;
        $input['recommended'] = $productRequest->get('recommended') ? true : false;

        $product = $this->products->fill($input);

        $product->save();

        return redirect()->route('product.index');
    }

    public function edit(Products $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Requests\ProductRequest $productRequest, Products $product)
    {
        $input = $productRequest->all();

        $input['featured'] = $productRequest->get('featured') ? true : false;
        $input['recommended'] = $productRequest->get('recommended')  ? true : false;

        $product->update($input);

        return redirect()->route('product.index');
    }

    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}