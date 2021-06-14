<?php

use App\Models\Country;

// Custom routes
// You can delete this route group if you don't need to add your custom routes.
Route::group(['namespace' => 'Theme\Insulink\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get('ajax/years', 'InsulinkController@getYears');
        Route::post('/test/payments', 'PaymentController@customerPayment');
        Route::get('ajax/countries', function() {
            return Country::all();
        });
        Route::post('ajax/travel-quote/request', 'QuotationController@travelQuote');
        Route::post('ajax/products-quote/request', 'QuotationController@otherProducts');
        Route::get('ajax/vehiclemakes', 'InsulinkController@getVehicleMakes');
        Route::get('ajax/vehiclemodels/{make}', 'InsulinkController@getVehicleModels');
        Route::get('ajax/underwriters', 'InsulinkController@getUnderwriters');
        Route::post('ajax/file-claimes/request', 'HomeController@fileClaim');
        Route::get('general/underwriters', 'InsulinkController@listallUndwerwriters');
        /**
         * Generate Motor Private Quotations
         */
        Route::group(['prefix' => 'quotations'], function () {
            Route::get('/motor/generate/{type}/{cover_type}/{v_value}/{v_make}/{v_model}/{v_manufacture}', 'QuotationController@getMotorRates')->name('generate.quote');
            Route::get('/motor/calculator/', 'App\Http\Controllers\QuotationController@getMotorRates');
            Route::get('/motor/generated/{type}, {cover_type}, {v_value}, {v_make}, {v_model}, {v_manufacture}', 'App\Http\Controllers\QuotationController@generatedmotorquotes')->name('generated.quote.motor');
            /**
             * Domestic rates
             */

            Route::get('/domestic/generate/{content_value}/{cover_type}/{product_type}/{furniture}/{phones_laptops}/{personal_accident}/{occupiers_liabity}/{owners_liabity}/{building_value}/{what_to_insure}/{wiba_servants_indoor}/{wiba_servants_outdoor}', 'QuotationController@getDomesticRates')->name('generate.domestic.quote');
            //Health quotations
            Route::group(['prefix' => 'health'], function() {
                Route::get('/individual_family/generate/{ip}/{no_children}/{preexisting}/{dob}/{age}/{cover_type}/{cover_details}/', 'QuotationController@getHealthRates');
            });
        });
        
        Route::group(['prefix' => 'purchase'], function() { 
            Route::get('motor/private/initiate/{product}', 'QuotationController@PurchaseMotorPrivate');
            Route::get('motor/3rdparty/initiate/{product}', 'QuotationController@Purchasethirdparty');
            Route::get('motor/onlinecommercial/initiate/{product}', 'QuotationController@Purchasecommercialonline');
            Route::get('motor/owngoodscommercial/initiate/{product}', 'QuotationController@Purchasecommercialowngoods');
            Route::get('motor/cartagecommercial/initiate/{product}', 'QuotationController@Purchasecommercialcartage');
            Route::get('domestic/initiate/{product}', 'QuotationController@PurchaseDomestic');
            Route::get('health/initiate/{product}', 'QuotationController@PurchaseHealth');
            Route::post('quotation/new/motor', 'QuotationController@OrderMotor');
            Route::post('quotation/new/domestic', 'QuotationController@OrderDomestic');
            Route::post('quotation/new/health', 'QuotationController@OrderHealth');
            Route::post('customer/details/saved', 'CustomerController@storemotor');
            Route::get('someadmins', 'QuotationController@getadmins');
            Route::post('customer/details/saved/domestic', 'CustomerController@storeDomestic');
            Route::post('customer/details/saved/health', 'CustomerController@storeHealth');
            Route::post('payments/pay', 'PaymentController@customerPayment')->name('payments');
            Route::post('/health/corporate/buy', 'QuotationController@healthcorporatepurchase');
            Route::post('commercial/quote/request', 'QuotationController@sendfleetform');
        });
    });

});

Theme::routes();

Route::group(['namespace' => 'Theme\Insulink\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'InsulinkController@getIndex')
            ->name('public.index');
        //Route::get('auth/login', 'InsulinkController@login')->name('login');
        Route::get('sitemap.xml', 'InsulinkController@getSiteMap')
            ->name('public.sitemap');

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), 'InsulinkController@getView')
            ->name('public.single');
        

    });
});
