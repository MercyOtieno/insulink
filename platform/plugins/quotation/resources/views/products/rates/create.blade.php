@extends('core/base::layouts.master')
@section('content')
<form name="MOTORPRIVATEForm" id="MOTORPRIVATEForm" method="post" action="{{route('store.motor.private.rate')}}">
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
                            <div class="md:grid md:grid-cols-2 md:gap-6">
                                <div class="relative">
                                    
                                    <div class="relative">
                                        <label for="product">Choose a Product below to begin</label>
                                        <input type="text" name="product_name" class="form-control" id="grid-state" readonly aria-readonly="true"
                                            value="{{$allproducts->name}}">
                                        <input type="hidden" name="product_id" value="{{$allproducts->id}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="age_limit" class="mt-3">Age of the Vehicle</label>
                                        <div>
                                            <label class="inline-flex items-center">
                                                <input type="radio" class="form-radio" name="age_limit" value="below 15"
                                                    checked>
                                                <span class="ml-2">Below 15 years</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate</label>
                                    <div class="form-group">
                                        <label class="inline-flex items-center">Above 1 Million rate</label>
                                        <input type="text" class="form-control" name="rate_value_above" placeholder="Enter Above 1 Million rate">
                                    </div>
                                    <div class="form-group">
                                        <label class="inline-flex items-center">Below 1 Million rate</label>
                                        <input type="text" class="form-control" name="rate_value_below" placeholder="Enter Below 1 Million rate">
                                    </div>
                                </div>

                                <div>
                                    <label for="medical_expense">Medical Expense</label>
                                    <input id="medical_expense" type="text" class="form-control"
                                        name="medical_expense" placeholder="Enter Medical Expense amount" />
                                </div>
                                <div>
                                    <label for="windscreen">Windscreen</label>
                                    <input id="windscreen" type="text" class="form-control" name="windscreen"
                                        placeholder="Enter Windscreen amount" />
                                </div>
                                <div>
                                    <label for="towing_recovery">Towing Recovery</label>
                                    <input id="towing_recovery" type="text" class="form-control"
                                        name="towing_recovery" placeholder="Enter Towing Recovery amount" />
                                </div>

                                <div>
                                    <label for="entertainment">Entertainment</label>
                                    <input id="entertainment" type="text" class="form-control"
                                        name="entertainment" placeholder="Enter Entertainment amount" />
                                </div>
                                <div>
                                    <label for="authorised_repair">Authorised Repair</label>
                                    <input id="authorised_repair" type="text" class="form-control"
                                        name="authorised_repair" placeholder="Enter Authorised Repair amount" />
                                </div>
                                <div>
                                    <label for="per_event">Per Event</label>
                                    <input id="per_event" type="text" class="form-control" name="per_event"
                                        placeholder="Enter Windscreen amount" />
                                </div>
                                <div>
                                    <label for="per_person">Per Person</label>
                                    <input id="per_person" type="text" class="form-control" name="per_person"
                                        placeholder="Enter Windscreen amount" />
                                </div>
                                <div>
                                    <label for="tppd">TPPD</label>
                                    <input id="tppd" type="text" class="form-control" name="tppd"
                                        placeholder="Enter Third Party Property Damage amount" />
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row my-4">
    <div class="col-sm-3 text-right">
        <h2>Optional Benefits</h2>
        <p>Ensure you fill all the required fields</p>
    </div>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-9">
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="">
                        <div class="max-w-7xl mx-auto">
                            <div class="form-group">
                                <label for="loss_use">Loss of Use</label>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" class="form-radio loss_use" name="loss_use_cond" value="inclusive" checked>
                                                    <span class="ml-2">Inclusive in the Premium</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio loss_use" name="loss_use_cond" value="exclusive" checked>
                                                        <span class="ml-2">Exclusive in the Premium</span>
                                                </label>
                                            </div>
                                        </div>
                                           <div class="col-sm-6">
                                               <label for="">Loss of use rate</label>
                                               <input id="loss_use_value" type="text" class="form-control" name="loss_use" placeholder="Enter loss of use rates here ..." />
                                           </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-4 even">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="rescue">Road Rescue</label>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio rescue" name="rescue_cond" value="inclusive" checked>
                                                        <span class="ml-2">Inclusive in the Premium</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio rescue" name="rescue_cond" value="exclusive" checked>
                                                        <span class="ml-2">Exclusive in the Premium</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">Road Rescue rate</label>
                                            <input id="rescue_value" type="text" class="form-control" name="rescue" placeholder="Enter Road Rescue rates here ..." />
                                        </div>
                                    </div>
                                    <hr>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="rescue">Political, Violence & Terrorism</label>
                                                    <div>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio pvt" name="pvt_cond" value="inclusive" checked>
                                                            <span class="ml-2">Inclusive in the Premium</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio pvt" name="pvt_cond" value="exclusive" checked>
                                                            <span class="ml-2">Exclusive in the Premium</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Political, Violence & Terrorism rate</label>
                                                <input id="pvt_value" type="text" class="form-control" name="terrorism"
                                                    placeholder="Enter Political, Violence & Terrorism rates here ..." />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-4 even">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="rescue">Excess Protector</label>
                                                    <div>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio excess" name="excess_cond" value="inclusive">
                                                            <span class="ml-2">Inclusive in the Premium</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio excess" name="excess_cond" value="exclusive" checked>
                                                            <span class="ml-2">Exclusive in the Premium</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Excess Protector rate</label>
                                                <input id="excess_value" type="text" class="form-control" name="excess_protector"
                                                    placeholder="Enter Excess Protector rates here ..." />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="rescue">Riot & Strike</label>
                                                    <div>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio riot" name="riot_cond" value="inclusive">
                                                            <span class="ml-2">Inclusive in the Premium</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio riot" name="riot_cond" value="exclusive" checked>
                                                            <span class="ml-2">Exclusive in the Premium</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Riot & Strike rate</label>
                                                <input id="riot_value" type="text" class="form-control" name="riot" placeholder="Enter Riot & Strike rates here ..." />
                                            </div>
                                        </div>
                                    </div>
                                
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="form-radio" name="status" value="active" checked>
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
</form>
@endsection