<div>
    <div class="border-t border-gray-200">
        <dl  class="md:grid md:grid-cols-2 md:gap-6 my-3">
            <div>
                <dt class="text-sm font-medium text-gray-500">Minimum Age Limit</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="age_limit" type="text" class="form-control" name="age_limits_min" value="{{$item->age_limits_min}}"
                        placeholder="Enter Age Limit" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Maximum Age Limit</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="age_limit" type="text" class="form-control" name="age_limits_max" value="{{$item->age_limits_max}}"
                        placeholder="Enter Age Limit" />
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Member Rate</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="member_rate" type="text" class="form-control" name="m" value="{{$item->m}}"
                        placeholder="Enter Member Rate" />
                </dd>
            </div>
            @if($item->product_id =='49' || $item->product_id =='50' || $item->product_id =='51' || $item->product_id =='52' || $item->product_id =='53')
                <div>
                    <dt class="text-sm font-medium text-gray-500">Spouse Rate</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="spouse" type="text" class="form-control" name="spouse" value="{{$item->spouse}}"
                            placeholder="Enter spouse rate" />
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Child Rate</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="child" type="text" class="form-control" name="child"
                            value="{{$item->child}}" placeholder="Enter Child rate" />
                    </dd>
                </div>
            @else
                <div>
                    <dt class="text-sm font-medium text-gray-500">Member + 1 Rate</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="member_plus_one_rate" type="text" class="form-control" name="m1"
                            value="{{$item->m1}}" placeholder="Enter Member + 1 rate" />
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Member + 2 Rate</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="member_plus_two_rate" type="text" class="form-control" name="m2" value="{{$item->m2}}"
                            placeholder="Enter Member + 2 rate" />
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Member + 3 Rate</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="member_plus_three_rate" type="text" class="form-control" name="m3" value="{{$item->m3}}"
                            placeholder="Enter Member + 3 rate" />
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Member + 4 Rate</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="member_plus_four_rate" type="text" class="form-control" name="m4" value="{{$item->m4}}"
                            placeholder="Enter Member + 4 rate" />
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Member + 5 Rate</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="member_plus_five_rate" type="text" class="form-control" name="m5" value="{{$item->m5}}"
                            placeholder="Enter Member + 5 rate" />
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Extra Dependant Rate</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="member_extra_rate" type="text" class="form-control" name="member_extra_rate" value="{{$item->extra_dependant}}"
                            placeholder="Enter Dependant rate" />
                    </dd>
                </div>
            @endif
            <div>
                <dt class="text-sm font-medium text-gray-500">Inpatient Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="member_ip_rate" type="text" class="form-control" name="ip" value="{{$item->ip}}"
                        placeholder="Enter Inpatient rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">OutPatient Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="member_ip_rate" type="text" class="form-control" name="op" value="{{$item->op}}"
                        placeholder="Enter OutPatient rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Maternity Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="member_maternity_rate" type="text" class="form-control" name="maternity" value="{{$item->maternity}}"
                        placeholder="Enter Maternity rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Pregnancy & related complications Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="ip_marternity_complications" type="text" class="form-control"
                        name="ip_marternity_complications" value="{{$item->ip_marternity_complications}}" placeholder="Enter Pregnancy & related complications rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Declared Chronic and Pre-existing Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="chronic_pre_existing" type="text" class="form-control" name="chronic_pre_existing" value="{{$item->chronic_pre_existing}}"
                        placeholder="Enter Declared Chronic and Pre-existing rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Newly diagnosed condition Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="newlydiagnosedcondition" type="text" class="form-control" name="newlydiagnosedcondition" value="{{$item->newlydiagnosedcondition}}"
                        placeholder="Enter Newly diagnosed condition rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Bed Limit per day Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="bed_limit" type="text" class="form-control" name="bed_limit" value="{{$item->bed_limit}}"
                        placeholder="Enter Bed Limit per day rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Congenital conditions Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="congenital_cond" type="text" class="form-control" name="congenital_cond" value="{{$item->congenital_cond}}"
                        placeholder="Enter Congenital conditions rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Psychiatric Benefit Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="psychiatric" type="text" class="form-control" name="psychiatric" value="{{$item->psychiatric}}"
                        placeholder="Enter Psychiatric Benefit rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Funeral Expenses Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="funeral" type="text" class="form-control" name="funeral" value="{{$item->funeral}}"
                        placeholder="Enter Funeral Expenses rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Personal Accident Cover Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="personal_accident" type="text" class="form-control" name="personal_accident" value="{{$item->personal_accident}}"
                        placeholder="Enter Personal Accident Cover rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Dental Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="dental" type="text" class="form-control" value="{{$item->dental}}" name="dental" placeholder="Enter Dental rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Optical Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="optical" type="text" class="form-control" name="optical" value="{{$item->optical}}"
                        placeholder="Enter Optical rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Annual Checkup Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="annual_checkup" type="text" class="form-control" name="annual_checkup" value="{{$item->annual_checkup}}"
                        placeholder="Enter Annual Checkup rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Accident Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="ip_accident" type="text" class="form-control" name="ip_accident" value="{{$item->ip_accident}}"
                        placeholder="Enter Accident rate" />
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Illness Rate *Optional</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input id="ip_illness" type="text" class="form-control" name="ip_illness" value="{{$item->ip_illness}}"
                        placeholder="Enter Illness rate" />
                </dd>
            </div>
        </dl>
    </div>
</div>