<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Kategori Dasar Hukum
    Route::post('kategori-dasar-hukums/media', 'KategoriDasarHukumApiController@storeMedia')->name('kategori-dasar-hukums.storeMedia');
    Route::apiResource('kategori-dasar-hukums', 'KategoriDasarHukumApiController');

    // Dasar Hukum
    Route::post('dasar-hukums/media', 'DasarHukumApiController@storeMedia')->name('dasar-hukums.storeMedia');
    Route::apiResource('dasar-hukums', 'DasarHukumApiController');

    // Kamus Istilah
    Route::apiResource('kamus-istilahs', 'KamusIstilahApiController');

    // Perhitungan Akad
    Route::apiResource('perhitungan-akads', 'PerhitunganAkadApiController');
});
