<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\SlideshowController;
    
    Route::middleware('auth')->group(function() {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('slideshows', SlideshowController::class);
    });
