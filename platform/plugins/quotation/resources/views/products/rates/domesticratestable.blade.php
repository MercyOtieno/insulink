<div>
    <div class="border-t border-gray-200">
        <dl>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Building Rate
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input type="text" name="rate_value_above" id=""
                        value="{{$product->domesticrates->building_rate}}" class="form-control">
                </dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Items Rate
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input name="rate_value_below" class="form-control" type="text"
                        value="{{$product->domesticrates->items_rate}}">
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    All Risk Rate (Items other than phones, laptops & jewelery)
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input type="text" name="medical_expense" value="{{$product->domesticrates->allrisk_rate_a}}"
                        class="form-control">
                </dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    All Risk Rate (Phones, Laptops & Jewelery)
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input type="text" value="{{$product->domesticrates->allrisk_rate_b}}" name="windscreen"
                        class="form-control">
                </dd>
            </div>
        </dl>
    </div>
</div>



