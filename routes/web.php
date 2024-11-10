<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GSTController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\PartiesTypeController;

//authentication
Route::get('register', [AuthController::class, 'registerpage'])->name('auth.register');
Route::post('register_post', [AuthController::class, 'register_post'])->name('register_post');
Route::get('/', [AuthController::class, 'loginpage'])->name('auth.login');
Route::post('login_post', [AuthController::class, 'login_post'])->name('login_post');

//forgot and reset password

Route::get('/forgot_password', [ForgotPasswordController::class, 'forgotpassword'])->name('password.request');

Route::post('/forgot_password', [ForgotPasswordController::class, 'passwordEmail'])->name('password.email');
Route::get('/reset-password/{token}', function ($token) {
  return view('auth.reset_password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset_password', [ForgotPasswordController::class, 'passwordUpdate'])->name('password.update');

//adminpanel

Route::group(['Middleware' => 'Admin'], function () {
  Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

  Route::get('admin/parties_Type/list', [PartiesTypeController::class, 'parties_type_list'])->name('admin.parties_Type.list');

  Route::get('admin/parties_Type/pdf_generator', [PartiesTypeController::class, 'parties_type_pdf_generator'])->name('admin.parties_Type.pdf_generator');

  Route::get('admin/parties_type/add', [PartiesTypeController::class, 'parties_type_add'])->name('admin.parties_Type.add');
  Route::post('admin/parties_type/add', [PartiesTypeController::class, 'parties_type_insert'])->name('admin.parties_Type.add');
  Route::get('admin/parties_type/edit/{id}', [PartiesTypeController::class, 'parties_type_edit'])->name('admin.parties_Type.edit');
  Route::post('admin/parties_type/edit/{id}', [PartiesTypeController::class, 'parties_type_update'])->name('admin.parties_Type.update');
  Route::get('admin/parties_type/delete/{id}', [PartiesTypeController::class, 'parties_type_delete'])->name('admin.parties_Type.delete');
  Route::get('admin/parties', [PartiesTypeController::class, 'parties'])->name('admin.parties.list');
  Route::get('admin/parties/add', [PartiesTypeController::class, 'parties_add'])->name('admin.parties.add');
  Route::post('admin/parties/add', [PartiesTypeController::class, 'parties_insert'])->name('admin.parties.add');
  Route::get('admin/parties/edit/{id}', [PartiesTypeController::class, 'parties_edit'])->name('admin.parties.edit');
  Route::post('admin/parties/edit/{id}', [PartiesTypeController::class, 'parties_update'])->name('admin.parties.update');
  Route::get('admin/parties/delete/{id}', [PartiesTypeController::class, 'parties_delete'])->name('admin.parties.delete');




  Route::get('admin/GST_Bills', [GSTController::class, 'gst_bills'])->name('admin.GST_Bills.list');
  Route::get('admin/GST_Bills/add', [GSTController::class, 'gst_bills_add'])->name('admin.GST_Bills.add');
  Route::post('admin/GST_Bills/add', [GSTController::class, 'GST_Bills_insert'])->name('admin.GST_Bills.add');

  Route::get('admin/GST_Bills/edit/{id}', [GSTController::class, 'gst_bills_edit'])->name('admin.GST_Bills.edit');
  Route::post('admin/GST_Bills/edit/{id}', [GSTController::class, 'gst_bills_update'])->name('admin.GST_Bills_update');

  Route::get('admin/GST_Bills/view/{id}', [GSTController::class, 'gst_bills_view'])->name('admin.GST_Bills.view');

  Route::get('admin/GST_Bills/delete/{id}', [GSTController::class, 'gst_bills_delete'])->name('admin.GST_Bills.delete');


  Route::get('admin/My_account', [MyAccountController::class, 'my_account'])->name('admin.My_account.update');
  Route::post('admin/My_account', [MyAccountController::class, 'my_account_update'])->name('admin.My_account.update');
});

//logout

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
