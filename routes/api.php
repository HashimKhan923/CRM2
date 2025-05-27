<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contactus', '\App\Http\Controllers\SuperAdmin\ContactUsController@create');
Route::post('/admin/registration/process', '\App\Http\Controllers\SuperAdmin\TenantController@registerAdmin');


Route::group(['middleware' => ['tenant']], function () {

Route::post('/admin/product_key', '\App\Http\Controllers\SuperAdmin\TenantController@product_key');    

//common routes start

Route::post('/login', '\App\Http\Controllers\AuthController@login');
Route::post('/forgetPassword', '\App\Http\Controllers\AuthController@forgetpassword');
Route::post('/checktoken', '\App\Http\Controllers\AuthController@token_check');
Route::post('/resetPassword', '\App\Http\Controllers\AuthController@reset_password');
Route::get('/logout/{id}', 'App\Http\Controllers\AuthController@logout');


// common routes ends

/// admin Register
Route::post('/admin/register', 'App\Http\Controllers\Admin\AuthController@register');


Route::group(['middleware' => ['auth.token']], function(){
    
        /////////////////////////////////// Admin Routes \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    Route::middleware(['admin'])->group(function () {

        Route::get('/admin/profile/view/{id}', 'App\Http\Controllers\Admin\AuthController@profile_view');
        Route::post('/admin/profile', 'App\Http\Controllers\Admin\AuthController@profile_update');
        Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('/admin/profile/check', 'App\Http\Controllers\Admin\AuthController@usercheck'); 
        Route::get('/admin/dashboard','App\Http\Controllers\Admin\DashboardController@index');



                                        /// Shift \\\

            Route::group(['prefix' => '/admin/shift/'], function() {
                Route::controller(App\Http\Controllers\Admin\ShiftController::class)->group(function () {
                    Route::get('show','index');
                    Route::post('create','create');
                    Route::get('detail/{id}','detail');
                    Route::post('update','update');
                    Route::get('delete/{id}','delete');
                    Route::get('status/{id}','changeStatus');
                });
            });


                                                /// Department \\\

                Route::group(['prefix' => '/admin/department/'], function() {
                    Route::controller(App\Http\Controllers\Admin\DepartmentController::class)->group(function () {
                        Route::get('show','index');
                        Route::post('create','create');
                        Route::get('detail/{id}','detail');
                        Route::post('update','update');
                        Route::get('delete/{id}','delete');
                        Route::get('status/{id}','changeStatus');
                    });
                });

                                                     /// Location \\\

                Route::group(['prefix' => '/admin/location/'], function() {
                    Route::controller(App\Http\Controllers\Admin\LocationController::class)->group(function () {
                        Route::get('show','index');
                        Route::post('create','create');
                        Route::get('detail/{id}','detail');
                        Route::post('update','update');
                        Route::get('delete/{id}','delete');
                        Route::get('status/{id}','changeStatus');
                    });
                });

                                                        /// Roles \\\

                Route::group(['prefix' => '/admin/role/'], function() {
                    Route::controller(App\Http\Controllers\Admin\RoleController::class)->group(function () {
                        Route::get('show','index');
                        Route::post('create','create');
                        Route::get('detail/{id}','detail');
                        Route::post('update','update');
                        Route::get('delete/{id}','delete');
                        Route::get('status/{id}','changeStatus');
                    });
                });

                                            /// Attendence \\\

                Route::group(['prefix' => '/admin/attendence/'], function() {
                    Route::controller(App\Http\Controllers\Admin\AttendenceController::class)->group(function () {
                        Route::get('show','index');
                        Route::post('search','search');
                        Route::post('create','create');
                        Route::post('update','update');
                    });
                });   
            
            
                                            /// Users \\\

                Route::group(['prefix' => '/admin/users/'], function() {
                    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
                        Route::get('show','index');
                        Route::post('create','create');
                        Route::post('update','update');
                        Route::get('status/{id}','changeStatus');
                        Route::get('delete/{id}','delete');
                    });
                });



    });



            /////////////////////////////////// User Routes \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


                                /// Home \\\

                Route::group(['prefix' => 'home/'], function() {
                Route::controller(App\Http\Controllers\User\HomeController::class)->group(function () {
                    Route::get('show/{id}','index');
                });
            });




                                /// Attendence \\\

            Route::group(['prefix' => 'attendence/'], function() {
            Route::controller(App\Http\Controllers\User\AttendenceController::class)->group(function () {
                    Route::get('show/{id}','index');
                    Route::post('search','search');
                    Route::get('time_in/{id}','time_in');
                    Route::get('time_out/{id}','time_out');
                });
            });



            /// Break \\\

            Route::group(['prefix' => 'break/'], function() {
            Route::controller(App\Http\Controllers\User\BreakController::class)->group(function () {
                Route::get('show/{id}','index');
                Route::post('break_in','break_in');
                Route::get('break_out/{id}','break_out');
            });
        }); 


});
       

});     