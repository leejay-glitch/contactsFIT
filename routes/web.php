<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Groupcontroller;

Route::middleware('web')->group(function ()
{


Route::get('/', function () {return view('welcome');})->name('intro');    

Route::get('/signup', function () {return view('signup');})->name('signup');
    
Route::get('/login', function () {return view('login');})->name('login');
   


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/signup', [SignupController::class,'register'])->name('register.submit');
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');


Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/index', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::post('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
route::delete('/contacts/{contact}/removeFromGroup/{group}', [ContactController::class, 'removeFromGroup'])->name('contacts.remove-from-group');
Route::get('/contacts/search', [ContactController::class, 'search'])->name('contacts.search');
Route::get('/contacts/export', [ContactController::class,'export'])->name('contacts.export');
Route::get('/contacts/import', [ContactController::class,'import'])->name('contacts.import');


Route::get('/Groups-create', function () {return view('Groups-create');})->name('Groups-create');
Route::get('/groups/index', [GroupController::class,'index'])->name('groups.index');
Route::get('/groups/create', [GroupController::class,'create'])->name('groups.create');
Route::post('/groups', [GroupController::class,'store'])->name('groups.store');
Route::get('/groups/{group}/edit', [GroupController::class,'edit'])->name('groups.edit');;
Route::put('/groups/{group}', [GroupController::class,'update'])->name('groups.update');;
Route::delete('/groups/{group}', [GroupController::class,'destroy'])->name('groups.destroy');;
Route::post('/groups/create-wise-groups', [GroupController::class, 'createWiseAndNotWiseGroups'])->name('groups.create-wise-groups');
Route::get('/groups/assign', [GroupController::class, 'assignContactsForm'])->name('groups.assign-form');
Route::post('/groups/assign', [GroupController::class, 'assignContacts'])->name('groups.assign');
Route::get('/groups/search', [GroupController::class, 'search'])->name('groups.search');
Route::get('/groups/export', [GroupController::class, 'export'])->name('groups.export');
Route::get('/groups/import', [GroupController::class, 'import'])->name('groups.import');






});