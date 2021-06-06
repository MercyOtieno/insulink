<div class="row justify-content-center">
    <div class="col-sm-5">
        @if ($quotation->cover_type =='c1' || $quotation->cover_type =='c2' || $quotation->cover_type =='c3' || $quotation->cover_type =='c4' || $quotation->cover_type =='c5' || $quotation->cover_type =='c6' || $quotation->cover_type =='c7' || $quotation->cover_type =='c8' || $quotation->cover_type =='c9' || $quotation->cover_type =='c10' || $quotation->cover_type =='c11' || $quotation->cover_type =='c12')
        <div class="row">
            <div class="col-sm-4">
                @if ($quotation->customers->customerdocs[0]->logbook)
                    <a href="/documents/customer/{{$quotation->customers->customerdocs[0]->logbook}}">Download Logbook</a>
                @else
                    Logbook is missing, Upload
                @endif
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="">Attach Logbook</label>
                    <input type="file" name="logbook" id="logbook">
                </div>
            </div>
            </div>
        @endif
       
        <div class="row">
            <div class="col-sm-4">
                @if ($quotation->customers->customerdocs[0]->copy_id)
                    <a href="/documents/customer/{{$quotation->customers->customerdocs[0]->copy_id}}">Download Copy of ID</a>
                @else
                    Copy of ID is missing, Upload
                @endif
                
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="">Attach Copy of ID</label>
                    <input type="file" name="copy_id" id="copy_id">
                </div>
            </div>
        </div>

    
        <div class="row">
            <div class="col-sm-4">
                @if ($quotation->customers->customerdocs[0]->copy_kra_certificate)
                <a href="/documents/customer/{{$quotation->customers->customerdocs[0]->copy_kra_certificate}}">Download Copy of KRA Certificate</a>
                @else
                Copy of KRA Certificate is missing, Upload
                @endif
                
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="">Attach Copy of KRA Certificate</label>
                    <input type="file" name="copy_kra_certificate" id="copy_kra_certificate">
                </div>
            </div>
        </div>
    </div>
</div>