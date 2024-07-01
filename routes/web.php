<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MasterSKUController;
use App\Http\Controllers\Permission\permissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SKUController;
use App\Http\Controllers\UserController;
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
    Route::get('Users',[UserController::class, 'index'])->name('users');
    Route::get('UsersCreation',[UserController::class, 'create'])->name('users.creation');
    Route::post('UsersStored',[UserController::class, 'store'])->name('users.store');
    Route::get('UsersEdit/{id}/edit',[UserController::class, 'edit'])->name('user.edit');
    Route::get('ShowUser/{id}',[UserController::class, 'show'])->name('user.show');
    Route::post('UserUpdate/{id}',[UserController::class, 'update'])->name('users.update');

    
    // Manufacturer Routes
    Route::get('Manufacturer',[ManufacturerController::class,'index' ])->name('ShowAllManufacturer');
    Route::get('ManufacturerCreation',[ManufacturerController::class,'create' ])->name('manufacturer.create');
    Route::post('ManufacturerStore',[ManufacturerController::class,'store' ])->name('manufacturer.store');
    Route::get('Manufacturer/{id}/edit',[ManufacturerController::class,'edit' ])->name('manufacturer.edit');
    Route::post('ManufacturerUpdate/{id}',[ManufacturerController::class,'update' ])->name('manufacturer.update');
    Route::get('ShowManufacturer/{id}',[ManufacturerController::class,'show' ])->name('manufacturer.show');


    Route::get('BusinessUnit',[BusinessUnitController::class,'index' ])->name('ShowAllBussinessUnits');
    Route::get('BussinessUnitsCreation',[BusinessUnitController::class,'create' ])->name('BussinessUnits.create');
    Route::post('BussinessUnitsStore',[BusinessUnitController::class,'store' ])->name('BussinessUnits.store');
    Route::get('BussinessUnits/{id}/edit',[BusinessUnitController::class,'edit' ])->name('BussinessUnits.edit');
    Route::post('BussinessUnitsUpdate/{id}',[BusinessUnitController::class,'update' ])->name('BussinessUnits.update');
    Route::get('ShowBussinessUnits/{id}',[BusinessUnitController::class,'show' ])->name('BussinessUnits.show');


    Route::get('Category',[CategoryController::class,'index' ])->name('ShowAllCategories');
    Route::get('Categoriesreation',[CategoryController::class,'create' ])->name('Categories.create');
    Route::post('CategoriesStore',[CategoryController::class,'store' ])->name('Categories.store');
    Route::get('Categories/{id}/edit',[CategoryController::class,'edit' ])->name('Categories.edit');
    Route::post('CategoriesUpdate/{id}',[CategoryController::class,'update' ])->name('Categories.update');
    Route::get('Categories/{id}',[CategoryController::class,'show' ])->name('Categories.show');

    Route::get('Brand',[BrandController::class,'index' ])->name('ShowAllBrands');
    Route::get('BrandCreation',[BrandController::class,'create' ])->name('Brand.create');
    Route::post('BrandStore',[BrandController::class,'store' ])->name('Brand.store');
    Route::get('Brand/{id}/edit',[BrandController::class,'edit' ])->name('Brand.edit');
    Route::post('BrandUpdate/{id}',[BrandController::class,'update' ])->name('Brand.update');
    Route::get('Brand/{id}',[BrandController::class,'show' ])->name('Brand.show');

    Route::get('MasterSKU',[MasterSKUController::class,'index' ])->name('ShowAllMasterSKU');
    Route::get('MasterSKUCreation',[MasterSKUController::class,'create' ])->name('MasterSKU.create');
    Route::post('MasterSKUStore',[MasterSKUController::class,'store' ])->name('MasterSKU.store');
    Route::get('MasterSKU/{id}/edit',[MasterSKUController::class,'edit' ])->name('MasterSKU.edit');
    Route::post('MasterSKUUpdate/{id}',[MasterSKUController::class,'update' ])->name('MasterSKU.update');
    Route::get('MasterSKU/{id}',[MasterSKUController::class,'show' ])->name('MasterSKU.show');


    Route::get('SKU',[SKUController::class,'index' ])->name('ShowAllSKU');
    Route::get('SKUCreation',[SKUController::class,'create' ])->name('SKU.create');
    Route::post('SKUStore',[SKUController::class,'store' ])->name('SKU.store');
    Route::get('SKU/{id}/edit',[SKUController::class,'edit' ])->name('SKU.edit');
    Route::post('SKU/{id}',[SKUController::class,'update' ])->name('SKU.update');
    Route::get('SKU/{id}',[SKUController::class,'show' ])->name('SKU.show');

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
