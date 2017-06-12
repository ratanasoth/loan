<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/test', function (){
    return view('welcome');
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/logout', 'UserController@logout');
});

Route::get('/nopermission', 'HomeController@nopermission');

Route::group(['middleware' => 'auth'], function () {

    // company routes
    Route::get('/company', "CompanyController@index");
    Route::get('/company/detail/{id}', 'CompanyController@detail');
    Route::get('/company/create', "CompanyController@create");
    Route::post('/company/save', "CompanyController@save");
    Route::get('/company/delete/{id}', 'CompanyController@delete');
    // set up roles for user
    Route::resource('/role', 'RoleController');
    Route::get('/role/delete/{id}','RoleController@delete');
    //set up usermanegment
    Route::resource('/user','UserController');
    Route::get('/user/{id}/destroy','UserController@destroy');
    Route::get('/user/change_password/{id}','UserController@change_password');
    Route::post('/user/save_pass','UserController@save_pass');
    Route::resource('/permission_pending','PermissionPendingController');
    Route::get('/permission_pending/destroy/{id}','PermissionPendingController@destroy');
    Route::get('/permission_pending/approved/{id}/{is_approval}','PermissionPendingController@approved');
    Route::post('/user/store', 'UserController@store');
    Route::post('/user/update', 'UserController@update');
    Route::get('/user/delete/{id}', 'UserController@delete');
    
    Route::resource('/permission','PermissionController');
    Route::get('/permission/{id}/destroy','PermissionController@destroy');
    
    Route::resource('/permissionrole','PermissionRoleController');
    Route::get('/permissionrole/{id}/destroy','PermissionRoleController@destroy');
    Route::get('/permissionrole/view_permission/{role_id}','PermissionRoleController@view_permission');
    //Route::get('/permissionrole/setup_permission/{role_id}','PermissionRoleController@setup_permission');
});
Route::get('/module', "ModuleController@index");
// Provinces
Route::get("/province", "ProvinceController@index");
Route::get('/province/create', "ProvinceController@create");
Route::post('/province/save', 'ProvinceController@save');
Route::get('/province/edit/{id}', "ProvinceController@edit");
Route::post('/province/update', "ProvinceController@update");
Route::get('/province/delete/{id}', 'ProvinceController@delete');

// Districts
Route::get("/district", "DistrictController@index");
Route::get("/district/delete/{id}", "DistrictController@delete");
Route::get("/district/create", "DistrictController@create");
Route::get('/district/edit/{id}', "DistrictController@edit");
Route::post('/district/update', "DistrictController@update");
Route::post("/district/save", "DistrictController@save");
Route::get("/district/search", "DistrictController@search");
Route::get('/district/get/{id}', "DistrictController@getDistrict");
// Communes
Route::get("/commune", "CommuneController@index");
Route::get("/commune/delete/{id}", "CommuneController@delete");
Route::get("/commune/create", "CommuneController@create");
Route::get('/commune/edit/{id}', "CommuneController@edit");
Route::post('/commune/update', "CommuneController@update");
Route::post("/commune/save", "CommuneController@save");
Route::get("/commune/search", "CommuneController@search");

// Village
Route::get("/village", "VillageController@index");
Route::get("/village/delete/{id}", "VillageController@delete");
Route::get("/village/create", "VillageController@create");
Route::get('/village/edit/{id}', "VillageController@edit");
Route::post('/village/update', "VillageController@update");
Route::post("/village/save", "VillageController@save");
Route::get("/village/search", "VillageController@search");
// branch route
Route::get('/branch', "BranchController@index");
Route::get('/branch/edit/{id}', "BranchController@edit");
Route::get("/branch/delete/{id}", "BranchController@delete");
Route::get("/branch/create", "BranchController@create");
Route::post('/branch/save', "BranchController@save");
Route::post('/branch/update', "BranchController@update");
// department route
Route::get('/department', "DepartmentController@index");
Route::get('/department/edit/{id}', "DepartmentController@edit");
Route::get('/department/delete/{id}', "DepartmentController@delete");
Route::get('/department/create', "DepartmentController@create");
Route::post('/department/save', "DepartmentController@save");
Route::post('/department/update', "DepartmentController@update");
Route::get('/test', "CompanyController@test");
// Position route
Route::get('/position', "PositionController@index");
Route::get('/position/edit/{id}', "PositionController@edit");
Route::get("/position/delete/{id}", "PositionController@delete");
Route::get("/position/create", "PositionController@create");
Route::post('/position/save', "PositionController@save");
Route::post('/position/update', "PositionController@update");