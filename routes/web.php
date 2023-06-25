<?php

use App\Http\Controllers\ShareController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//ROTAS AGRUPADAS DE USUÁRIO

Route::group(['prefix' => '/user'], function () {

    Route::get('/', [UserController::class, 'index'])->name('user');

    Route::get('/create', [UserController::class, 'create'])->name('user.create');

    Route::post('/create', [UserController::class, 'createSave']);

    Route::get('/login', [UserController::class, 'login'])->name('user.login');

    Route::post('/login', [UserController::class, 'login']);

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

    Route::get('/shared/documents', [UserController::class, 'viewSharedDocuments'])->name('user.shared.documents')->middleware('auth');

    Route::get('/shared/texts', [UserController::class, 'viewSharedTexts'])->name('user.shared.texts')->middleware('auth');

    Route::get('/user/shared', [UserController::class, 'viewShared'])->name('user.shared')->middleware('auth');
});

//ROTAS AGRUPADAS DE UPLOAD

Route::group(['prefix' => '/upload'], function () {

    Route::get('/', [UploadController::class, 'index'])->name('upload')->middleware('auth');

    Route::post('/uploadDoc', [UploadController::class, 'uploadDoc'])->name('upload.doc');

    Route::post('/uploadText', [UploadController::class, 'uploadText'])->name('upload.text');

    Route::get('/uploads', [UploadController::class, 'viewUploads'])->name('uploads.view')->middleware('auth');

    Route::get('/apagar/{document}', [UploadController::class, 'apagar'])->name('upload.apagar');

    Route::delete('/apagar/{document}', [UploadController::class, 'apagar'])->name('upload.apagar');

    Route::delete('/apagar/text/{text}', [UploadController::class, 'apagartext'])->name('upload.apagartext');

    Route::get('/editar/texto/{text}', [UploadController::class, 'editarTexto'])->name('upload.edittext');

    Route::put('/atualizar/texto/{text}', [UploadController::class, 'atualizarTexto'])->name('upload.updateText');
});

//ROTAS AGRUPADAS DE SHARE

Route::group(['prefix' => '/share'], function () {

    //REFERENTE A DOCUMENTOS

    Route::get('/document/{document}', [ShareController::class, 'indexDocument'])->name('sharedoc.document');

    Route::post('/share/save', [ShareController::class, 'savePermissions'])->name('share.savePermissions');

    Route::get('/share/{document}', [ShareController::class, 'showSharePage'])->name('share.show');

    Route::delete('/share/{document}', [ShareController::class, 'deleteDocument'])->name('share.delete');

    //REFERNTE A TEXTOS

    Route::get('/text/{text}', [ShareController::class, 'indexText'])->name('sharetext.text');

    Route::post('/text/save', [ShareController::class, 'saveTextPermissions'])->name('share.saveTextPermissions');

    Route::get('/share/{text}', [ShareController::class, 'showSharePage'])->name('share.show');

    Route::delete('/share/{text}', [ShareController::class, 'deleteText'])->name('share.delete');
});
