<?php

Route::group(['namespace' => 'Botble\Quotation\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'quotations', 'as' => 'quotation.'], function () {
            Route::resource('', 'QuotationController')->parameters(['' => 'quotation']);
            Route::get('/clean-up', 'QuotationController@cleanUp')->name('cleanup');
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'QuotationController@deletes',
                'permission' => 'quotation.destroy',
            ]);
        });
        Route::get('quotations/show/{quotation}', 'QuotationController@show')->name('quotation.show');
        Route::post('quotations/updating/{id}', 'QuotationController@updateQuotation')->name('quotationed.update');
        Route::post('quotations/payment/update/{id}/', 'QuotationController@addPayment')->name('quotation.payment.update');
        // Add below this line: Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'customers', 'as' => 'customer.'], function () {
            Route::resource('', 'CustomerController')->parameters(['' => 'customer']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CustomerController@deletes',
                'permission' => 'customer.destroy',
            ]);
        });
        Route::group(['prefix' => 'models', 'as' => 'models.'], function () {
            Route::resource('', 'ModelsController')->parameters(['' => 'models']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ModelsController@deletes',
                'permission' => 'models.destroy',
            ]);
        });
        Route::group(['prefix' => 'makes', 'as' => 'makes.'], function () {
            Route::resource('', 'MakesController')->parameters(['' => 'makes']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'MakesController@deletes',
                'permission' => 'makes.destroy',
            ]);
        });
        Route::group(['prefix' => 'customers', 'as' => 'customer.'], function () {
            Route::resource('', 'CustomerController')->parameters(['' => 'customer']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CustomerController@deletes',
                'permission' => 'customer.destroy',
            ]);
        });
        /**
         * Underwriter
         */
        Route::get('underwriters','UnderwriterController@index')->name('underwriters.index');
        Route::get('underwriters/create','UnderwriterController@create')->name('underwriters.create');
        Route::post('underwriters/store','UnderwriterController@store')->name('underwriters.store');
        Route::get('underwriters/edit/{underwriter}/','UnderwriterController@edit')->name('underwriters.edit');
        Route::put('underwriter/update/{underwriter}/', 'UnderwriterController@update')->name('underwriters.update');
        Route::delete('underwriters/delete/{underwriter}/', 'UnderwriterController@destroy')->name('underwriters.destroy');
        Route::post('underwriters/add/paymentmethod/{underwriter}', 'UnderwriterController@AddPaymentMethod')->name('underwriters.payments.add');

        /**
         * Products
         */
        Route::get('products','ProductController@index')->name('products.index');
        Route::get('products/create','ProductController@create')->name('products.create');
        Route::post('products/store','ProductController@store')->name('products.store');
        Route::get('products/edit/{product}/','ProductController@edit')->name('products.edit');
        Route::get('product/view/{product}/', 'ProductController@show')->name('product.show');
        Route::put('products/update/{product}/', 'ProductController@update')->name('products.update');
        Route::delete('products/delete/{product}/', 'ProductController@destroy')->name('products.destroy');
        
        Route::group(['prefix' => 'rates'], function() {
            Route::get('create/motor-private/{product}', 'RateController@motorcreate')->name('create.motor.rate');
            Route::post('store/rates/motor-private/private/', 'RateController@motorstore')->name('store.motor.private.rate');
            Route::put('update/rate/motor-private/{rate}', 'RateController@updateMotorPrivate')->name('update.motor.private.rate');
            Route::get('create/domestic/{product}', 'RateController@domesticCreate')->name('create.domestic.rate');
            Route::post('store/rates/domestic/', 'RateController@domesticstore')->name('store.domestic.rate');
            Route::put('update/rate/domestic/{rate}', 'RateController@updateDomestic')->name('update.domestic.rate');
            Route::get('create/health/{product}', 'RateController@healthCreate')->name('create.health.rate');
            Route::post('store/rates/health/', 'RateController@healthStore')->name('store.health.rate');
            Route::put('update/rate/health/{rate}', 'RateController@updateHealth')->name('update.health.rate');
            Route::delete('destroy/health/{rate}/', 'RateController@deleteHealth')->name('health.rate.destroy');
        });
    });

});
