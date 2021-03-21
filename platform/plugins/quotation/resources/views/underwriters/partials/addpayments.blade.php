<!-- This is the modal -->
<div id="modal-example-{{$item->id}}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Add Payment Method</h2>
        <form method="POST" action="{{route('underwriters.payments.add', $item->id)}}">
            @csrf
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-select">Select Payment Method</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="form-stacked-select" name="method">
                        <option value="" disabled selected>
                            Choose a Payment Method below
                        </option>
                        <option value="mpesa">Mpesa</option>
                        <option value="bank transfer">Bank transfer</option>
                        <option value="pesalink" disabled>Pesalink</option>
                        <option value="visa" disabled>Visa</option>
                        <option value="mastercard" disabled>Mastercard</option>
                        <option value="paypal" disabled>Paypal</option>
                        <option value="airtel money" disabled>Airtel money</option>
                    </select>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Enter Mpesa Paybill Number</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text"
                        placeholder="enter Mpesa paybill number here..." name="paybill">
                </div>
            </div>
            <div class="uk-margin" v-if="payment.method ==='bank transfer'">
                <label class="uk-form-label" for="form-stacked-text">Enter Account Number</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="type account number here..."
                        name="account_number">
                </div>
            </div>
            <div class="uk-margin" v-if="payment.method ==='bank transfer'">
                <label class="uk-form-label" for="form-stacked-text">Enter Account Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="account_name" type="text" placeholder="type account name here..."
                        name="account_name">
                </div>
            </div>
            <div class="uk-margin" v-if="payment.method ==='bank transfer'">
                <label class="uk-form-label" for="form-stacked-text">Enter Bank Branch Code/SWIFT</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text"
                        placeholder="type bank branch code or swift here..." name="branch_code">
                </div>
            </div>

            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit">Add Method</button>
            </p>
        </form>
    </div>
</div>