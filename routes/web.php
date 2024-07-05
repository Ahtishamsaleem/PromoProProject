<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MasterSKUController;
use App\Http\Controllers\Permission\permissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SKUController;
use App\Http\Controllers\UserController;
use App\Models\Contract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

// routes/web.php

Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::get('password/reset', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::get('password/reset/{token}', [ResetPasswordController::class,'reset'])->name('password.update');

Route::middleware(['auth' , 'session.timeout'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('manufacturers', ManufacturerController::class);
    Route::resource('business-units', BusinessUnitController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('master-skus', MasterSKUController::class);
    Route::resource('skus', SKUController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('contract', ContractController::class);
    Route::get('GetAllCustomer',[ContractController::class,'GetallCustomerName'])->name('GetAllCustomer');
    Route::get('DownloadSampleConract',[ContractController::class,'downloadSampleConract'])->name('downloadSampleConract');
    Route::post('UploadContract',[ContractController::class,'uploadContractCSV'])->name('uploadcontract');
    Route::get('DownloadContract/{id}',[ContractController::class,'downloadContractCSV'])->name('contractDownload');

});


// Check User Role For Adding New User
    Route::middleware(['isAdmin'])->group(function () {
        Route::resource('permissions', permissionController::class)->except(['destroy']);
        Route::get('permissions/{id}/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');
        
        Route::resource('roles', RoleController::class)->except(['edit', 'destroy']);
        Route::get('roles/{role_id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::get('roles/{role_id}/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
        Route::get('roles/{role_id}/add_permission', [RoleController::class, 'addPermissionToRole'])->name('roles.add_permission');
        Route::put('roles/{role_id}/give_permission', [RoleController::class, 'givePermissionToRole'])->name('roles.give_permission');
    });


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
