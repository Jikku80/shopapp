<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //middleware
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(10);
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'price' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        if ($request->hasFile('cover_image')) {
            //get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //GET just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        //create Product
        $product = new Product;
        $product->title = $request->input('title');
        $product->body = $request->input('body');
        $product->price = $request->input('price');
        $product->user_id = auth()->user()->id;
        $product->cover_image = $fileNameToStore;
        $product->save();

        return redirect('/products')->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        //check for correct user
        if (auth()->user()->id !== $product->user_id) {
            return redirect('/products')->with('error', 'unAuthorized page');
        }
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'price' => 'required'
        ]);

        if ($request->hasFile('cover_image')) {
            //get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //GET just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/storage/cover_images', $fileNameToStore);
        }

        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->body = $request->input('body');
        $product->price = $request->input('price');
        if ($request->hasFile('cover_image')) {
            $product->cover_image = $fileNameToStore;
        }
        $product->save();

        return redirect('/products')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        //check for correct user
        if (auth()->user()->id !== $product->user_id) {
            return redirect('/products')->with('error', 'unAuthorized page');
        }

        if ($product->cover_image != 'noimage.jpg') {
            //Delete Image
            Storage::delete('storage/cover_images/' . $product->cover_image);
        }

        $product->delete();
        return redirect('/products')->with('success', 'Product Removed Successfully');
    }
}
