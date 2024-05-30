<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('welcome');
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

<<<<<<< HEAD
Route::get('/home', function () {
    return view('home');
});
=======
Route::get('/characters', function () {
    return view('characters');
});

Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/characters/show/{character}', [CharacterController::class,'show'])
->name('characters.show');

Route::get('/characters/create', [CharacterController::class,'create'])
->name('characters.create');

Route::post('/characters/store', [CharacterController::class,'store'])
->name('characters.store');

Route::get('/characters/edit/{character}', [CharacterController::class,'edit'])
->name('characters.edit');

Route::put('/characters/update/{character}', [CharacterController::class,'update'])
->name('characters.update');

Route::delete('/characters/destroy/{character}', [CharacterController::class,'destroy'])
->name('characters.destroy');





Route::get('/characters/show/{character}/skills', [CharacterController::class, 'IndexSkill'])->name('skills.index');

Route::get('/characters/edit/{character}/skills', [CharacterController::class,'EditSkill'])
->name('skills.edit');

Route::put('/characters/update/{character}/skills', [CharacterController::class,'UpdateSkill'])
->name('skills.update');

>>>>>>> main
