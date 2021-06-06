@extends('core/base::layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>Edit Quotation {{$quotation->quotation_number}}</h2>
        <p>Ensure you fill all the required fields</p>
    </div>
    <div class="col-sm-12">
        <div class="layout--tabs">
          
              <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" id="tabs-title-region-nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" role="tab" href="#block-simple-text-1" aria-selected="false" aria-controls="block-simple-text-1" id="block-simple-text-1-tab">Quote Details</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-2" aria-selected="false" aria-controls="block-simple-text-2" id="block-simple-text-2-tab">Additional Benefits</a>
                  </li>
                  @if (!$quotation->cover_type =='h1' || !$quotation->cover_type =='d1')
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-3" aria-selected="false" aria-controls="block-simple-text-3" id="block-simple-text-3-tab">Vehicle Details</a>
                  </li>
                  @endif
                 
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-4" aria-selected="false" aria-controls="block-simple-text-4" id="block-simple-text-4-tab">Customer Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-7" aria-selected="false" aria-controls="block-simple-text-7" id="block-simple-text-7-tab">Attached Documents</a>
                  </li>
                </ul>
              </div>
              <div class="card">
                <div class="card-body">
                    <form action="{{ route('quotationed.update', $quotation->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="tab-content">
                    <div id="block-simple-text-1" class="tab-pane active block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-1-tab">
                     @include('plugins/quotation::quotations.partials.quote')
                    </div>
                    
                    <div id="block-simple-text-2" class="tab-pane block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-2-tab">
                     @include('plugins/quotation::quotations.partials.benefits')
                    </div>
                    @if (!$quotation->cover_type =='h1' || !$quotation->cover_type =='d1')
                    <div id="block-simple-text-3" class="tab-pane  block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-3-tab">
                        @include('plugins/quotation::quotations.partials.vehicle')
                    </div>
                    @endif
                    <div id="block-simple-text-4" class="tab-pane  block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-4-tab">
                        @include('plugins/quotation::quotations.partials.customer')
                    </div>
                    <div id="block-simple-text-7" class="tab-pane" role="tabpanel" aria-labelledby="block-simple-text-7-tab">
                        @include('plugins/quotation::quotations.partials.docs')
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Quotation</button>
              </div>
                </form>
                  
                </div>
              </div>
            </div>
          
    </div>
   
</div>
@endsection