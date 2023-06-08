<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\SlideshowController;
    use App\Http\Controllers\GalleryController;
    use App\Http\Controllers\EventController;
    use App\Http\Controllers\EventCategoryController;
    use App\Http\Controllers\GalleryCategoryController;
    
    Route::middleware('auth')->group(function() {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('slideshows', SlideshowController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('events', EventController::class);
        Route::resource('event-category', EventCategoryController::class);
        Route::post('/gallery-category', [GalleryCategoryController::class, 'store'])
            ->name('gallery.category');
        Route::delete('gallery', [GalleryCategoryController::class, 'destroy'])
            ->name('gallery.category.delete');
        
    });
