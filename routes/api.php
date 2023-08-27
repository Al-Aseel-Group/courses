<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherSkillController;
use Illuminate\Support\Facades\Http;

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

// POST
// GET
// DELETE
// PUT






Route::apiResource('student',StudentController::class);
Route::apiResource('course',CourseController::class);
Route::apiResource('teacher',TeacherController::class);

Route::post('teacher/{teacher_id}/skill',[TeacherSkillController::class,'store']);
Route::delete('teacher/{teacher_id}/skill/{skill_id}',[TeacherSkillController::class,'destroy']);

