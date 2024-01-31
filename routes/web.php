<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\InquireComponent;


Route::get('/', HomeController::class)->name('home_page');
Route::get('/about', HomeController::class)->name('about_page');
Route::get('/inquire', InquireComponent::class)->name('inquire_page');
