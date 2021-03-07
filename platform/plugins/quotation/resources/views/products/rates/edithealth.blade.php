<div class="border-t border-gray-200">
    <dl class="md:grid md:grid-cols-2 md:gap-6 my-3">
        <div>
            <dt class="text-sm font-medium text-gray-500">Minimum Age Limit</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="age_limit" type="text" class="form-control" name="age_limits_min"
                    value="{{$product->healthrates->age_limits_min}}" placeholder="Enter Age Limit" />
            </dd>
        </div>

        <div>
            <dt class="text-sm font-medium text-gray-500">Maximum Age Limit</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="age_limit" type="text" class="form-control" name="age_limits_max"
                    value="{{$product->healthrates->age_limits_max}}" placeholder="Enter Age Limit" />
            </dd>
        </div>

        <div>
            <dt class="text-sm font-medium text-gray-500">Member Rate</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_rate" type="text" class="form-control" name="member_rate"
                    value="{{$product->healthrates->m}}" placeholder="Enter Member Rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Member + 1 Rate</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_plus_one_rate" type="text" class="form-control" name="member_plus_one_rate"
                    value="{{$product->healthrates->m1}}" placeholder="Enter Member + 1 rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Member + 2 Rate</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_plus_two_rate" type="text" class="form-control" name="member_plus_two_rate"
                    value="{{$product->healthrates->m2}}" placeholder="Enter Member + 2 rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Member + 3 Rate</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_plus_three_rate" type="text" class="form-control" name="member_plus_three_rate"
                    value="{{$product->healthrates->m3}}" placeholder="Enter Member + 3 rate" />
            </dd>
        </div>

        <div>
            <dt class="text-sm font-medium text-gray-500">Member + 4 Rate</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_plus_four_rate" type="text" class="form-control" name="member_plus_four_rate"
                    value="{{$product->healthrates->m4}}" placeholder="Enter Member + 4 rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Member + 5 Rate</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_plus_five_rate" type="text" class="form-control" name="member_plus_five_rate"
                    value="{{$product->healthrates->m5}}" placeholder="Enter Member + 5 rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Extra Dependant Rate</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_extra_rate" type="text" class="form-control" name="member_extra_rate"
                    value="{{$product->healthrates->extra_dependant}}" placeholder="Enter Dependant rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Inpatient Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_ip_rate" type="text" class="form-control" name="member_ip_rate"
                    value="{{$product->healthrates->ip}}" placeholder="Enter Inpatient rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">OutPatient Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_ip_rate" type="text" class="form-control" name="member_op_rate"
                    value="{{$product->healthrates->op}}" placeholder="Enter OutPatient rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Maternity Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="member_maternity_rate" type="text" class="form-control" name="member_maternity_rate"
                    value="{{$product->healthrates->maternity}}" placeholder="Enter Maternity rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Pregnancy & related complications Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="ip_marternity_complications" type="text" class="form-control"
                    name="ip_marternity_complications" value="{{$product->healthrates->ip_marternity_complications}}"
                    placeholder="Enter Pregnancy & related complications rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Declared Chronic and Pre-existing Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="chronic_pre_existing" type="text" class="form-control" name="chronic_pre_existing"
                    value="{{$product->healthrates->chronic_pre_existing}}"
                    placeholder="Enter Declared Chronic and Pre-existing rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Newly diagnosed condition Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="newlydiagnosedcondition" type="text" class="form-control" name="newlydiagnosedcondition"
                    value="{{$product->healthrates->newlydiagnosedcondition}}"
                    placeholder="Enter Newly diagnosed condition rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Bed Limit per day Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="bed_limit" type="text" class="form-control" name="bed_limit"
                    value="{{$product->healthrates->bed_limit}}" placeholder="Enter Bed Limit per day rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Congenital conditions Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="congenital_cond" type="text" class="form-control" name="congenital_cond"
                    value="{{$product->healthrates->congenital_cond}}" placeholder="Enter Congenital conditions rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Psychiatric Benefit Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="psychiatric" type="text" class="form-control" name="psychiatric"
                    value="{{$product->healthrates->psychiatric}}" placeholder="Enter Psychiatric Benefit rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Funeral Expenses Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="funeral" type="text" class="form-control" name="funeral"
                    value="{{$product->healthrates->funeral}}" placeholder="Enter Funeral Expenses rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Personal Accident Cover Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="personal_accident" type="text" class="form-control" name="personal_accident"
                    value="{{$product->healthrates->personal_accident}}"
                    placeholder="Enter Personal Accident Cover rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Dental Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="dental" type="text" class="form-control" value="{{$product->healthrates->dental}}"
                    name="dental" placeholder="Enter Dental rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Optical Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="optical" type="text" class="form-control" name="optical"
                    value="{{$product->healthrates->optical}}" placeholder="Enter Optical rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Annual Checkup Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="annual_checkup" type="text" class="form-control" name="annual_checkup"
                    value="{{$product->healthrates->annual_checkup}}" placeholder="Enter Annual Checkup rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Accident Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="ip_accident" type="text" class="form-control" name="ip_accident"
                    value="{{$product->healthrates->ip_accident}}" placeholder="Enter Accident rate" />
            </dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Illness Rate *Optional</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input id="ip_illness" type="text" class="form-control" name="ip_illness"
                    value="{{$product->healthrates->ip_illness}}" placeholder="Enter Illness rate" />
            </dd>
        </div>
    </dl>
</div>