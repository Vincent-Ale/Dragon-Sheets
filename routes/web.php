<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/characters');
    } else {
        return view('welcome');
    }
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


//#############################################################################################################
//####################################   CHARACTERS   #########################################################
//############################################################################################################# 

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

Route::put('/characters/show/{character}/update-lore', [CharacterController::class, 'updateLore'])->name('characters.updateLore');
Route::put('/characters/show/{character}/update-notepad', [CharacterController::class, 'updateNotepad'])->name('characters.updateNotepad');

//#############################################################################################################
//####################################   CHARACTERS END  ######################################################
//############################################################################################################# 






//#############################################################################################################
//####################################   STATS   ##############################################################
//#############################################################################################################

Route::get('/characters/show/{character}/stats', [CharacterController::class, 'IndexStat'])
->name('stats.index');

Route::get('/characters/create/{character}/stats', [CharacterController::class,'CreateStat'])
->name('stats.create');

Route::post('/characters/store/{character}/stats', [CharacterController::class,'StoreStat'])
->name('stats.store');

Route::get('/characters/edit/{character}/stats', [CharacterController::class,'EditStat'])
->name('stats.edit');

Route::put('/characters/update/{character}/stats', [CharacterController::class,'UpdateStat'])
->name('stats.update');

//#############################################################################################################
//####################################   STATS END   ##########################################################
//#############################################################################################################






//#############################################################################################################
//########################################   SKILLS   #########################################################
//############################################################################################################# 

Route::get('/characters/show/{character}/skills', [CharacterController::class, 'IndexSkill'])
->name('skills.index');

Route::get('/characters/create/{character}/skills', [CharacterController::class,'CreateSkill'])
->name('skills.create');

Route::post('/characters/store/{character}/skills', [CharacterController::class,'StoreSkill'])
->name('skills.store');

Route::get('/characters/edit/{character}/skills', [CharacterController::class,'EditSkill'])
->name('skills.edit');

Route::put('/characters/update/{character}/skills', [CharacterController::class,'UpdateSkill'])
->name('skills.update');

//#############################################################################################################
//########################################   SKILLS END  ######################################################
//############################################################################################################# 







//#############################################################################################################
//########################################   COMBAT   #########################################################
//############################################################################################################# 

Route::get('/characters/show/{character}/combats', [CharacterController::class, 'IndexCombat'])
->name('combats.index');

Route::get('/characters/create/{character}/combats', [CharacterController::class,'CreateCombat'])
->name('combats.create');

Route::post('/characters/store/{character}/combats', [CharacterController::class,'StoreCombat'])
->name('combats.store');

Route::get('/characters/edit/{character}/combats', [CharacterController::class,'EditCombat'])
->name('combats.edit');

Route::put('/characters/update/{character}/combats', [CharacterController::class,'UpdateCombat'])
->name('combats.update');

//#############################################################################################################
//#######################################   COMBAT END  #######################################################
//############################################################################################################# 