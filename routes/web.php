<?php

use Illuminate\Support\Facades\Route;

Route::get('/utilities', [\App\Http\Controllers\UtilityController::class, 'getAllUtilities']);
Route::get('/utilities/{id}', [\App\Http\Controllers\UtilityController::class, 'getUtilityDetail']);

Route::get('/invoices', [\App\Http\Controllers\InvoiceController::class, 'getAllInvoice']);
Route::get('/invoices/{id}', [\App\Http\Controllers\InvoiceController::class, 'getInvoiceDetail']); 

Route::get('/contracts', [\App\Http\Controllers\ContractController::class, 'getAllContracts']);
Route::get('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'getContractDetail']);
Route::post('/contracts', [\App\Http\Controllers\ContractController::class, 'createContract']);
Route::put('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'updateContract']);
Route::delete('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'deleteContract']);

Route::get('/rooms', [\App\Http\Controllers\RoomController::class, 'getAllRooms']);
Route::get('/rooms/{id}', [\App\Http\Controllers\RoomController::class, 'getRoomDetail']);

Route::get('/tenants', [\App\Http\Controllers\TenantController::class, 'getAllTenants']);
Route::get('/tenants/{id}', [\App\Http\Controllers\TenantController::class, 'getTenantDetail']);


