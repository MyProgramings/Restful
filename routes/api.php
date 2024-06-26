<?php

use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\RelationshipController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Lesson;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {

    Route::apiResource('lessons', LessonController::class);
    
    Route::apiResource('tags', TagController::class);

    Route::apiResource('users', UserController::class);

    Route::any('lesson', function () {
        $message = "Please make sure to update your code to use the newer version of our API.
        You should use lessons instead of lesson";

        return Response::json([
           'data' => $message,
           'link' => url('documentation/api'),
        ], 404);
    });

    Route::get('users/{id}/lessons', [RelationshipController::class, 'userLessons']);
    
    Route::get('lessons/{id}/tags', [RelationshipController::class, 'lessonTags']);
    
    Route::get('tags/{id}/lessons', [RelationshipController::class, 'tagLessons']);
});
