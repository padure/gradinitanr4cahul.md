<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\SlideshowController;
    use App\Http\Controllers\GroupController;
    use App\Http\Controllers\GalleryController;
    use App\Http\Controllers\EventController;
    use App\Http\Controllers\SettingController;
    use App\Http\Controllers\TeamController;
    use App\Http\Controllers\LawController;
    use App\Http\Controllers\MenuController;
    use App\Http\Controllers\SectionController;
    use App\Http\Controllers\EventCategoryController;
    use App\Http\Controllers\GalleryCategoryController;
    
    Route::middleware('auth')->group(function() {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::resource('slideshows', SlideshowController::class);
        Route::resource('groups', GroupController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('events', EventController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('laws', LawController::class);
        Route::resource('menus', MenuController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('event-category', EventCategoryController::class);
        Route::post('/gallery-category', [GalleryCategoryController::class, 'store'])
            ->name('gallery.category');
        Route::delete('gallery-category/{gallery_category}', [GalleryCategoryController::class, 'destroy'])
            ->name('gallery_category.delete');
    });
