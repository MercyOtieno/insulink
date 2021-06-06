@if ($quotation->cover_type =='h1')
<div class="row justify-content-center">
    <div class="col-sm-5">
        <div class="form-group">
            <label for="">Maternity</label>
            <input type="text" class="form-control" value="{{$quotation->maternity}}" name="maternity">
        </div>
        <div class="form-group">
            <label for="">Dental</label>
            <input type="text" class="form-control" value="{{$quotation->dental}}" name="dental">
        </div>
        <div class="form-group">
            <label for="">Optical</label>
            <input type="text" class="form-control" value="{{$quotation->optical}}" name="optical">
        </div>

    </div>
</div>
@else
    
<div class="row justify-content-center">
    <div class="col-sm-5">
        <div class="form-group">
            <label for="">Road Rescue</label>
            <input type="text" class="form-control" value="{{$quotation->road_rescue}}" name="road_rescue">
        </div>
        <div class="form-group">
            <label for="">PVT</label>
            <input type="text" class="form-control" value="{{$quotation->pvt}}" name="pvt">
        </div>
   
        <div class="form-group">
            <label for="">Excess Protector</label>
            <input type="text" class="form-control" value="{{$quotation->excess_protector}}" name="excess_protector">
        </div>
        <div class="form-group">
            <label for="">Loss of Use</label>
            <input type="text" class="form-control" value="{{$quotation->loss_use}}" name="loss_use">
        </div>
    </div>
</div>
@endif