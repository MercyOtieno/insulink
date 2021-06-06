<div class="modal fade" id="paymentModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="applicantModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('quotation.payment.update', $item->id)}}" method="post">
                @csrf
                @method('POST')
           <div class="modal-header">
            <h5 class="modal-title">Record Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           
                <div class="form-group">
                    <label for="">Payment Method</label>
                    <select name="payment_method" class="form-control">
                        <option value="mpesa">Mpesa</option>
                        <option value="cheque">Cheque</option>
                        <option value="bank transfer">Bank Transfer</option>
                        <option value="pesalink">Pesalink</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Mpesa Confirmation code</label>
                    <input type="text" class="form-control" name="transaction_code" value="">
                </div>
                <div class="form-group">
                    <label for="">Change Policy Start Date</label>
                    <input type="datetime-local" class="form-control" name="policy_start_date">
                </div>
                <div class="form-group">
                    <label for="">Amount Paid</label>
                    <input type="number" name="amount_paid" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Mpesa Number that Paid</label>
                    <input type="number" name="phone_paid" class="form-control">
                </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Confirm Payment</button>
        </div>
        </form>
        </div>
    </div>
</div>

