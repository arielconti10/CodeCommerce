<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Products;
use CodeCommerce\Category;

/**
 * Class AdminProductsController
 * @package CodeCommerce\Http\Controllers
 */
class AdminProductsController extends Controller
{
    /**
     * @var Products
     */
    private $products;

    /**
     * AdminProductsController constructor.
     * @param Products $product
     */
    public function __construct(Products $product){
        $this->products = $product;
    }

    /**
     * Return a list from resources
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $products = $this->products->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Return view for create a new resource
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Category $category){
        $categories = $category->lists('name', 'id');

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Save a new resource in storage
     *
     * @param Requests\ProductRequest $productRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\ProductRequest $productRequest){
        $input = $productRequest->all();

        $input['featured'] = $productRequest->get('featured') ? true : false;
        $input['recommended'] = $productRequest->get('recommended') ? true : false;

        $product = $this->products->fill($input);
        $product->save();

        return redirect()->route('products');
    }

    /**
     * Return view for edit the specified resource
     *
     * @param Products $product
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Products $product, Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource from storage
     *
     * @param Requests\ProductRequest $productRequest
     * @param Products $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\ProductRequest $productRequest, Products $product)
    {
        $input = $productRequest->all();

        $input['featured'] = $productRequest->get('featured') ? true : false;
        $input['recommended'] = $productRequest->get('recommended')  ? true : false;

        $product->update($input);

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param Products $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products');
    }

    /**
     * @param Products $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function images(Products $product)
    {
        return view('admin.products.images', compact('product'));
    }

    public function createImage(Products $product)
    {
        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(Request $request, Products $product, ProductImage $productImage)
    {

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $productImage::create(['product_id' => $product->id, 'extension' => $extension]);

        Storage::disk
    }
}