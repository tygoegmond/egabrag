<?php
use App\Http\Controllers\API\SavinggoalsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/sanctum/token', [AuthController::class, 'token']);
Route::post('/sanctum/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    
    Route::get('/posts', [PostController::class, 'getPosts']);
    Route::get('/posts/{id}', [PostController::class, 'getPost']);
    Route::get('/savinggoals',[SavinggoalsController::class,'getGoals']);
    Route::post('/savinggoals',[SavinggoalsController::class,'createGoals']);
    Route::delete('/savinggoals',[SavinggoalsController::class,'deleteGoals']);
    Route::patch('/savinggoals',[SavinggoalsController::class,'updateGoals']);
});

