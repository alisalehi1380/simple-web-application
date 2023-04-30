<?php



//Panel
use App\Http\Controllers\Dashboard\UserPanel\UserPanelController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('user/panel', [UserPanelController::class, 'index'])->name('panel.user');
    Route::get('user/panel/articles/create', [UserPanelController::class, 'createArticle'])->name('panel.user.article.create');
});
