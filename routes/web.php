<?php

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

use App\Inventory; 
use Symfony\Component\Console\Input\Input;
 
Route::get('/', function () { 
    return view('welcome'); 
}); 

Route::resource('inventory', 'inventoryController'); 
Route::resource('stock', 'stockController'); 
Route::resource('sales', 'salesController'); 
