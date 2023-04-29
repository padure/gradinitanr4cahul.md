<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FrontendController;
    //Frontend
    Route::get('/', [FrontendController::class, 'index'])->name('home.index');