@extends('layouts.dashboard.app')

@section('title','Add Party')

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/dashboard/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.party.store') }}" method="POST">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add New Party
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                            <label class="form-label">Party Name</label>
                            <div class="form-line">
                                <input type="text" id="name" class="form-control" name="party_name" placeholder="Party Name">
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <label class="form-label">Party Number</label>
                            <div class="form-line">
                                <input type="text" id="number" class="form-control" name="party_number" placeholder="Party Number">
                            </div>
                        </div> 
                         <div class="form-group form-float">
                            <label class="form-label">Alternate Number</label>
                            <div class="form-line">
                                <input type="text" id="address" class="form-control" name="party_alternate_number" placeholder="Alternate Number">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Party Address</label>
                            <div class="form-line">
                                <textarea id="address" class="form-control" name="party_address" placeholder="Party Address"></textarea>
                                
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
                                <select name="party_type" id="party_type" class="form-control show-tick" data-live-search="true">
                                    <option value="customer">Customer</option>
                                    <option value="supplier">Supplier</option>
                                   
                                </select>
                            </div>
                             
                        </div>
                           <div class="form-group form-float">
                            <label class="form-label">Party Code</label>
                            <div class="form-line">
                                <input type="text" id="code" class="form-control" name="party_code" placeholder="Party Code">
                            </div>
                        </div>

                        <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.party.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

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
