<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\TipoBusController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\EncomiendaController;
use App\Http\Controllers\RolesController;

use App\Http\Controllers\BusPersonalController;
use App\Http\Controllers\DetalleEncomiendaController;
use App\Http\Controllers\ItinerarioController;
use App\Http\Controllers\PasajeroController;

use App\Http\Controllers\PersonalOficinaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaPasajeBusController;
use App\Http\Controllers\VentaPasajeController;

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
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//Bus
Route::group(['prefix'=>'Bus'],function(){
	Route::get('/index',[BusController::class,'index'])->name('bus.index');
	Route::get('/create',[BusController::class,'create'])->name('bus.create');
	Route::get('/edit/{bus}',[BusController::class,'edit'])->name('bus.edit');
	Route::post('/store',[BusController::class,'store'])->name('bus.store');
	Route::put('/update/{bus}',[BusController::class,'update'])->name('bus.update');
	Route::delete('/{id}',[BusController::class,'destroy'])->name('bus.delete');
});

//Tipo de Bus
Route::group(['prefix'=>'Tipo_Bus'],function(){
	Route::get('/index',[TipoBusController::class,'index'])->name('tipo_bus.index');
	Route::get('/create',[TipoBusController::class,'create'])->name('tipo_bus.create');
	Route::get('/edit/{bus}',[TipoBusController::class,'edit'])->name('tipo_bus.edit');
	Route::post('/store',[TipoBusController::class,'store'])->name('tipo_bus.store');
	Route::put('/update/{bus}',[TipoBusController::class,'update'])->name('tipo_bus.update');
	Route::delete('/{id}',[TipoBusController::class,'destroy'])->name('tipo_bus.delete');
});
//Oficina
Route::group(['prefix'=>'Oficina'],function(){
	Route::get('/index',[OficinaController::class,'index'])->name('oficina.index');
	Route::get('/create',[OficinaController::class,'create'])->name('oficina.create');
	Route::get('/edit/{oficina}',[OficinaController::class,'edit'])->name('oficina.edit');
	Route::post('/store',[OficinaController::class,'store'])->name('oficina.store');
	Route::put('/update/{oficina}',[OficinaController::class,'update'])->name('oficina.update');
	Route::delete('/{id}',[OficinaController::class,'destroy'])->name('oficina.delete');
});
//Encomienda
Route::group(['prefix'=>'Encomienda'],function(){
	Route::get('/index',[EncomiendaController::class,'index'])->name('encomienda.index');
	Route::get('/create',[EncomiendaController::class,'create'])->name('encomienda.create');
	Route::get('/edit/{encomienda}',[EncomiendaController::class,'edit'])->name('encomienda.edit');
	Route::post('/store',[EncomiendaController::class,'store'])->name('encomienda.store');
	Route::put('/update/{encomienda}',[EncomiendaController::class,'update'])->name('encomienda.update');
	Route::delete('/{id}',[EncomiendaController::class,'destroy'])->name('encomienda.delete');
});
//Roles
Route::group(['prefix'=>'Roles'],function(){
	Route::get('/index',[RolesController::class,'index'])->name('roles.index');
	Route::get('/create',[RolesController::class,'create'])->name('roles.create');
	Route::get('/edit/{roles}',[RolesController::class,'edit'])->name('roles.edit');
	Route::post('/store',[RolesController::class,'store'])->name('roles.store');
	Route::put('/update/{roles}',[RolesController::class,'update'])->name('roles.update');
});
//Bus Personal
Route::group(['prefix'=>'Bus_Personal'],function(){
	Route::get('/index',[BusPersonalController::class,'index'])->name('bus_personal.index');
	Route::get('/create',[BusPersonalController::class,'create'])->name('bus_personal.create');
	Route::get('/edit/{bus_personal}',[BusPersonalController::class,'edit'])->name('bus_personal.edit');
	Route::post('/store',[BusPersonalController::class,'store'])->name('bus_personal.store');
	Route::put('/update/{bus_personal}',[BusPersonalController::class,'update'])->name('bus_personal.update');
	Route::delete('/{id}',[BusPersonalController::class,'destroy'])->name('bus_personal.delete');
});

//Detalle Encomienda
Route::group(['prefix'=>'Detalle_Encomienda'],function(){
	Route::get('/index',[DetalleEncomiendaController::class,'index'])->name('detalle_encomienda.index');
	Route::get('/create',[DetalleEncomiendaController::class,'create'])->name('detalle_encomienda.create');
	Route::get('/edit/{detalle}',[DetalleEncomiendaController::class,'edit'])->name('detalle_encomienda.edit');
	Route::post('/store',[DetalleEncomiendaController::class,'store'])->name('detalle_encomienda.store');
	Route::put('/update/{detalle}',[DetalleEncomiendaController::class,'update'])->name('detalle_encomienda.update');
	Route::delete('/{id}',[DetalleEncomiendaController::class,'destroy'])->name('detalle_encomienda.delete');
});

//Itinerario
Route::group(['prefix'=>'Itineario'],function(){
	Route::get('/index',[ItinerarioController::class,'index'])->name('itinerario.index');
	Route::get('/create',[ItinerarioController::class,'create'])->name('itinerario.create');
	Route::get('/edit/{itinerario}',[ItinerarioController::class,'edit'])->name('itinerario.edit');
	Route::post('/store',[ItinerarioController::class,'store'])->name('itinerario.store');
	Route::put('/update/{itinerario}',[ItinerarioController::class,'update'])->name('itinerario.update');
	Route::get('/libre/{id}',[ItinerarioController::class,'libre'])->name('itinerario.libre');
	Route::delete('/{id}',[ItinerarioController::class,'destroy'])->name('itinerario.delete');
});
//Pasajero
Route::group(['prefix'=>'Pasajero'],function(){
	Route::get('/index',[PasajeroController::class,'index'])->name('pasajero.index');
	Route::get('/create',[PasajeroController::class,'create'])->name('pasajero.create');
	Route::get('/edit/{pasajero}',[PasajeroController::class,'edit'])->name('pasajero.edit');
	Route::post('/store',[PasajeroController::class,'store'])->name('pasajero.store');
	Route::put('/update/{pasajero}',[PasajeroController::class,'update'])->name('pasajero.update');
	Route::delete('/{id}',[PasajeroController::class,'destroy'])->name('pasajero.delete');
});
//Personal Oficina
Route::group(['prefix'=>'Personal_Oficina'],function(){
	Route::get('/index',[PersonalOficinaController::class,'index'])->name('personal_oficina.index');
	Route::get('/create',[PersonalOficinaController::class,'create'])->name('personal_oficina.create');
	Route::get('/edit/{personal_oficina}',[PersonalOficinaController::class,'edit'])->name('personal_oficina.edit');
	Route::post('/store',[PersonalOficinaController::class,'store'])->name('personal_oficina.store');
	Route::put('/update/{personal_oficina}',[PersonalOficinaController::class,'update'])->name('personal_oficina.update');
	Route::delete('/{id}',[PersonalOficinaController::class,'destroy'])->name('personal_oficina.delete');
});


//Venta Pasaje
Route::group(['prefix'=>'Venta_Pasaje'],function(){
	Route::get('/index',[VentaPasajeController::class,'index'])->name('venta_pasaje.index');
	Route::get('/create',[VentaPasajeController::class,'create'])->name('venta_pasaje.create');
	Route::get('/edit/{venta_pasaje}',[VentaPasajeController::class,'edit'])->name('venta_pasaje.edit');
	Route::post('/store',[VentaPasajeController::class,'store'])->name('venta_pasaje.store');
	Route::put('/update/{venta_pasaje}',[VentaPasajeController::class,'update'])->name('venta_pasaje.update');
	Route::delete('/{id}',[VentaPasajeController::class,'destroy'])->name('venta_pasaje.delete');
	//rellenado de los select
	Route::post('/itinerario',[VentaPasajeController::class,'itinerario']);
	Route::post('/bus',[VentaPasajeController::class,'bus']);
	Route::post('/asiento',[VentaPasajeController::class,'asiento']);
	//editar
	Route::post('/edit/itinerario',[VentaPasajeController::class,'itinerario']);
	Route::post('/edit/bus',[VentaPasajeController::class,'bus']);
	Route::post('/edit/asiento',[VentaPasajeController::class,'asiento']);
});

//Venta Pasaje Bus
Route::group(['prefix'=>'Venta_Pasaje_Bus'],function(){
	Route::get('/index',[VentaPasajeBusController::class,'index'])->name('venta_pasaje_bus.index');
	Route::get('/create',[VentaPasajeBusController::class,'create'])->name('venta_pasaje_bus.create');
	Route::get('/edit/{venta_pasaje}',[VentaPasajeBusController::class,'edit'])->name('venta_pasaje_bus.edit');
	Route::post('/store',[VentaPasajeBusController::class,'store'])->name('venta_pasaje_bus.store');
	Route::put('/update/{venta_pasaje}',[VentaPasajeBusController::class,'update'])->name('venta_pasaje_bus.update');
});

