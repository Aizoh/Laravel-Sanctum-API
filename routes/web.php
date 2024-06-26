<?php

use App\Http\Controllers\InvoiceController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('invoices', InvoiceController::class);
//for specific route to use slugs
Route::get('invoice/{invoice}/download', [InvoiceController::class, 'download'])->name('invoice.preview');
Route::get('invoice/{invoice}/send', [InvoiceController::class, 'send'])->name('invoice.send');