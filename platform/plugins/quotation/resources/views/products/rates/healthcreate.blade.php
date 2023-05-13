@extends('core/base::layouts.master')
@section('content')
<form name="domestic-form" id="domestic-form" method="post" action="{{route('store.health.rate')}}">
    @csrf
    <div class="row my-4">
        <div class="col-sm-3 text-right">
            <h2>Product Rate Details</h2>
            <p>Ensure you fill all the required fields</p>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-9">
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="">
                            <div class="max-w-7xl mx-auto">
                                <div class="md:grid md:grid-cols-2 md:gap-6 p-5">
                                    <div class="relative">
                                        <label for="product">Choose a Product below to begin</label>
                                        <input type="text" name="product_name" class="form-control" id="grid-state"
                                            readonly aria-readonly="true" value="{{$allproducts->name}}">
                                        <input type="hidden" name="product_id" value="{{$allproducts->id}}">
                                    </div>
                                    <div>
                                        <label for="age_limit">Minimum Age Limit</label>
                                        <input id="age_limit" type="text" class="form-control" name="age_limits_min" placeholder="Enter Age Limit" />
                                    </div>
                                    <div>
                                        <label for="age_limit">Maximum Age Limit</label>
                                        <input id="age_limit" type="text" class="form-control" name="age_limits_max" placeholder="Enter Age Limit" />
                                    </div>

                                    <div>
                                        <label for="member_rate">Member Rate</label>
                                        <input id="member_rate" type="text" class="form-control" name="member_rate"
                                            placeholder="Enter Member Rate" />
                                    </div>
                                    @if ($allproducts->id =='49' || $allproducts->id =='50' || $allproducts->id =='51' || $allproducts->id =='52' || $allproducts->id =='53')
                                        <div>
                                            <label for="spouse_rate">Spouse Rate</label>
                                            <input id="spouse_rate" type="text" class="form-control" name="spouse_rate"
                                                placeholder="Enter Spouse + 1 rate" />
                                        </div>
                                        <div>
                                            <label for="child_rate">Child Rate</label>
                                            <input id="child_rate" type="text" class="form-control" name="child_rate"
                                                placeholder="Enter Child + 1 rate" />
                                        </div>
                                    @else


                                    <div>
                                        <label for="member_plus_one_rate">Member + 1 Rate</label>
                                        <input id="member_plus_one_rate" type="text" class="form-control" name="member_plus_one_rate"
                                            placeholder="Enter Member + 1 rate" />
                                    </div>
                                    <div>
                                        <label for="member_plus_two_rate">Member + 2 Rate</label>
                                        <input id="member_plus_two_rate" type="text" class="form-control" name="member_plus_two_rate"
                                            placeholder="Enter Member + 2 rate" />
                                    </div>
                                    <div>
                                        <label for="member_plus_three_rate">Member + 3 Rate</label>
                                        <input id="member_plus_three_rate" type="text" class="form-control" name="member_plus_three_rate"
                                            placeholder="Enter Member + 3 rate" />
                                    </div>

                                   <div>
                                    <label for="member_plus_four_rate">Member + 4 Rate</label>
                                    <input id="member_plus_four_rate" type="text" class="form-control" name="member_plus_four_rate"
                                        placeholder="Enter Member + 4 rate" />
                                </div>
                                <div>
                                    <label for="member_plus_five_rate">Member + 5 Rate</label>
                                    <input id="member_plus_five_rate" type="text" class="form-control" name="member_plus_five_rate"
                                        placeholder="Enter Member + 5 rate" />
                                </div>
                                <div>
                                    <label for="member_extra_rate">Extra Dependant Rate</label>
                                    <input id="member_extra_rate" type="text" class="form-control" name="member_extra_rate"
                                        placeholder="Enter Dependant rate" />
                                </div>
                                @endif
                                <div>
                                    <label for="member_ip_rate">Inpatient Rate *Optional</label>
                                    <input id="member_ip_rate" type="text" class="form-control" name="member_ip_rate"
                                        placeholder="Enter Inpatient rate" />
                                </div>
                                <div>
                                    <label for="member_ip_rate">OutPatient Rate *Optional</label>
                                    <input id="member_ip_rate" type="text" class="form-control" name="member_op_rate"
                                        placeholder="Enter OutPatient rate" />
                                </div>
                                <div>
                                    <label for="member_maternity_rate">Maternity Rate *Optional</label>
                                    <input id="member_maternity_rate" type="text" class="form-control" name="member_maternity_rate"
                                        placeholder="Enter Maternity rate" />
                                </div>
                                <div>
                                    <label for="ip_marternity_complications">Pregnancy & related complications Rate *Optional</label>
                                    <input id="ip_marternity_complications" type="text" class="form-control" name="ip_marternity_complications"
                                        placeholder="Enter Pregnancy & related complications rate" />
                                </div>
                                <div>
                                    <label for="chronic_pre_existing">Declared Chronic and Pre-existing Rate *Optional</label>
                                    <input id="chronic_pre_existing" type="text" class="form-control" name="chronic_pre_existing"
                                        placeholder="Enter Declared Chronic and Pre-existing rate" />
                                </div>
                                <div>
                                    <label for="newlydiagnosedcondition">Newly diagnosed condition Rate *Optional</label>
                                    <input id="newlydiagnosedcondition" type="text" class="form-control" name="newlydiagnosedcondition"
                                        placeholder="Enter Newly diagnosed condition rate" />
                                </div>
                                <div>
                                    <label for="bed_limit">Bed Limit per day Rate *Optional</label>
                                    <input id="bed_limit" type="text" class="form-control" name="bed_limit"
                                        placeholder="Enter Bed Limit per day rate" />
                                </div>
                                <div>
                                    <label for="congenital_cond">Congenital conditions Rate *Optional</label>
                                    <input id="congenital_cond" type="text" class="form-control" name="congenital_cond"
                                        placeholder="Enter Congenital conditions rate" />
                                </div>
                                <div>
                                    <label for="psychiatric">Psychiatric Benefit Rate *Optional</label>
                                    <input id="psychiatric" type="text" class="form-control" name="psychiatric"
                                        placeholder="Enter Psychiatric Benefit rate" />
                                </div>
                                <div>
                                    <label for="funeral">Funeral Expenses Rate *Optional</label>
                                    <input id="funeral" type="text" class="form-control" name="funeral"
                                        placeholder="Enter Funeral Expenses rate" />
                                </div>
                                <div>
                                    <label for="personal_accident">Personal Accident Cover Rate *Optional</label>
                                    <input id="personal_accident" type="text" class="form-control" name="personal_accident"
                                        placeholder="Enter Personal Accident Cover rate" />
                                </div>
                                <div>
                                    <label for="dental">Dental Rate *Optional</label>
                                    <input id="dental" type="text" class="form-control" name="dental"
                                        placeholder="Enter Dental rate" />
                                </div>
                                <div>
                                    <label for="optical">Optical Rate *Optional</label>
                                    <input id="optical" type="text" class="form-control" name="optical"
                                        placeholder="Enter Optical rate" />
                                </div>
                                <div>
                                    <label for="annual_checkup">Annual Checkup Rate *Optional</label>
                                    <input id="annual_checkup" type="text" class="form-control" name="annual_checkup"
                                        placeholder="Enter Annual Checkup rate" />
                                </div>
                                <div>
                                    <label for="ip_accident">Accident Rate *Optional</label>
                                    <input id="ip_accident" type="text" class="form-control" name="ip_accident"
                                        placeholder="Enter Accident rate" />
                                </div>
                                <div>
                                    <label for="ip_illness">Illness Rate *Optional</label>
                                    <input id="ip_illness" type="text" class="form-control" name="ip_illness"
                                        placeholder="Enter Illness rate" />
                                </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div>
                                            <label class="inline-flex items-center">
                                                <input type="radio" class="form-radio" name="status" value="active"
                                                    checked>
                                                <span class="ml-2">Active</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="inline-flex items-center">
                                                <input type="radio" class="form-radio" name="status" value="inactive">
                                                <span class="ml-2">Inactive</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                                        Save Rate Card
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
@endsection
