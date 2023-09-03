<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\AdminController;


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


Auth::routes();

Route::middleware('auth')->group(function () {


    Route::resource('invoices', InvoiceController::class);

    Route::resource('sections', SectionController::class);

    Route::resource('products', ProductController::class);

    Route::get('show_status/{id}', [InvoiceController::class, 'showStatus']);

    Route::post('change_status', [InvoiceController::class, 'changeStatus'])->name('change_status');

    Route::post('addAttachments', [InvoiceController::class, 'addAttachment'])->name('addAttachments');

    Route::post('restore/{id}', [InvoiceController::class, 'restore']);

    Route::get('viewFiles/{invoice_number}/{file_name}', [InvoiceController::class, 'viewFiles']);

    Route::get('pay/{id}', [InvoiceController::class, 'payment']);

    Route::get('archive', [InvoiceController::class, 'showArchive']);

    Route::get('preview/{id}', [InvoiceController::class, 'printPreview']);

    Route::get('downloadFiles/{invoice_number}/{file_name}', [InvoiceController::class, 'downloadFiles']);

    Route::post('deleteFiles', [InvoiceController::class, 'delete'])->name('deleteFiles');

    // ajax route with method get 
    Route::get('sections/{id}', [InvoiceController::class, 'getproduct']);

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
// dynamic dashboard routes
Route::get('/{page}', [AdminController::class, 'index']);