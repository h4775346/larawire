<?php

use App\Http\Livewire\Users\Index;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',\App\Http\Livewire\Dashboard::class)->name('dashboard');
    Route::get('users', Index::class)->name('users.index');
    Route::get('roles', App\Http\Livewire\Roles\Index::class)->name('roles.index');
});
