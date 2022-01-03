@extends('layouts.dashboard.app')

@section('title','Brand')

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/dashboard/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            @isset($brand)
                                Update Brand
                              @else
                              Add New Brand
                            @endisset
                        </h2>
                    </div>
                     <form action="@isset($brand) {{ route('admin.brand.update',$brand->id) }} @else {{ route('admin.brand.store') }} @endisset" method="POST">
                      @csrf
                      @isset($brand)
                         @method('PUT')
                      @endisset

                    <div class="body">
                        <div class="form-group form-float">
                            <label class="form-label">Brand Name</label>
                            <div class="form-line">
                                <input type="text" id="name" class="form-control" name="brand_name" placeholder="Brand Name" value="{{ $brand->brand_name ?? old('brand_name') }}">
                            </div>
                        </div>

                        <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.brand.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                    </div>
                </div>
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


@endpush
