<?php

use App\Http\Controllers\MyData\UserController;
use App\Http\Controllers\MyData\RolesController;
use App\Http\Controllers\MyData\DepartmentsController;
use App\Http\Controllers\MyData\ProgramsController;
use App\Http\Controllers\MyData\StudentsController;
use App\Http\Controllers\MyData\RemarksController;
use App\Http\Controllers\MyData\HomeController;
use App\Http\Controllers\MyData\MessagesController;
use App\Http\Controllers\MyData\ChangePasswordController;
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
});




Auth::routes();
 
//Dashboard Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hodHome', [App\Http\Controllers\HomeController::class, 'hodindex'])->name('hodHome');
Route::get('/registrarHome', [App\Http\Controllers\HomeController::class, 'registrarindex'])->name('registrarHome');
Route::get('/roHome', [App\Http\Controllers\HomeController::class, 'roindex'])->name('roHome');
Route::get('/financeHome', [App\Http\Controllers\HomeController::class, 'financeindex'])->name('financeHome');
Route::get('/librarianHome', [App\Http\Controllers\HomeController::class, 'libindex'])->name('librarianHome');
Route::get('/studentHome', [App\Http\Controllers\HomeController::class, 'studentindex'])->name('studentHome');
 
//Login View Routes
Route::get('/hodLogin', [App\Http\Controllers\MyData\UserController::class, 'login']);
Route::get('/registrarLogin', [App\Http\Controllers\MyData\UserController::class, 'registrarLogin']);
Route::get('/financeLogin', [App\Http\Controllers\MyData\UserController::class, 'financeLogin']);
Route::get('/roLogin', [App\Http\Controllers\MyData\UserController::class, 'recordsLogin']);
Route::get('/librarianLogin', [App\Http\Controllers\MyData\UserController::class, 'librarianLogin']);
Route::get('/studentLogin', [App\Http\Controllers\MyData\UserController::class, 'studentLogin']);
Route::get('/viewApprovedStudents', [App\Http\Controllers\MyData\StudentsController::class, 'selectApprovedList']);
Route::get('/approvedStudents', [App\Http\Controllers\MyData\StudentsController::class, 'getApprovedStudents'])->name('users.hod.approvedStudents');
Route::get('/nameConfirmation/{department_id}', [App\Http\Controllers\MyData\StudentsController::class, 'getStudentNames'])->name('users.hod.nameConfirm');
Route::get('/viewAll', [App\Http\Controllers\MyData\StudentsController::class, 'viewAllStudents'])->name('users.hod.viewAll');
Route::get('/viewAllStudents', [App\Http\Controllers\MyData\StudentsController::class, 'viewStudents'])->name('students.viewStudents');
Route::get('/graduationList/{department_id}', [App\Http\Controllers\MyData\StudentsController::class, 'graduationList'])->name('users.hod.graduationList');
Route::get('/createList/{department_id}', [App\Http\Controllers\MyData\StudentsController::class, 'createList'])->name('users.hod.createList');
Route::get("addRemarks/{department_id}/{student_id}", [StudentsController::class, "addRemarks"])->name("users.hod.addRemarks");
Route::get('/viewStudent/{student_id}', [App\Http\Controllers\MyData\StudentsController::class, 'viewStudent'])->name('users.hod.view');
 
//Login Routes
 
//LaikipiaHostels Logins: joel@laikipiahostels.com:Kiamalat8877:$2a$12$JmNybsXGgzRDqY0mUIj0N.5IHfG5jhpnQBOKWYAWsjsmYS.CJa1gm
//                        makumi@zalego.com::$2y$10$G/fuJKsfAJC7dqSKLogb5ewWKhDKrN0rftDdSePrWkqPbFNZxNXu. 

Route::resource('users', UserController::class);
Route::resource('roles', RolesController::class);
Route::resource('departments', DepartmentsController::class);
Route::resource('programs', ProgramsController::class);
Route::resource('students', StudentsController::class);
Route::post('saveStudent', [StudentsController::class, 'saveStudents'])->name('students.saveStudent');
Route::resource('remarks', RemarksController::class);
Route::post('roles/{role}',[RolesController::class, 'update'])->name('roles.update');
Route::post('users/{user}/change-password',[ChangePasswordController::class, 'change_password'])->name('users.change.password');