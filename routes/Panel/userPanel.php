<?php



//Panel
use App\Http\Controllers\Dashboard\UserPanel\UserPanelController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('user/panel', [UserPanelController::class, 'index'])->name('panel.user');
    Route::get('user/panel/articles', [UserPanelController::class, 'articleLists'])->name('panel.user.article.list');
    Route::get('user/panel/articles/create', [UserPanelController::class, 'articleCreate'])->name('panel.user.article.create');
//    Route::get('user/panel/articles/show/{slug}', [UserPanelController::class, ''])->name('panel.user.article.show');
});
