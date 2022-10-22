<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::group(['middleware' => 'is_admin'], function () {
		Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	});
	Route::group(['middleware' => 'is_admin_or_doctor'], function () {
		Route::resource('test-manage', App\Http\Controllers\Web\BloodTestController::class)->name('index', 'test');
		Route::resource('radiograph', App\Http\Controllers\Web\RadiographController::class)->name('index', 'radiograph');
		Route::resource('{consultation}/test_request', App\Http\Controllers\Web\TestRequestController::class);
		Route::resource('{consultation}/radiograph_request', App\Http\Controllers\Web\RadiographRequestController::class);
		Route::resource('{consultation}/request', App\Http\Controllers\Web\RequestController::class);
		Route::resource('{consultation}/prescription', App\Http\Controllers\Web\PrescriptionController::class);
		Route::get('{consultation}/request/{request}/viewed', [App\Http\Controllers\Web\RequestController::class, 'viewed']);
	});

	Route::resource('category', App\Http\Controllers\Web\CategoryController::class)->name('index', 'category');
	Route::resource('drug', App\Http\Controllers\Web\DrugController::class)->name('index', 'drug');
	Route::resource('patient', App\Http\Controllers\Web\PatientController::class)->name('index', 'patient');
	Route::resource('option', App\Http\Controllers\Web\MedicationOptionController::class)->name('index', 'option');
	Route::resource('consultation', App\Http\Controllers\Web\ConsultationController::class)->name('index', 'consultation');
	Route::get('{patient}/consultation', [App\Http\Controllers\Web\ConsultationController::class, 'indexForUser'])->name('user_consultation');
	Route::resource('{req}/attachment', App\Http\Controllers\Web\AttachmentController::class)->name('index', 'attachment');;
});
