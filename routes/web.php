<?php

Route::get('/', function () {
  return redirect()->route('home');
})->name('baseurl');

Auth::routes();




Route::get('/cities/{state}', function ($state) {
    return App\City::where('state_id', $state)->get();
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/terms_of_use', 'GranPlayController@terms_of_use');
Route::get('/private_policies', 'GranPlayController@private_policies');
Route::get('/update_password', 'GranPlayController@update_password');


Route::get('/association', 'APIController\AssociationController@index');
Route::get('/association_create', 'APIController\AssociationController@create');
Route::post('/association_store', 'APIController\AssociationController@store');
Route::get('/association_edit/{id}', 'APIController\AssociationController@edit');
Route::put('/association_update/{id}', 'APIController\AssociationController@update');
Route::get('/association_delete/{id}', 'APIController\AssociationController@delete');
Route::get('/association_show/{id}', 'APIController\AssociationController@show');

Route::get('/association_photos/{id}', 'APIController\AssociationPhotoController@index');
Route::post('/association_photo_store/{id}', 'APIController\AssociationPhotoController@store');
Route::get('/association_photo_delete/{id}/{assoc_id}', 'APIController\AssociationPhotoController@delete');

Route::get('/association_api', 'APIController@association');



Route::get('/court', 'APIController\CourtController@index');
Route::get('/court_create', 'APIController\CourtController@create');
Route::post('/court_store', 'APIController\CourtController@store');
Route::get('/court_edit/{id}', 'APIController\CourtController@edit');
Route::put('/court_update/{id}', 'APIController\CourtController@update');
Route::get('/court_delete/{id}', 'APIController\CourtController@delete');
Route::get('/court_show/{id}', 'APIController\CourtController@show');

Route::get('/court_photos/{id}', 'APIController\CourtPhotoController@index');
Route::post('/court_photo_store/{id}', 'APIController\CourtPhotoController@store');
Route::get('/court_photos_delete/{id}/{court_id}', 'APIController\CourtPhotoController@delete');

Route::get('/court_api/{association_id}', 'APIController@court');
Route::get('/court_api', 'APIController@courtapi');


Route::get('/price_time_policy', 'APIController\PriceTimePolicyController@index');
Route::get('/price_time_policy_create', 'APIController\PriceTimePolicyController@create');
Route::post('/price_time_policy_store', 'APIController\PriceTimePolicyController@store');
Route::get('/price_time_policy_edit/{id}', 'APIController\PriceTimePolicyController@edit');
Route::put('/price_time_policy_update/{id}', 'APIController\PriceTimePolicyController@update');
Route::get('/price_time_policy_delete/{id}', 'APIController\PriceTimePolicyController@delete');
Route::get('/price_time_policy_show/{id}', 'APIController\PriceTimePolicyController@show');

Route::get('/price_time_policy_slot/{id}', 'APIController\PriceTimePolicySlotController@index');
Route::post('/price_time_policy_slot_store/{id}', 'APIController\PriceTimePolicySlotController@store');
Route::get('/price_time_policy_slot_delete/{id}', 'APIController\PriceTimePolicySlotController@delete');

Route::get('/price_time_policy_api/{association_id}', 'APIController@price_time_policy');
Route::get('/price_time_policy_api', 'APIController@price_time_policyapi');


Route::get('apply_policy', 'APIController\ApplyPolicyController@index');
Route::get('apply_policy_create', 'APIController\ApplyPolicyController@create');
Route::post('apply_policy_store', 'APIController\ApplyPolicyController@store');
Route::get('apply_policy_delete/{id}', 'APIController\ApplyPolicyController@delete');

Route::get('api/apply_policy/{association_id}', 'APIController@apply_policy');


Route::get('/managers', 'APIController\ManagerController@index');
Route::get('/manager_create', 'APIController\ManagerController@create');

Route::get('/manager_photos/{id}', 'APIController\ManagerPhotoController@index');
Route::post('/manager_photo_store/{id}', 'APIController\ManagerPhotoController@store');
Route::get('/manager_photo_delete/{id}/{assoc_id}', 'APIController\ManagerPhotoController@delete');

Route::get('/manager_api', 'APIController@managers');




// Route::get('/reservation_policy', 'GranPlayController@reservation_policy');
// Route::get('/create_new_reservation_policy', 'GranPlayController@create_new_reservation_policy');
// Route::post('/store_new_reservation_policy', 'GranPlayController@store_new_reservation_policy');
// Route::get('/edit_reservation_policy/{id}', 'GranPlayController@edit_reservation_policy');
// Route::put('/update_reservation_policy/{id}', 'GranPlayController@update_reservation_policy');
// Route::get('/view_reservation_policy/{id}', 'GranPlayController@view_reservation_policy');
// Route::get('/delete_reservation_policy/{id}', 'GranPlayController@delete_reservation_policy');


Route::get('/app_users_members', 'GranPlayController@app_users_members');
Route::get('/new_reservation', 'GranPlayController@new_reservation');
Route::get('/upload_players', 'GranPlayController@upload_players');
Route::get('/uploaded_players', 'GranPlayController@uploaded_players');
Route::get('/checkin_checkout', 'GranPlayController@checkin_checkout');
Route::get('/scores', 'GranPlayController@scores');
Route::get('/upcoming_reservations', 'GranPlayController@upcoming_reservations');
Route::get('/past_reservations', 'GranPlayController@past_reservations');
Route::get('/cancelled_reservations', 'GranPlayController@cancelled_reservations');

Route::get('/api/user', 'APIController@users');
