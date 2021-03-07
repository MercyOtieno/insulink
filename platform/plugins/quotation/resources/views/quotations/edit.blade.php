@extends('core/base::layouts.master')
@section('content')
<div class="row my-4">
    <div class="col-sm-4 text-right">
        <h2>Quotation's Details</h2>
        <p>Ensure you fill all the required fields</p>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-9">
                <div class="card card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data" id="edit_products">
                        @csrf
                        @method('PUT')
                        <div class="card card-body">
                            <div class="form-group">
                                <label for="company">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}"
                                    placeholder="Enter product's Name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Product Category</label>
                                <select id="cover_type" class="form-control custom-select" name="category">
                                    @if ($product->category)
                                    <option value="{{$product->category}}">{{$product->category}}</option>
                                    <option value="health">Health Insurance</option>
                                    <option value="general">General Insurance</option>
                                    <option value="life">Life Insurance</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group" id="show_cover_type">
                                <label for="phone">Cover type</label>
                                <select class="form-control custom-select" name="cover_type">
                                    @if ($product->cover_type)
                                    <option value="{{$product->cover_type}}">
                                        {{trans('plugins/quotation::general.'.$product->cover_type)}}
                                    <option value="c1">Commercial Comprehensive</option>
                                    <option value="c2">Commercial Third Party Only</option>
                                    <option value="c3">Commercial PSV Online Comprehensive</option>
                                    <option value="c4">PSV SELF DRIVE Third Party</option>
                                    <option value="c5">PSV CHAUFFEUR DRIVEN Comprehensive</option>
                                    <option value="c6">Private Comprehensive</option>
                                    <option value="c7">Private Third Party Only</option>
                                    <option value="c8">Tankers (Comprehensive)</option>
                                    <option value="c9">Special Vehicles (Comprehensive)</option>
                                    <option value="c10">Institutional (Comprehensive)</option>
                                    <option value="c11">Driving School (Comprehensive)</option>
                                    <option value="c12">General Cartage (Comprehensive)</option>
                                    <option value="c13">Motor Trade/Yard (Comprehensive)</option>
                                    </option>
                                    @endif


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Underwriter</label>
                                <select id="grid-category" class="form-control custom-select" name="underwriter_id">
                                    <option value="" disabled="disabled" selected="selected">
                                        Select Underwriter of this product below
                                    </option>
                                    @foreach ($underwriters as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $product->underwriter_id ? 'selected' : '' }}>
                                        {{ $item->company }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status"
                                        value="active" {{ ($product->status =="active")? "checked" : "" }}>
                                    <label class="form-check-label" for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status"
                                        value="inactive" {{ ($product->status =="inactive")? "checked" : "" }}>
                                    <label class="form-check-label" for="inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Quotation</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>
</div>
@endsection