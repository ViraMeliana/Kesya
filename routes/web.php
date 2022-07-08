<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::redirect('/', '/login');

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

    // Kategori Dasar Hukum
    Route::delete('kategori-dasar-hukums/destroy', 'KategoriDasarHukumController@massDestroy')->name('kategori-dasar-hukums.massDestroy');
    Route::post('kategori-dasar-hukums/media', 'KategoriDasarHukumController@storeMedia')->name('kategori-dasar-hukums.storeMedia');
    Route::post('kategori-dasar-hukums/ckmedia', 'KategoriDasarHukumController@storeCKEditorImages')->name('kategori-dasar-hukums.storeCKEditorImages');
    Route::resource('kategori-dasar-hukums', 'KategoriDasarHukumController');

    // Dasar Hukum
    Route::delete('dasar-hukums/destroy', 'DasarHukumController@massDestroy')->name('dasar-hukums.massDestroy');
    Route::post('dasar-hukums/media', 'DasarHukumController@storeMedia')->name('dasar-hukums.storeMedia');
    Route::post('dasar-hukums/ckmedia', 'DasarHukumController@storeCKEditorImages')->name('dasar-hukums.storeCKEditorImages');
    Route::get('dasar-hukums/detail/{id}', 'DasarHukumController@index')->name('dasar-hukums.detail');
    Route::resource('dasar-hukums', 'DasarHukumController');

    // Kamus Istilah
    Route::delete('kamus-istilahs/destroy', 'KamusIstilahController@massDestroy')->name('kamus-istilahs.massDestroy');
    Route::post('kamus-istilahs/parse-csv-import', 'KamusIstilahController@parseCsvImport')->name('kamus-istilahs.parseCsvImport');
    Route::post('kamus-istilahs/process-csv-import', 'KamusIstilahController@processCsvImport')->name('kamus-istilahs.processCsvImport');
    Route::resource('kamus-istilahs', 'KamusIstilahController');

    // Perhitungan Akad
    Route::delete('perhitungan-akads/destroy', 'PerhitunganAkadController@massDestroy')->name('perhitungan-akads.massDestroy');
    Route::get('perhitungan-akads/{detail}', 'PerhitunganAkadController@showIndex')->name('perhitungan-akads.showIndex');
    Route::get('perhitungan-akads/{detail}/create', 'PerhitunganAkadController@showCreate')->name('perhitungan-akads.showCreate');
    Route::post('perhitungan-akads/{detail}/calculate', 'PerhitunganAkadController@calculate')->name('perhitungan-akads.calculate');
    Route::get('perhitungan-akads/{detail}/show/{code}', 'PerhitunganAkadController@showDetail')->name('perhitungan-akads.showDetail');
    Route::get('perhitungan-akads/{detail}/export/{code}', 'PerhitunganAkadController@export')->name('perhitungan-akads.export');

    Route::resource('perhitungan-akads', 'PerhitunganAkadController');
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
