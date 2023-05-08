<?php

use App\Http\Controllers\panel\UserPanel\UserPanelController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('user/panel', [UserPanelController::class, 'index'])->name('userPanel');

//------------------------------------------------------------- List Articles -------------------------------------------------------------
    Route::get('user/panel/articles', [UserPanelController::class, 'articleLists'])->name('userPanel.article.list');
    Route::get('user/panel/articles/create', [UserPanelController::class, 'articleCreate'])->name('userPanel.article.create');
    Route::post('user/panel/articles/store', [UserPanelController::class, 'articleStore'])->name('userPanel.article.store');
//    Route::get('user/panel/articles/show/{slug}', [UserPanelController::class, ''])->name('userPanel.article.show');


//------------------------------------------------------------- Settings -------------------------------------------------------------
    //change-password
    Route::view('change-password', 'Panel.User.Settings.ChangePassword.changePassword')->name('userPanel.settings.changePassword');
    Route::post('change-password', [UserPanelController::class, 'updatePassword'])->name('userPanel.settings.updatePassword');

    //change-profile
    Route::get('change-profile', [UserPanelController::class, 'changeProfile'])->name('userPanel.settings.changeProfile');
    Route::post('change-profile', [UserPanelController::class, 'updateProfile'])->name('userPanel.settings.updateProfile');
});
