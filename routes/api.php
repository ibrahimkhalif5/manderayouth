<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Applications
    Route::post('applications/media', 'ApplicationsApiController@storeMedia')->name('applications.storeMedia');
    Route::apiResource('applications', 'ApplicationsApiController');

    // Career
    Route::post('careers/media', 'CareerApiController@storeMedia')->name('careers.storeMedia');
    Route::apiResource('careers', 'CareerApiController');

    // Gallery
    Route::post('galleries/media', 'GalleryApiController@storeMedia')->name('galleries.storeMedia');
    Route::apiResource('galleries', 'GalleryApiController');

    // Partner
    Route::post('partners/media', 'PartnerApiController@storeMedia')->name('partners.storeMedia');
    Route::apiResource('partners', 'PartnerApiController');
});
