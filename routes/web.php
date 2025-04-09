<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






// common routes ends
Route::view('/','index');
Route::view('/admin/registration','admin_registration');
// Route::post('/admin/registration/process', '\App\Http\Controllers\SuperAdmin\TenantController@registerAdmin')->name('admin.registration.process');
/// admin Register
// Route::post('/admin/register', 'App\Http\Controllers\Admin\AuthController@register');


Route::group(['middleware' => ['tenant']], function () {

    // Tenant-specific routes
//common routes start
Route::get('/login', '\App\Http\Controllers\AuthWebController@login_form')->name('login.form');
Route::post('/login_process', '\App\Http\Controllers\AuthWebController@login')->name('login.process');
Route::post('/forgetPassword', '\App\Http\Controllers\AuthWebController@forgetpassword');
Route::post('/checktoken', '\App\Http\Controllers\AuthWebController@token_check');
Route::post('/resetPassword', '\App\Http\Controllers\AuthWebController@reset_password');
Route::get('/logout', 'App\Http\Controllers\AuthWebController@logout')->name('logout');

Route::middleware(['admin'])->group(function () {

                            /////////////////////////////////// Admin Routes \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

                    //    Route::get('/admin/profile/view/{id}', 'App\Http\Controllers\Admin\AuthController@profile_view');
                    //    Route::post('/admin/profile', 'App\Http\Controllers\Admin\AuthController@profile_update');
                    //    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
                    //    Route::get('/admin/profile/check', 'App\Http\Controllers\Admin\AuthController@usercheck'); 
                    Route::get('/admin/dashboard','App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');



                    /// Shift \\\

                Route::group(['prefix' => '/admin/shift/'], function() {
                Route::controller(App\Http\Controllers\Admin\ShiftController::class)->group(function () {
                Route::get('show','index')->name('admin.shift.show');
                Route::get('create_form','create_form')->name('admin.shift.create.form');
                Route::post('create','create')->name('admin.shift.create');
                Route::get('update_form/{id}','update_form')->name('admin.shift.update.form');
                Route::post('update','update')->name('admin.shift.update');
                Route::get('delete/{id}','delete')->name('admin.shift.delete');
                Route::get('status/{id}','changeStatus');
                });
                });


                            /// Department \\\

                Route::group(['prefix' => '/admin/department/'], function() {
                Route::controller(App\Http\Controllers\Admin\DepartmentController::class)->group(function () {
                Route::get('show','index')->name('admin.department.show');
                Route::get('create_form','create_form')->name('admin.department.create.form');
                Route::post('create','create')->name('admin.department.create');
                Route::get('update_form/{id}','update_form')->name('admin.department.update.form');
                Route::post('update','update')->name('admin.department.update');
                Route::get('delete/{id}','delete')->name('admin.department.delete');
                Route::get('status/{id}','changeStatus');
                });
                });

                /// Designation \\\

                Route::group(['prefix' => '/admin/designation/'], function() {
                    Route::controller(App\Http\Controllers\Admin\DesignationController::class)->group(function () {
                    Route::post('create','create')->name('admin.designation.create');
                    });
                    });
                
                
                                /// Project \\\

                Route::group(['prefix' => '/admin/project/'], function() {
                Route::controller(App\Http\Controllers\Admin\ProjectController::class)->group(function () {
                Route::get('show','index')->name('admin.project.show');
                Route::get('create_form','create_form')->name('admin.project.create.form');
                Route::post('create','create')->name('admin.project.create');
                Route::get('get-users-by-manager/{managerId}','getUsersByManager');
                Route::get('update_form/{id}','update_form')->name('admin.project.update.form');
                Route::post('update','update')->name('admin.project.update');
                Route::get('delete/{id}','delete')->name('admin.project.delete');
                Route::get('status/{id}','changeStatus');
                });
                });

                                    /// Roles \\\

                Route::group(['prefix' => '/admin/role/'], function() {
                Route::controller(App\Http\Controllers\Admin\RoleController::class)->group(function () {
                Route::get('show','index')->name('admin.role.show');
                Route::get('create_form','create_form')->name('admin.role.create.form');
                Route::post('create','create')->name('admin.role.create');
                Route::get('update_form/{id}','update_form')->name('admin.role.update.form');
                Route::post('update','update')->name('admin.role.update');
                Route::get('delete/{id}','delete')->name('admin.role.delete');
                Route::get('status/{id}','changeStatus');
                });
                });

                    /// Attendence \\\

                Route::group(['prefix' => '/admin/attendence/'], function() {
                Route::controller(App\Http\Controllers\Admin\AttendenceController::class)->group(function () {
                Route::get('show','index')->name('admin.attendence.show');
                Route::post('create','create')->name('admin.attendence.create');
                Route::post('update','update')->name('admin.attendence.update');
                Route::post('search','search')->name('admin.attendence.search');
                Route::get('delete/{id}','delete')->name('admin.attendence.delete');

                });
                }); 

                            /// Breaks \\\

                Route::group(['prefix' => '/admin/break/'], function() {
                Route::controller(App\Http\Controllers\Admin\BreakController::class)->group(function () {
                Route::get('show/{time_id}','index')->name('admin.break.show');
                Route::post('create','create')->name('admin.break.create');
                Route::post('update','update')->name('admin.break.update');
                Route::post('search','search')->name('admin.break.search');
                });
                });   


                    /// Users \\\

                Route::group(['prefix' => '/admin/users/'], function() {
                Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
                Route::get('show','index')->name('admin.users.show');
                Route::get('create_form','create_form')->name('admin.users.create.form');
                Route::post('create','create')->name('admin.users.create');
                Route::get('update_form/{id}','update_form')->name('admin.users.update.form');
                Route::get('view/{id}','view')->name('admin.users.view');
                Route::post('update','update')->name('admin.users.update');
                Route::get('status/{id}','changeStatus');
                Route::get('delete/{id}','delete')->name('admin.users.delete');
                });
});


});
    

Route::middleware(['user'])->group(function () {



            /////////////////////////////////// User Routes \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


                                /// Home \\\

                Route::group(['prefix' => 'user/dashboard/'], function() {
                Route::controller(App\Http\Controllers\User\HomeController::class)->group(function () {
                    Route::get('show/{id}','index')->name('user.dashboard');
                });
            });




                                         /// Attendence \\\

            Route::group(['prefix' => 'user/attendence/'], function() {
            Route::controller(App\Http\Controllers\User\AttendenceController::class)->group(function () {
                Route::get('show/{id}','index')->name('user.attendence.show');
                Route::post('search','search')->name('user.attendence.search');
                Route::post('time_in','time_in')->name('user.time_in');
                Route::get('time_out/{id}','time_out')->name('user.time_out');
            });
        });



            /// Break \\\

            Route::group(['prefix' => 'user/break/'], function() {
            Route::controller(App\Http\Controllers\User\BreakController::class)->group(function () {
                Route::get('show/{id}','index')->name('user.break.show');
                Route::post('search','search')->name('user.break.search');
                Route::get('break_in/{user_id}/{time_id}/{break_type}','break_in')->name('user.break_in');
                Route::get('break_view/{break_id}','break_view')->name('user.break.view');
                Route::get('break_out/{id}','break_out')->name('user.break_out');
            });
        }); 

        

    });


});






