@extends('layouts.dashboard.app')

@section('title','Product')

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/dashboard/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
        <form action="{{ isset($product) ? route('admin.product.update',$product->id) : route('admin.product.store') }}" method="POST">
           @csrf
            @isset($product)
            @method('PUT')
            @endisset
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            @isset($product)
                                Update Product
                                @else
                                Add Product
                            @endisset
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                            <label class="form-label">Product Name</label>
                            <div class="form-line">
                                <input type="text" id="name" class="form-control" name="product_name" placeholder="Product Name" value="{{ $product->product_name ?? old('product_name') }}">
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <label class="form-label">Product Stock</label>
                            <div class="form-line">
                                <input type="number" id="product_stock" class="form-control" name="product_stock" placeholder="Product Stock" value="{{ $product->product_stock ?? old('product_stock') }}">
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                          <div class="form-group form-float">
                            <div class="form-line">
                                <label for="type">Brand Name</label>
                                <select name="brand_id" id="type" class="form-control show-tick" data-live-search="true">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"  @isset($product) {{ $brand->id == $product->brand_id ? 'selected' : '' }} @endisset >{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             
                        </div>

                        <div class="form-group form-float">
                            <label class="form-label">Product Unit</label>
                            <div class="form-line">
                                <input type="text" id="product_unit" class="form-control" name="product_unit" placeholder="Product Unit" value="{{ $product->product_unit ?? old('product_unit') }}">
                            </div>
                        </div>

                           <div class="form-group form-float">
                            <label class="form-label">Product Unit Price</label>
                            <div class="form-line">
                                <input type="number" id="product_unit_price" class="form-control" name="product_unit_price" placeholder="Product Unit Price" value="{{ $product->product_unit_price ?? old('product_unit_price') }}">
                            </div>
                        </div>  

                           <div class="form-group form-float" style="display: none;">
                            <label class="form-label">Total</label>
                            <div class="form-line">
                                <input type="number" id="total" class="form-control" name="total" placeholder="total" value="{{ $product->total ?? old('total') }}">
                            </div>
                        </div>  

                        <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.product.index') }}">BACK</a>
                        <button type="submit" onclick="getTotalAmount()" class="btn btn-primary m-t-15 waves-effect">
                            @isset($product)
                                Update
                                @else
                                Submit
                            @endisset
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('js')
<!-- Select Plugin Js -->
<script src="{{ asset('assets/dashboard/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<script>

    function getTotalAmount() {
        let product_stock       = $('#product_stock').val();
        let product_unit_price  = $('#product_unit_price').val();
        let total = product_stock * product_unit_price;
        console.log(total)

     

        $('#total').val(total);

    }

    getTotalAmount()
    
</script>


@endpush
