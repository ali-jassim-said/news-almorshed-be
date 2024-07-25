<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\VisitorController;
use App\Livewire\Cms\AboutUs;
use App\Livewire\Cms\Admins;
use App\Livewire\Cms\Cards;
use App\Livewire\Cms\Cities;
use App\Livewire\Cms\Contacts;
use App\Livewire\Cms\Feedbacks;
use App\Livewire\Cms\Merchants;
use App\Livewire\Cms\Partners;
use App\Livewire\Cms\Pos;
use App\Livewire\Cms\Posts;
use App\Livewire\Cms\Slider;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/cms/admins', Admins::class);
    Route::get('/cms', Posts::class);
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
