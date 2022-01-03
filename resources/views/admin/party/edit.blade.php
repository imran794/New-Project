@extends('layouts.dashboard.app')

@section('title','Add Order')

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/dashboard/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.party.update',$edit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Update Order
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                            <label class="form-label">Party Name</label>
                            <div class="form-line">
                                <input type="text" id="name" class="form-control" name="party_name" value="{{ $edit->party_name }}">
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <label class="form-label">Party Number</label>
                            <div class="form-line">
                                <input type="text" id="number" class="form-control" name="party_number" value="{{ $edit->party_number }}">
                            </div>
                        </div> 
                         <div class="form-group form-float">
                            <label class="form-label">Alternate Number</label>
                            <div class="form-line">
                                <input type="text" id="address" class="form-control" name="party_alternate_number" value="{{ $edit->party_alternate_number }}">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Party Address</label>
                            <div class="form-line">
                                <textarea id="address" class="form-control" name="party_address" placeholder="Party Address">{{ $edit->party_address }}</textarea>
                                
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> Party Type And Code</h2>
                    </div>
                    <div class="body">
                          <div class="form-group form-float">
                            <div class="form-line">
                                <label for="type">Select Category</label>
                                <select name="party_type" id="type" class="form-control show-tick" data-live-search="true">
                                    <option value="">Select One</option>
                                    <option value="customer" {{ (isset($edit->party_type) == 'customer' ? 'selected' : '') }}>Customer</option>
                                    <option value="supplier" {{ (isset($edit->party_type) == 'supplier' ? 'selected' : '') }}>Supplier</option>
                                   
                                </select>
                            </div>
                             
                        </div>
                           <div class="form-group form-float">
                            <label class="form-label">Party Code</label>
                            <div class="form-line">
                                <input type="text" id="code" class="form-control" name="party_code" value="{{ $edit->party_code }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <label class="form-label">Credit Limi</label>
                            <div class="form-line">
                                <input type="text" id="credit_limit" class="form-control" name="party_credit_limit" value="{{ $edit->party_credit_limit }}">
                            </div>
                        </div>

                        <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.party.create') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>

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
