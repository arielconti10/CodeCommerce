<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Products;
use CodeCommerce\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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

    public function storeImage(Requests\ProductImageRequest $request, Products $product, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $product->id, 'extension' => $extension]);

        Storage::disk('public')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id' => $product->id]);
    }

    public function destroyImage($id, ProductImage $productImage)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path() . '/uploads' . $image->id .'.'.$image->extension)){
            Storage::disk('public')->delete($image->id.'.'.$image->extension);
        }

        $product = $image->product;

        $image->delete();

        return redirect()->route('products.images', ['id' => $product->id]);

    }

}