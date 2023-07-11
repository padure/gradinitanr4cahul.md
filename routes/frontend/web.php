<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FrontendController;
    use App\Http\Controllers\MessageController;
    //Frontend
    Route::get('/', [FrontendController::class, 'index'])->name('home.index');
    Route::get('/despre-noi', [FrontendController::class, 'about'])->name('about.index');
    Route::get('/cadrul-normativ', [FrontendController::class, 'law'])->name('law.index');
    Route::get('/contacte', [FrontendController::class, 'contacts'])->name('contacts.index');
    Route::post('/trimite-mesaj', [MessageController::class, 'store'])->name('contact.message');
    Route::get('/evenimente', [FrontendController::class, 'event'])->name('event.index');
    Route::get('/eveniment-by/{category}', [FrontendController::class, 'category'])->name('event.category');
    Route::get('/evenimente/{title}', [FrontendController::class, 'more'])->name('event.show');
    Route::get('/galerie', [FrontendController::class, 'galerie'])->name('galerie.index');
    Route::get('/meniu', [FrontendController::class, 'menu'])->name('menu.index');
    Route::get('/programul-zilei', [FrontendController::class, 'regime'])->name('regime.index');
    Route::get('/echipa-noastra', [FrontendController::class, 'team'])->name('team.index');