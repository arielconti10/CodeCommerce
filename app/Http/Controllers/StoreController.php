<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class StoreController extends Controller
{

    public function index(Category $category)
    {

        $product_featured = Product::featured()->get();
        $product_recommended = Product::recommended()->get();
        $categories = Category::all();

        if($category){
            $products = $category->products()->get();
            return view('store.index', compact('categories', 'products'));

        }

        return view('store.index', compact('categories', 'product_featured', 'product_recommended'));
    }

    public function productsByCategory(Category $category)
    {
        $categories = Category::all();
        $products = $category->products()->get();
        return view('store.index', compact('categories', 'products', 'category'));
    }


}
