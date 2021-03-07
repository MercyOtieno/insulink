<div class="row py-4">
    <div class="col-sm-6">
        <h4 class="text-sm leading-6 font-medium text-gray-900 text-uppercase">Underwriter</h4>
        <p class="text-sm text-gray-500">{{$product->underwriters->company}}</p>
        <img class="h-16 float-right rounded-full" src="{{$product->underwriters->logo}}"
            alt="{{$product->underwriters->company}}" style="
                    position: relative;
                    top: -34px;
                    clear: both;
                    ">
    </div>
    <div class="col-sm-6">
        <h4 class="text-sm leading-6 font-medium text-gray-900">Product Category</h4>
        <p class="text-sm text-gray-500">{{$product->category}}</p>
    </div>
</div>
<hr>
<div class="row py-4">
    <div class="col-sm-3">
        <h4 class="text-sm leading-6 font-medium text-gray-900 ">Product Type</h4>
        <p class="text-sm text-gray-500">{{trans('plugins/quotation::general.'.$product->cover_type)}}</p>
    </div>
    <div class="col-sm-3">
        <h4 class="text-sm leading-6 font-medium text-gray-900 ">Product Created By</h4>
        <p class="text-sm text-gray-500">{{$product->users->first_name .' '. $product->users->last_name}}</p>
    </div>
    <div class="col-sm-3">
        <h4 class="text-sm leading-6 font-medium text-gray-900">Product Created on</h4>
        <p class="text-sm text-gray-500">{{$product->created_at->toDayDateTimeString()}}</p>
    </div>
</div>