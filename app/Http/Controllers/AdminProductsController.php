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

        return view('admin_products', compact('products'));
    }
}