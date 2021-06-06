<div class="row">
    <div class="col-sm-6">
        <div class="form-group" id="show_cover_type">
            <label for="phone">Vehicle Registration</label>
            <input type="text" class="form-control" name="registration" value="{{$quotation->customers->vehicles[0]->registration}}">
        </div>
        <div class="form-group" id="show_cover_type">
            <label for="phone">Chassis Number</label>
            <input type="text" class="form-control" name="chasis_no" value="{{$quotation->customers->vehicles[0]->chasis_no}}">
        </div>
        <div class="form-group" id="show_cover_type">
            <label for="phone">Seating Capacity</label>
            <input type="text" class="form-control" name="seating_capacity" value="{{$quotation->customers->vehicles[0]->seating_capacity}}">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group" id="show_cover_type">
            <label for="phone">Engine Number</label>
            <input type="text" class="form-control" name="engine_no" value="{{$quotation->customers->vehicles[0]->engine_no}}">
        </div>
        <div class="form-group" id="show_cover_type">
            <label for="phone">Vehicle CC</label>
            <input type="text" class="form-control" name="cc" value="{{$quotation->customers->vehicles[0]->cc}}">
        </div>
        <div class="form-group">
            <label for="company">Vehicle Value</label>
            <input type="text" class="form-control" id="name" name="value_of_vehicle" value="{{$quotation->value_of_vehicle}}">
        </div>
    </div>
</div>




