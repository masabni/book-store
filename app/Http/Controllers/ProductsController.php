<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Author;
use App\Models\AuthorRole;
use App\Models\Category;
use App\Models\CoverType;
use App\Models\ProductSize;
use App\Models\ProductType;
use App\Models\Publisher;
use App\Models\PublisherRole;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['author', 'author_role', 'category', 'cover_type', 'product_size', 'product_type', 'publisher', 'publisher_role', 'sub_category'])
            ->paginate(5);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $author_roles = AuthorRole::all();
        $categories = Category::all();
        $cover_types = CoverType::all();
        $product_sizes= ProductSize::all();
        $product_types = ProductType::all();
        $publishers = Publisher::all();
        $publisher_roles = PublisherRole::all();
        return view('product.create', compact(['authors', 'author_roles', 'categories', 'cover_types', 'product_sizes',
            'product_types', 'publishers', 'publisher_roles']));
    }

    public function getSubCategory(Request $request)
    {
        $html = ['<option disabled="disabled" selected>Choose one</option>'];
        try {
            $sub_categories = SubCategory::where('category_id', $request->input('category'))->get();
            foreach ($sub_categories as $datum) {
                $html[] = '<option value=' . $datum->id . '>' . $datum->name . '</option>';
            }
        } catch (\Exception $e) {
            session()->flash('flash_message_success', trans('auth.error_occurred'));
            return ['error' => $e];
        }
        return ['success' => true, 'html' => $html];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->except(['_token', 'image']);
        if($request->image)
            $data['image'] = $request->image->store('products');
        Product::create($data);
        session()->flash('flash_message_success', trans('auth.save_success'));
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $authors = Author::all();
        $author_roles = AuthorRole::all();
        $categories = Category::all();
        $sub_categories = SubCategory::where('category_id', $product->category_id)->get();
        $cover_types = CoverType::all();
        $product_sizes= ProductSize::all();
        $product_types = ProductType::all();
        $publishers = Publisher::all();
        $publisher_roles = PublisherRole::all();
        return view('product.update', compact(['authors', 'author_roles', 'categories', 'sub_categories', 'cover_types', 'product_sizes',
            'product_types', 'publishers', 'publisher_roles']))->with(['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->except(['_token', 'image']);
        if($request->image)
            $data['image'] = $request->image->store('products');
        $product->update($data);
        session()->flash('flash_message_success', trans('auth.save_success'));
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        \Storage::delete($product->image);
        $product->delete();
        return redirect('/products');
    }
}
