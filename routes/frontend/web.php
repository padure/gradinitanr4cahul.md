<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FrontendController;
    //Frontend
    Route::get('/', [FrontendController::class, 'index'])->name('home.index');
    Route::get('/despre-noi', [FrontendController::class, 'about'])->name('about.index');
    Route::get('/contacte', [FrontendController::class, 'contacts'])->name('contacts.index');
    Route::get('/evenimente', [FrontendController::class, 'event'])->name('event.index');
    Route::get('/galerie', [FrontendController::class, 'galerie'])->name('galerie.index');
    Route::get('/meniu', [FrontendController::class, 'menu'])->name('menu.index');
    Route::get('/regimul-zilei', [FrontendController::class, 'regime'])->name('regime.index');
    Route::get('/echipa-noastra', [FrontendController::class, 'team'])->name('team.index');