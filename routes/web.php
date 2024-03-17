<?php

use App\Enums\Permissions;
use App\Http\Controllers\DownloadPolicyDocumentController;
use App\Livewire\Policies\Show;
use App\Models\Policy;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::prefix('policies')->as('policies.')->group(function () {
    Route::get('/', function () {
        return redirect('dashboard');
    })->name('index');

    Route::get('/new', function () {
        return view('policies.new');
    })->name('create')->can('create', Policy::class);

    Route::get('/{policy}', Show::class)->name('show')->middleware('can:view,policy');

    Route::get('/{policy}/edit', function (Policy $policy) {
        return view('policies.update');
    })->name('update')->middleware('can:update,policy');

    Route::get('/{policy}/delete', function (Policy $policy) {
        return view('policies.delete');
    })->name('destroy')->middleware('can:delete,policy');

    Route::get('/{policy}/download', DownloadPolicyDocumentController::class)
        ->name('download')
        ->can(Permissions::DOWNLOAD_PDF->value);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
