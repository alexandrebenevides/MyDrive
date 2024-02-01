<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\UserPermission;

use App\Livewire\Pages\SignIn;
use App\Livewire\Pages\SignUp;
use App\Livewire\Pages\Dashboard\MyFiles;
 
Route::get('/', SignIn::class);
Route::get('/signin', SignIn::class);
Route::get('/signup', SignUp::class);

Route::prefix('/dashboard')->middleware([UserPermission::class])->group(function () {
    Route::get('/myfiles', MyFiles::class);
});