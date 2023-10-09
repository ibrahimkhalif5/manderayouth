<?php

use App\Http\Controllers\HomeController;

// frontend route


Route::get('/',[HomeController::class,'home']);
Route::get('/about-us',[HomeController::class,'aboutus']);
Route::get('/gallery',[HomeController::class,'gallery']);
Route::get('/contact',[HomeController::class,'contact']);






Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Applications
    Route::delete('applications/destroy', 'ApplicationsController@massDestroy')->name('applications.massDestroy');
    Route::post('applications/media', 'ApplicationsController@storeMedia')->name('applications.storeMedia');
    Route::post('applications/ckmedia', 'ApplicationsController@storeCKEditorImages')->name('applications.storeCKEditorImages');
    Route::post('applications/parse-csv-import', 'ApplicationsController@parseCsvImport')->name('applications.parseCsvImport');
    Route::post('applications/process-csv-import', 'ApplicationsController@processCsvImport')->name('applications.processCsvImport');
    Route::resource('applications', 'ApplicationsController');

    // Career
    Route::delete('careers/destroy', 'CareerController@massDestroy')->name('careers.massDestroy');
    Route::post('careers/media', 'CareerController@storeMedia')->name('careers.storeMedia');
    Route::post('careers/ckmedia', 'CareerController@storeCKEditorImages')->name('careers.storeCKEditorImages');
    Route::post('careers/parse-csv-import', 'CareerController@parseCsvImport')->name('careers.parseCsvImport');
    Route::post('careers/process-csv-import', 'CareerController@processCsvImport')->name('careers.processCsvImport');
    Route::resource('careers', 'CareerController');

    // Gallery
    Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
    Route::post('galleries/ckmedia', 'GalleryController@storeCKEditorImages')->name('galleries.storeCKEditorImages');
    Route::resource('galleries', 'GalleryController');

    // Partner
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnerController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnerController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::post('partners/parse-csv-import', 'PartnerController@parseCsvImport')->name('partners.parseCsvImport');
    Route::post('partners/process-csv-import', 'PartnerController@processCsvImport')->name('partners.processCsvImport');
    Route::resource('partners', 'PartnerController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});