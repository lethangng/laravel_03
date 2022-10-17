<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
});


Route::prefix('students')->group(function() {
    Route::get('/', [StudentController::class, 'get_all_student'])->name('student');

    Route::get('add', [StudentController::class, 'add_student'])->name('student.add_student');
    
    Route::post('add', [StudentController::class, 'add'])->name('student.add');

    Route::get('{student}', [StudentController::class, 'get_student_by_id'])->name('student.detail');
    
    Route::put('{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
       
    Route::delete('{student}/delete', [StudentController::class, 'delete_student'])->name('student.delete_student');
});
