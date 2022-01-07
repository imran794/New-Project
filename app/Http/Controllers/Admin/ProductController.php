<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use carbon\carbon;
use Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.product.index',[
            'products'  => Product::latest('id')->where('deleted','=','no')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create',[
            'brands'  => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'          => 'required',
            'product_stock'         => 'required',
            'brand_id'              => 'required',
            'product_unit'          => 'required',
            'product_unit_price'    => 'required',
        ]);

        $product = New Product();
        $product->product_name         = $request->product_name;
        $product->product_stock        = $request->product_stock;
        $product->brand_id             = $request->brand_id;
        $product->product_unit         = $request->product_unit;
        $product->product_unit_price   = $request->product_unit_price;
        $product->total                = $request->total;
        $product->created_by           = Auth::id();
        $product->created_date         = carbon::now();
        $product->save();

      Toastr::success('Product Successfully Saved :)' ,'Success');
       return redirect()->route('admin.product.index');
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
         $brands  = Brand::all();
         return view('admin.product.create',compact('brands','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name'          => 'required',
            'product_stock'         => 'required',
            'brand_id'              => 'required',
            'product_unit'          => 'required',
            'product_unit_price'    => 'required',
        ]);

        $product->product_name         = $request->product_name;
        $product->product_stock        = $request->product_stock;
        $product->brand_id             = $request->brand_id;
        $product->product_unit         = $request->product_unit;
        $product->product_unit_price   = $request->product_unit_price;
        $product->total                = $request->total;
        $product->updated_by           = Auth::id();
        $product->updated_date         = carbon::now();
        $product->save();

      Toastr::success('Product Successfully Updated :)' ,'Success');
       return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
            $product->deleted_by   = Auth::id();
            $product->deleted             = 'yes';
            $product->deleted_date        = carbon::now();
            $product->status              = 'Inactive';
            $product->save();


      Toastr::success('Product Deleted :)' ,'Success');
       return redirect()->route('admin.product.index');
    }
}
