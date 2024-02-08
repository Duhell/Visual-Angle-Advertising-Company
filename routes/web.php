<?php

use App\Livewire\Admin\Auth\Login;
use App\Livewire\InquireComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\Admin\Voucher\Vouchers;
use App\Http\Controllers\AdminController;
use App\Livewire\Admin\Dashboard\Dashboard;
use App\Livewire\Admin\Delivery\CreateDelivery;
use App\Livewire\Admin\Inquire\ManageInquiries;
use App\Livewire\Admin\Delivery\ManageDeliveries;
use App\Livewire\ContactComponent;

//* Guest Routes
Route::get('/', HomeController::class)->name('home_page');
Route::get('/about', HomeController::class)->name('about_page');
Route::get('/inquire', HomeController::class)->name('inquire_page');
Route::get('/contact', HomeController::class)->name('contact_page');


//* Administrator Routes
Route::prefix('admin')->group(function () {
    Route::get('login', Login::class)->name('login');

    Route::middleware(['auth'])->group(function(){
        Route::get('@dashboard',Dashboard::class)->name('admin_Dashboard');

        Route::prefix('inquiry')->group(function(){
            Route::get('@manage-inquiries',ManageInquiries::class)->name('admin_ManageInquiries');
        });

        Route::prefix('delivery')->group(function(){
            Route::get('@create-receipt',CreateDelivery::class)->name('admin_CreateReceipt');
            Route::get('@manage-deliveries',ManageDeliveries::class)->name('admin_ManageDeliveries');
        });

        Route::get('@vouchers',Vouchers::class)->name('admin_Vouchers');


        Route::get('logout',[AdminController::class,'logout'])->name('admin_Logout');
    });
});
