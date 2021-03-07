<div>
    <div class="border-t border-gray-200">
        <dl>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Rate used on Vehicle value above a million
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input type="text" name="rate_value_above" id="" value="{{$product->motorprivaterates->rate_value_above}}" class="form-control">
                </dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Rate used on Vehicle value below a million
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input name="rate_value_below" class="form-control" type="text" value="{{$product->motorprivaterates->rate_value_below}}">
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Medical Expense
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input type="text" name="medical_expense" value="{{$product->motorprivaterates->medical_expense}}" class="form-control">
                </dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Windscreen
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input type="text" value="{{$product->motorprivaterates->windscreen}}" name="windscreen" class="form-control">
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Towing Recovery
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input type="text" value="{{$product->motorprivaterates->towing_recovery}}" name="towing_recovery" class="form-control">
                </dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Other Benefits
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: paper-clip -->
                                <span class="ml-2 flex-1 w-0 truncate">
                                    Excess Protector 
                                </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    <input type="text" value="{{$product->motorprivaterates->excess_protector}}" name="excess_protector" class="form-control">
                                </a>
                            </div>
                        </li>
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: paper-clip -->
                                <span class="ml-2 flex-1 w-0 truncate">
                                    Political, Violence & Terrorism 
                                </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    <input name="political_terrorism" type="text" value="{{$product->motorprivaterates->political_terrorism}}" class="form-control">
                                </a>
                            </div>
                        </li>
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: paper-clip -->
                                <span class="ml-2 flex-1 w-0 truncate">
                                    Road Rescue
                                </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    <input type="text" name="road_rescue" value="{{$product->motorprivaterates->road_rescue}}" class="form-control">
                                </a>
                            </div>
                        </li>
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: paper-clip -->
                                <span class="ml-2 flex-1 w-0 truncate">
                                    Loss of Use
                                </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    <input type="text" name="loss_use" value="{{$product->motorprivaterates->loss_use}}" class="form-control">
                                </a>
                            </div>
                        </li>
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: paper-clip -->
                                <span class="ml-2 flex-1 w-0 truncate">
                                    Riot & Strike
                                </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    <input type="text" value="{{$product->motorprivaterates->riot}}" name="riot" class="form-control">
                                </a>
                            </div>
                        </li>
                    </ul>
                </dd>
            </div>
        </dl>
    </div>
</div>