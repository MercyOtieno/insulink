
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="form-group">
                <label for="company">Quotation #</label>
                <input type="text" class="form-control" id="name" name="quotation_number" value="{{$quotation->quotation_number}}" disabled>
            </div>
            <div class="form-group">
                <label for="phone">Line of Business</label>
                <select id="cover_type" class="form-control custom-select" name="quotation_type">
                    @if ($quotation->quotation_type)
                    <option value="{{$quotation->quotation_type}}">{{$quotation->quotation_type}}</option>
                    <option value="health">Health Insurance</option>
                    <option value="general">General Insurance</option>
                    <option value="life">Life Insurance</option>
                    @endif
                </select>
            </div>
            <div class="form-group" id="show_cover_type">
                <label for="phone">Cover type</label>
                <select class="form-control custom-select" name="cover_type">
                    @if ($quotation->cover_type)
                    <option value="{{$quotation->cover_type}}">
                        {{trans('plugins/quotation::general.'.$quotation->cover_type)}}
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
                <label for="phone">Underwriter </label>
                <select id="grid-category" class="form-control custom-select" name="underwriter_id">
                    
                    @foreach ($underwriters as $item)
                    <option value="{{ $item->id }}"
                        {{ $quotation->products->underwriter_id == $item->id ? 'selected' : '' }}>
                        {{ $item->company }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="form-group">
                <label for="company">Total Premium</label>
                <input type="text" class="form-control" id="name" name="total_price" value="{{$quotation->total_price}}">
            </div>
        
            
        
            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Payment Status</label>
        
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="paid"
                        value="paid" {{ ($quotation->status =="paid")? "checked" : "" }}>
                    <label class="form-check-label" for="paid">
                        Paid
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="not-paid"
                        value="not paid" {{ ($quotation->status =="not paid")? "checked" : "" }}>
                    <label class="form-check-label" for="not-paid">
                        Not Paid
                    </label>
                </div>
            </div> --}}
            
           
        
        </div>
    </div>