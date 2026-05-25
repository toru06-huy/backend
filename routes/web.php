<?php

use Illuminate\Support\Facades\Route;

Route::get('/utilities', [\App\Http\Controllers\UtilityController::class, 'getAllUtilities']);
Route::get('/utilities/{id}', [\App\Http\Controllers\UtilityController::class, 'getUtilityDetail']);

Route::get('/invoices', [\App\Http\Controllers\InvoiceController::class, 'getAllInvoice']);
Route::get('/invoices/{id}', [\App\Http\Controllers\InvoiceController::class, 'getInvoiceDetail']); 

Route::get('/contracts', [\App\Http\Controllers\ContractController::class, 'getAllContracts']);
Route::get('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'getContractDetail']);

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

//Test API12344