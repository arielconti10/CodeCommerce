<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
/**
 * Class AdminProductsController
 * @package CodeCommerce\Http\Controllers
 */
class AdminProductsController extends Controller
{
    /**
     * @var Product
     */
    private $products;

    /**
     * AdminProductsController constructor.
     * @param Product $product
     */
    public function __construct(Product $product){
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
        $tags = array_map('trim', explode(',', $input['tags']));

        $product = $this->products->fill($input);

        $product->save();

        $this->storeTags($tags, $product->id);

        return redirect()->route('products');
    }

    public function storeTags($inputTags, $id)
    {
        $tag = new Tag();

        foreach($inputTags as $key => $value){
            $newTag = $tag->firstOrCreate(['name' => $value]);
            $idTags[] = $newTag->id;
        }

        $product = $this->products->find($id);
        $product->tags()->sync($idTags);

    }

    /**
     * Return view for edit the specified resource
     *
     * @param Product $product
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $tags = $product->getTagListAttributes();

        return view('admin.products.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource from storage
     *
     * @param Requests\ProductRequest $productRequest0
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\ProductRequest $productRequest, Product $product)
    {
        $input = $productRequest->all();

        $input['featured'] = $productRequest->get('featured') ? true : false;
        $input['recommended'] = $productRequest->get('recommended')  ? true : false;
        $tags = array_map('trim', explode(',', $input['tags']));

        $product->update($input);

        $this->storeTags($tags, $product->id);


        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function images(Product $product)
    {
        return view('admin.products.images', compact('product'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createImage(Product $product)
    {
        return view('admin.products.create_image', compact('product'));
    }

    /**
     * @param Requests\ProductImageRequest $request
     * @param Product $product
     * @param ProductImage $productImage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeImage(Requests\ProductImageRequest $request, Product $product, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id' => $product->id, 'extension' => $extension]);
        Storage::disk('public')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id' => $product->id]);
    }

    /**
     * @param $id
     * @param ProductImage $productImage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyImage($id, ProductImage $productImage)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)){
            Storage::disk('public')->delete($image->id.'.'.$image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id' => $product->id]);
    }

}