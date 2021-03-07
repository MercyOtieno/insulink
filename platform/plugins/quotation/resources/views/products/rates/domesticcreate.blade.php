@extends('core/base::layouts.master')
@section('content')
<form name="domestic-form" id="domestic-form" method="post" action="{{route('store.domestic.rate')}}">
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
                                        <label for="product">Choose a Product below to begin</label>
                                        <input type="text" name="product_name" class="form-control" id="grid-state" readonly
                                            aria-readonly="true" value="{{$allproducts->name}}">
                                        <input type="hidden" name="product_id" value="{{$allproducts->id}}">
                                    </div>

                                    <div>
                                        <label for="building_rate">Building Rate</label>
                                        <input id="building_rate" type="text" class="form-control"
                                            name="building_rate" placeholder="Enter Building rate" />
                                    </div>
                                    <div>
                                        <label for="items_rate">Items Rate</label>
                                        <input id="items_rate" type="text" class="form-control" name="items_rate"
                                            placeholder="Enter Items" />
                                    </div>
                                    <div>
                                        <label for="allrisk_rate_a">All Risk Rate (Items other than phones, laptops & jewelery)</label>
                                        <input id="allrisk_rate_a" type="text" class="form-control"
                                            name="allrisk_rate_a" placeholder="Enter All Risk for Items other than phones, laptops & jewelery rate" />
                                    </div>
                                    <div>
                                        <label for="allrisk_rate_b">All Risk Rate (Phones, Laptops & Jewelery)</label>
                                        <input id="allrisk_rate_b" type="text" class="form-control" name="allrisk_rate_b"
                                            placeholder="Enter All Risk for phones, laptops & jewelery rate" />
                                    </div>
                                    @if ($allproducts->id =='38')
                                        <div>
                                            <label for="rent_recievable">Rent Receivable</label>
                                            <input id="rent_recievable" type="text" class="form-control" name="rent_recievable"
                                                placeholder="Enter Rent Receivable rate" />
                                        </div>
                                        <div>
                                            <label for="machinery_breakdown_risk">Machinery Breakdown Extension</label>
                                            <input id="machinery_breakdown_risk" type="text" class="form-control" name="machinery_breakdown_risk"
                                                placeholder="Enter Machinery Breakdown Extension rate" />
                                        </div>
                                        <div>
                                            <label for="wiba_servants_indoor">WIBA - Indoor servants</label>
                                            <input id="wiba_servants_indoor" type="text" class="form-control" name="wiba_servants_indoor"
                                                placeholder="Enter WIBA - Indoor servants rate" />
                                        </div>
                                        <div>
                                            <label for="wiba_servants_outdoor">WIBA - Outdoor servants</label>
                                            <input id="wiba_servants_outdoor" type="text" class="form-control" name="wiba_servants_outdoor"
                                                placeholder="Enter WIBA - Outdoor servants rate" />
                                        </div>
                                        <div>
                                            <label for="employers_liability">Employers Liability</label>
                                            <input id="employers_liability" type="text" class="form-control" name="employers_liability"
                                                placeholder="Enter Employers Liability" />
                                        </div>
                                        <div>
                                            <label for="occupiers_liability">Occupiers Liability</label>
                                            <input id="occupiers_liability" type="text" class="form-control" name="occupiers_liability"
                                                placeholder="Enter Occupiers Liability rate" />
                                        </div>
                                        <div>
                                            <label for="owners_liability">Owners Liability</label>
                                            <input id="owners_liability" type="text" class="form-control" name="owners_liability"
                                                placeholder="Enter Owners Liability rate" />
                                        </div>
                                        <div>
                                            <label for="personal_accident">Personal Accident</label>
                                            <input id="personal_accident" type="text" class="form-control" name="personal_accident"
                                                placeholder="Enter Personal Accident rate" />
                                        </div>
                                        <div>
                                            <label for="home_office">Home Office (Including electronic damages due to power)</label>
                                            <input id="home_office" type="text" class="form-control" name="home_office"
                                                placeholder="Enter Home Office (Including electronic damages due to power) rate" />
                                        </div>
                                        <div>
                                            <label for="terrorism_political">Terrorism, Sabotage & Political Risk</label>
                                            <input id="terrorism_political" type="text" class="form-control" name="terrorism_political"
                                                placeholder="Enter Terrorism, Sabotage & Political rate" />
                                        </div>
                                    @endif
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