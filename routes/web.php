<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\InquireComponent;


Route::get('/', [HomeController::class,'home']);
Route::get('/inquire', InquireComponent::class);
