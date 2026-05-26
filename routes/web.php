<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

Route::get('/utilities', [\App\Http\Controllers\UtilityController::class, 'getAllUtilities']);
Route::get('/utilities/{id}', [\App\Http\Controllers\UtilityController::class, 'getUtilityDetail']);
Route::post('/utilities', [\App\Http\Controllers\UtilityController::class, 'createUtility']);
Route::put('/utilities/{id}', [\App\Http\Controllers\UtilityController::class, 'updateUtility']);
Route::delete('/utilities/{id}', [\App\Http\Controllers\UtilityController::class, 'deleteUtility']);

Route::get('/invoices', [\App\Http\Controllers\InvoiceController::class, 'getAllInvoice']);
Route::get('/invoices/{id}', [\App\Http\Controllers\InvoiceController::class, 'getInvoiceDetail']); 
Route::post('/invoices', [\App\Http\Controllers\InvoiceController::class, 'createInvoice']);
Route::put('/invoices/{id}', [\App\Http\Controllers\InvoiceController::class, 'updateInvoice']);
Route::delete('/invoices/{id}', [\App\Http\Controllers\InvoiceController::class, 'deleteInvoice']);

Route::get('/contracts', [\App\Http\Controllers\ContractController::class, 'getAllContracts']);
Route::get('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'getContractDetail']);
Route::post('/contracts', [\App\Http\Controllers\ContractController::class, 'createContract']);
Route::put('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'updateContract']);
Route::delete('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'deleteContract']);

Route::get('/rooms', [\App\Http\Controllers\RoomController::class, 'getAllRooms']);
Route::get('/rooms/{id}', [\App\Http\Controllers\RoomController::class, 'getRoomDetail']);
Route::post('/rooms', [\App\Http\Controllers\RoomController::class, 'createRoom']);
Route::put('/rooms/{id}', [\App\Http\Controllers\RoomController::class, 'updateRoom']); 
Route::delete('/rooms/{id}', [\App\Http\Controllers\RoomController::class, 'deleteRoom']);

Route::get('/tenants', [\App\Http\Controllers\TenantController::class, 'getAllTenants']);
Route::get('/tenants/{id}', [\App\Http\Controllers\TenantController::class, 'getTenantDetail']);
Route::post('/tenants', [\App\Http\Controllers\TenantController::class, 'createTenant']);
Route::put('/tenants/{id}', [\App\Http\Controllers\TenantController::class, 'updateTenant']);
Route::delete('/tenants/{id}', [\App\Http\Controllers\TenantController::class, 'deleteTenant']);

