<?php

// Custom routes
// You can delete this route group if you don't need to add your custom routes.
Route::group(['namespace' => 'Theme\Insulink\Http\Controllers', 'middleware' => 'api'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        
        Route::get('ajax/years', 'InsulinkController@getYears');
        Route::get('ajax/vehiclemakes', 'InsulinkController@getVehicleMakes');
        Route::get('ajax/vehiclemodels/{make}', 'InsulinkController@getVehicleModels');
        /**
         * Generate Motor Private Quotations
         */
        Route::group(['prefix' => 'quotations'], function () {
            Route::post('/motor/generate/', 'QuotationController@getMotorRates')->name('generate.quote');
            Route::get('/motor/calculator/', 'QuotationController@getMotorRates');
            Route::get('/motor/generated/{type}, {cover_type}, {v_value}, {v_make}, {v_model}, {v_manufacture}', 'QuotationController@generatedmotorquotes')->name('generated.quote.motor');
            //Health quotations
            Route::group(['prefix' => 'health'], function() {
                Route::get('/individual/generate/{ip}/{op}/{age}/{cover_type}', 'QuotationController@IndividualFamilyHealth');
            });
        });
    });

});

Theme::routes();
