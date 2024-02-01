<?php

use App\Http\Controllers\AdminController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Delivery\CreateDelivery;
use App\Livewire\InquireComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\Admin\Inquire\ManageInquiries;

Route::get('/', HomeController::class)->name('home_page');
Route::get('/about', HomeController::class)->name('about_page');
Route::get('/inquire', InquireComponent::class)->name('inquire_page');

Route::prefix('admin')->group(function () {
    Route::get('login', Login::class)->name('login');

    Route::middleware(['auth'])->group(function(){
        Route::get('dashboard',Dashboard::class)->name('admin_Dashboard');

        Route::prefix('inquiry')->group(function(){
            Route::get('manage-inquiries',ManageInquiries::class)->name('admin_ManageInquiries');
        });

        Route::prefix('delivery')->group(function(){
            Route::get('create-receipt',CreateDelivery::class)->name('admin_CreateReceipt');
        });

        Route::get('logout',[AdminController::class,'logout'])->name('admin_Logout');
    });
});
