
<div class="row justify-content-center">
    <div class="col-sm-5">
        <div class="form-group">
            <label for="">First Name</label>
            <input type="text" class="form-control" name="first_name" value="{{$quotation->customers->users->first_name}}">
        </div>
        <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="{{$quotation->customers->users->last_name}}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="{{$quotation->customers->users->email}}">
        </div>
        <div class="form-group">
            <label for="">Cell Phone</label>
            <input type="text" class="form-control" name="cellphone" value="{{$quotation->customers->cellphone}}">
        </div>

        <div class="form-group">
            <label for="">National ID Number</label>
            <input type="text" class="form-control" name="document_number" value="{{$quotation->customers->document_number}}">
        </div>
        <div class="form-group">
            <label for="">KRA PIN</label>
            <input type="text" class="form-control" name="kra_number" value="{{$quotation->customers->kra_number}}">
        </div>
        @if ($quotation->cover_type =='h1')
            @if ($quotation->customers->principal_dob)
            <div class="form-group">
                <label for="">Principle Dob</label>
                <input type="date" class="form-control" name="principal_dob" value="{{$quotation->customers->principal_dob}}">
            </div>
            @else
            <div class="form-group">
                <label for="">Principle Dob</label>
                <input type="date" class="form-control" name="principal_dob">
            </div>
            @endif
        
        <div class="form-group">
            <label for="">Pre Existing</label>
            <input type="text" class="form-control" name="pre_existing" value="{{$quotation->customers->pre_existing}}">
        </div>
        
        @if ($quotation->customers->dependants)
        <h4>Dependants</h4>
        @foreach ($quotation->customers->dependants as $item)
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Dependant Name</label>
                        <input type="text" class="form-control" name="dependant_name[]" value="{{$item->dependant_name}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Dependant Date of birth</label>
                        <input type="date" class="form-control" name="dependant_dob[]" value="{{$item->dependant_dob}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Relationship</label>
                        <input type="text" class="form-control" name="relationship[]" value="{{$item->relationship}}">
                    </div>
                </div>
            </div>
        @endforeach
        @endif
        @endif
       
    </div>
</div>