<?php

Route::resource('/mapa','MapaController');

//purebas de maps...
Route::get('/vendor/add2', function () {
    return view('locationAddedApata');
});
Route::get('/vendor/add3', function () {
    return view('AutomaticLocationGeolocation');
});
Route::get('/vendor/add4', function () {
    return view('localizinMap');//mapa libre, pero con un idioma predefinido
});
Route::get('/vendor/add5', function () {
    return view('rightToLeftLenguajes');//mapa libre, pero con un idioma predefinido
});
 Route::get('/vendor/add6', function () {
    return view('customMapPoints');//IMPORTANTE, AGREGAR MARCAS EN DET. COORD.
});

Route::get('/vendor/add7', function () {
    return view('placesSearchBox');//mapa libre, pero con un idioma predefinido
});

Route::get('/vendor/add8', function () {
    return view('test');//mapa libre, pero con un idioma predefinido
});
Route::get('/vendor/add9', function () {
    return view('coordInTitle');//mapa libre, pero con un idioma predefinido
});


//Proyecto
Route::get('/test', function () {
    return view('planear');
});

//entrada al sitio
Route::get('/', function () {
    return view('auth/login');
});

//Controles de logueo y registro
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('profile','ProfileController');//profile existe?//tienen otros campos como fotos etc..
Route::resource('home','HomeController');//todos los eventos que saen "visibles" no privados



Route::get('event/{id_event}/destroy','EventController@destroy');
Route::resource('event','EventController');//todos los events de 1 usuario {{Auth::user()->id}}
