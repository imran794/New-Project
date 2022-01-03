<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use carbon\carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index',[
            'brands'  => Brand::latest('id')->where('deleted','=','no')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'brand_name'      => 'nullable|string',
        ]);

        $brand = New Brand();
        $brand->brand_name       = $request->brand_name;
        $brand->created_by       = Auth::id();
        $brand->created_date     = carbon::now();
        $brand->save();

      Toastr::success('Order Successfully Saved :)' ,'Success');
       return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.create',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        
         $request->validate([
            'brand_name'      => 'nullable|string',
        ]);

        $brand->brand_name       = $request->brand_name;
        $brand->updated_by       = Auth::id();
        $brand->updated_date     = carbon::now();
        $brand->save();

      Toastr::success('Brand Successfully Update :)' ,'Success');
       return redirect()->route('admin.brand.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
            $brand->deleted_by   = Auth::id();
            $brand->deleted      = 'yes';
            $brand->deleted_date = carbon::now();
            $brand->status       = 'Inactive';
            $brand->save();


      Toastr::success('Brand Deleted :)' ,'Success');
       return redirect()->route('admin.brand.index');
    }
}
