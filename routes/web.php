<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeaconController;
use App\Http\Controllers\AdminController;

// use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class,'index'])->name('index');
       
Route::get('/login',[AuthController::class,'showlogin'])->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'showSignUp'])->name('registration');
Route::get('/auth-user-admin',[AdminController::class,'showAdmin'])->name('admin');
Route::get('/users',[AdminController::class,'showUsers'])->name('users');
Route::post('/user-add',[AdminController::class,'addUser'])->name('add-user');
Route::get('/admin/user/{id}/edit',[AdminController::class,'edit'])->name('admin-edit-user');
Route::put('/admin/user/{id}/update',[AdminController::class,'update'])->name('update-user');
Route::put('/admin/member/{id}/update',[AdminController::class,'updateMember'])->name('update-member');
Route::get('/deacon',[DeaconController::class,'showDeacon'])->name('deacon');
Route::get('/deacon/{id}', [DeaconController::class, 'getMember']);
Route::post('/registerMember',[AuthController::class,'createMember'])->name('regMember');
Route::get('/regUser',[AuthController::class, 'showUserReg'])->name('regUser');
Route::post('/createUser',[AuthController::class,'createUser'])->name('createUser');
Route::get('/forgot-password',[AuthController::class,'showResetPassword'])->name('forgot-password');
// Route::post('/forgot-password',[AuthController::class,'forgotPassword']);
Route::post('/reset-password',[AuthController::class,'resetPassword'])->name('reset-password');
Route::post('/reset-password/{id}',[AdminController::class,'resetPassword'])->name('admin-reset-password');
Route::delete('/admin-user-delete/{id}',[AdminController::class, 'dropUSer'])->name('delete-user');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/members',[AdminController::class,'showMembers'])->name('members');
Route::post('/add-member',[AdminController::class,'addMember'])->name('add-member');
Route::get('admin/member/edit/{id}',[AdminController::class,'showEditMember'])->name('admin-edit-member');
Route::delete('/admin/member/delete{id}',[AdminController::class,'deleteMember'])->name('delete-member');
Route::get('/families',[AdminController::class,'showFamilies'])->name('families');
Route::post('/add-family',[AdminController::class,'addFamily'])->name('add-family');
Route::get('/baptism',[AdminController::class,'showBaptism'])->name('baptism');
Route::post('/baptism',[AdminController::class,'addBaptism'])->name('add-baptism');
Route::get('/marriages',[AdminController::class,'showMarriages'])->name('marriages');
Route::post('/add-marriage',[AdminController::class,'addMarriage'])->name('add-marriage');
Route::get('/marriages/edit/{id}',[AdminController::class,'editMarriages'])->name('edit-marriage');
Route::delete('/marriages/delete/{id}',[AdminController::class,'deleteMarriages'])->name('delete-marriage');
Route::get('/transfers',[AdminController::class,'showTransfers'])->name('transfers');
Route::get('/children',[AdminController::class,'showKids'])->name('kids');


//Events routes
Route::get('/events',[AdminController::class,'showEvents'])->name('events');
Route::post('/add-events',[AdminController::class,'addEvents'])->name('add-events');
Route::get('/admin/edit/event/{id}',[AdminController::class,'editEvent'])->name('edit-event');
Route::put('/admin/event/update/{id}',[AdminController::class,'updateEvent'])->name('update-event');
Route::delete('/admin/delete/event/{id}',[AdminController::class,'deleteEvent'])->name('delete-event');
