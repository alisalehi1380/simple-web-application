<?php

use App\Http\Controllers\panel\UserPanel\UserPanelController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('user/panel', [UserPanelController::class, 'index'])->name('userPanel');

//------------------------------------------------------------- Articles -------------------------------------------------------------
    // articles list
    Route::get('user/panel/articles', [UserPanelController::class, 'articleLists'])->name('userPanel.articles.list');

    // article create
    Route::get('user/panel/articles/create', [UserPanelController::class, 'articleCreate'])->name('userPanel.articles.create');
    Route::post('user/panel/articles/store', [UserPanelController::class, 'articleStore'])->name('userPanel.articles.store');

    // article edit(update)
    Route::get('user/panel/articles/id/{id}', [UserPanelController::class, 'articleEdit'])->name('userPanel.articles.edit');
    Route::put('user/panel/articles/update/{id}', [UserPanelController::class, 'articleUpdate'])->name('userPanel.articles.update');

    // single page article
    Route::get('user/panel/articles/slug/{slug}', [UserPanelController::class, 'articleIndex'])->name('userPanel.articles.index');

    // article softDelete
    Route::delete('user/panel/articles/delete/{id}', [UserPanelController::class, 'articleSoftDelete'])->name('userPanel.articles.softDelete');

    // article hardDelete
    Route::get('user/panel/articles/trash/bin', [UserPanelController::class, 'articleTrashed'])->name('userPanel.articles.trashed');
    Route::delete('user/panel/articles/hard-delete/{id}', [UserPanelController::class, 'articleHardDelete'])->name('userPanel.articles.hardDelete');

    // article restore article
    Route::post('user/panel/articles/restore/{id}', [UserPanelController::class, 'articleRestore'])->name('userPanel.articles.restoreArticle');

//------------------------------------------------------------- Settings -------------------------------------------------------------
    //change-password
    Route::view('change-password', 'Panel.User.Settings.ChangePassword.changePassword')->name('userPanel.settings.changePassword');
    Route::post('change-password', [UserPanelController::class, 'updatePassword'])->name('userPanel.settings.updatePassword');

    //change-profile
    Route::get('change-profile', [UserPanelController::class, 'changeProfile'])->name('userPanel.settings.changeProfile');
    Route::post('change-profile', [UserPanelController::class, 'updateProfile'])->name('userPanel.settings.updateProfile');
});
