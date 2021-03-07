<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="md:grid md:grid-cols-2 md:gap-6">
            
                @if ($product->category == 'health')
            
                @else
                <div class="relative">
                    <label for="product">Choose a Product below to begin</label>
                    <select name="product_id" class="form-control" id="grid-state" disabled>
                        @foreach ($allproducts as $item)
                        <option value="{{$item ->id}}" {{ $item->id == $product->product_id ? 'selected' : '' }}>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $item->name }}</span>
                        </option>
                        @endforeach
            
                    </select>
                    <div class="form-group">
                        <label for="age_limit" class="mt-3">Age of the Vehicle</label>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="age_limit" value="below 15" checked>
                                <span class="ml-2">Below 15 years</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rate">Rate</label>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="rate_value" value="1" checked>
                            <span class="ml-2">Above 1 Million rate</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="rate_value" value="1" checked>
                            <span class="ml-2">Below 1 Million rate</span>
                        </label>
                    </div>
                </div>
            
                <div>
                    <label for="medical_expense">Medical Expense</label>
                    <input id="medical_expense" type="text" class="form-control" v-model="form.medical_expense"
                        placeholder="Enter Medical Expense amount" />
                </div>
                <div>
                    <label for="windscreen">Windscreen</label>
                    <input id="windscreen" type="text" class="form-control" v-model="form.windscreen"
                        placeholder="Enter Windscreen amount" />
                </div>
                <div>
                    <label for="towing_recovery">Towing Recovery</label>
                    <input id="towing_recovery" type="text" class="form-control" v-model="form.towing_recovery"
                        placeholder="Enter Towing Recovery amount" />
                </div>
            
                <div>
                    <label for="entertainment">Entertainment</label>
                    <input id="entertainment" type="text" class="form-control" v-model="form.entertainment"
                        placeholder="Enter Entertainment amount" />
                </div>
                <div>
                    <label for="authorised_repair">Authorised Repair</label>
                    <input id="authorised_repair" type="text" class="form-control" v-model="form.authorised_repair"
                        placeholder="Enter Authorised Repair amount" />
                </div>
                <div>
                    <label for="per_event">Per Event</label>
                    <input id="per_event" type="text" class="form-control" v-model="form.per_event"
                        placeholder="Enter Windscreen amount" />
                </div>
                <div>
                    <label for="per_person">Per Person</label>
                    <input id="per_person" type="text" class="form-control" v-model="form.per_person"
                        placeholder="Enter Windscreen amount" />
                </div>
                <div>
                    <label for="tppd">TPPD</label>
                    <input id="tppd" type="text" class="form-control" v-model="form.tppd"
                        placeholder="Enter Third Party Property Damage amount" />
                </div>
            </div>
            <div class="card my-3">
                <div class="card-header">Optional Benefits</div>
                <div class="card-body">
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="form-group">
                            <label for="loss_use">Loss of Use</label>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="loss_use" value="inclusive" checked>
                                    <span class="ml-2">Inclusive in the Premium</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="loss_use" value="exclusive" checked>
                                    <span class="ml-2">Exclusive in the Premium</span>
                                </label>
                            </div>
                            <input id="loss_use" type="text" class="form-control" name="loss_use" placeholder="Enter loss of use rates here ..."  />
                        </div>
                        <div class="form-group">
                            <label for="rescue">Road Rescue</label>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="rescue" value="inclusive" checked>
                                    <span class="ml-2">Inclusive in the Premium</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="rescue" value="exclusive" checked>
                                    <span class="ml-2">Exclusive in the Premium</span>
                                </label>
                            </div>
                            <input id="loss_use" type="text" class="form-control" name="rescue"
                                placeholder="Enter Road Rescue rates here ..." />
                        </div>
                        <div class="form-group">
                            <label for="rescue">Political, Violence & Terrorism</label>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="pvt" value="inclusive" checked>
                                    <span class="ml-2">Inclusive in the Premium</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="pvt" value="exclusive" checked>
                                    <span class="ml-2">Exclusive in the Premium</span>
                                </label>
                            </div>
                            <input id="loss_use" type="text" class="form-control" name="terrorism"
                                placeholder="Enter Political, Violence & Terrorism rates here ..." />
                        </div>
                        <div class="form-group">
                            <label for="rescue">Excess Protector</label>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="excess" value="inclusive" checked>
                                    <span class="ml-2">Inclusive in the Premium</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="excess" value="exclusive" checked>
                                    <span class="ml-2">Exclusive in the Premium</span>
                                </label>
                            </div>
                            <input id="loss_use" type="text" class="form-control" name="excess_protector"
                                placeholder="Enter Excess Protector rates here ..." />
                        </div>
                        <div class="form-group">
                            <label for="rescue">Riot & Strike</label>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="riot" value="inclusive" checked>
                                    <span class="ml-2">Inclusive in the Premium</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="riot" value="exclusive" checked>
                                    <span class="ml-2">Exclusive in the Premium</span>
                                </label>
                            </div>
                            <input id="loss_use" type="text" class="form-control" name="riot"
                                placeholder="Enter Riot & Strike rates here ..." />
                        </div>
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
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <div class="mr-3">
                    <div class="text-sm text-gray-600" style="display: none">
                        Saved.
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                    Save Rate Card
                </button>
            </div>
            @endif
            </div>
        </div>
    </div>
</div>