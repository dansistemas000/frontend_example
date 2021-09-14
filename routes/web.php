<?php

use Illuminate\Support\Facades\Route;
use App\Http\Core\Domain\Headers;

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

Route::get('home', function () {
    return view('welcome');
});

/* inicio rutas dar de baja folio */

Route::get('unsubscribe_folios_form', function () {
    $headers = Headers::HEADERFOLIOS;
    return view('welcome',["view"=>"unsubscribe_folios_form","headers"=>$headers]);
});

Route::resource('unsubscribe_folios', 'UnsubscribeFolio\UnsubscribeFolioController');


/* fin rutas dar de baja folio */


