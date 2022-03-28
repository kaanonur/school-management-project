<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// User Management Routes
Route::prefix('users')->group(function () {
    Route::get('view', [UserController::class, 'index'])->name('user.view');
    Route::get('add', [UserController::class, 'create'])->name('user.create');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
});

// User Profile and Change Password
Route::prefix('profile')->group(function () {
    Route::get('view', [ProfileController::class, 'index'])->name('profile.view');
    Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('password/view', [ProfileController::class, 'passwordEdit'])->name('password.view');
    Route::post('password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
});


Route::prefix('setups')->group(function () {
    // Student Class Routes
    Route::get('student/class/view', [StudentClassController::class, 'index'])->name('student.class.view');
    Route::get('student/class/create', [StudentClassController::class, 'create'])->name('student.class.create');
    Route::post('student/class/store', [StudentClassController::class, 'store'])->name('student.class.store');
    Route::get('student/class/edit/{studentClass}', [StudentClassController::class, 'edit'])->name('student.class.edit');
    Route::post('student/class/update/{studentClass}', [StudentClassController::class, 'update'])->name('student.class.update');
    Route::get('student/class/delete/{studentClass}', [StudentClassController::class, 'destroy'])->name('student.class.delete');

    // Student Year Routes
    Route::get('student/year/view', [StudentYearController::class, 'index'])->name('student.year.view');
    Route::get('student/year/create', [StudentYearController::class, 'create'])->name('student.year.create');
    Route::post('student/year/store', [StudentYearController::class, 'store'])->name('student.year.store');
    Route::get('student/year/edit/{studentYear}', [StudentYearController::class, 'edit'])->name('student.year.edit');
    Route::post('student/year/update/{studentYear}', [StudentYearController::class, 'update'])->name('student.year.update');
    Route::get('student/year/delete/{studentYear}', [StudentYearController::class, 'destroy'])->name('student.year.delete');

    // Student Group Routes
    Route::get('student/group/view', [StudentGroupController::class, 'index'])->name('student.group.view');
    Route::get('student/group/create', [StudentGroupController::class, 'create'])->name('student.group.create');
    Route::post('student/group/store', [StudentGroupController::class, 'store'])->name('student.group.store');
    Route::get('student/group/edit/{studentGroup}', [StudentGroupController::class, 'edit'])->name('student.group.edit');
    Route::post('student/group/update/{studentGroup}', [StudentGroupController::class, 'update'])->name('student.group.update');
    Route::get('student/group/delete/{studentGroup}', [StudentGroupController::class, 'destroy'])->name('student.group.delete');

    // Student Shift Routes
    Route::get('student/shift/view', [StudentShiftController::class, 'index'])->name('student.shift.view');
    Route::get('student/shift/create', [StudentShiftController::class, 'create'])->name('student.shift.create');
    Route::post('student/shift/store', [StudentShiftController::class, 'store'])->name('student.shift.store');
    Route::get('student/shift/edit/{studentShift}', [StudentShiftController::class, 'edit'])->name('student.shift.edit');
    Route::post('student/shift/update/{studentShift}', [StudentShiftController::class, 'update'])->name('student.shift.update');
    Route::get('student/shift/delete/{studentShift}', [StudentShiftController::class, 'destroy'])->name('student.shift.delete');

    // Fee Category Routes
    Route::get('fee/category/view', [FeeCategoryController::class, 'index'])->name('fee.category.view');
    Route::get('fee/category/create', [FeeCategoryController::class, 'create'])->name('fee.category.create');
    Route::post('fee/category/store', [FeeCategoryController::class, 'store'])->name('fee.category.store');
    Route::get('fee/category/edit/{feeCategory}', [FeeCategoryController::class, 'edit'])->name('fee.category.edit');
    Route::post('fee/category/update/{feeCategory}', [FeeCategoryController::class, 'update'])->name('fee.category.update');
    Route::get('fee/category/delete/{feeCategory}', [FeeCategoryController::class, 'destroy'])->name('fee.category.delete');

    // Fee Category Amount Routes
    Route::get('fee/amount/view', [FeeAmountController::class, 'index'])->name('fee.amount.view');
    Route::get('fee/amount/create', [FeeAmountController::class, 'create'])->name('fee.amount.create');
    Route::post('fee/amount/store', [FeeAmountController::class, 'store'])->name('fee.amount.store');
    Route::get('fee/amount/edit/{feeCategory}', [FeeAmountController::class, 'edit'])->name('fee.amount.edit');
    Route::post('fee/amount/update/{feeCategory}', [FeeAmountController::class, 'update'])->name('fee.amount.update');
    Route::get('fee/amount/details/{feeCategory}', [FeeAmountController::class, 'show'])->name('fee.amount.detail');

    // Exam Type Routes
    Route::get('exam/type/view', [ExamTypeController::class, 'index'])->name('exam.type.view');
    Route::get('exam/type/create', [ExamTypeController::class, 'create'])->name('exam.type.create');
    Route::post('exam/type/store', [ExamTypeController::class, 'store'])->name('exam.type.store');
    Route::get('exam/type/edit/{examType}', [ExamTypeController::class, 'edit'])->name('exam.type.edit');
    Route::post('exam/type/update/{examType}', [ExamTypeController::class, 'update'])->name('exam.type.update');
    Route::get('exam/type/delete/{examType}', [ExamTypeController::class, 'destroy'])->name('exam.type.delete');

    // School Subject Routes
    Route::get('school/subject/view', [SchoolSubjectController::class, 'index'])->name('school.subject.view');
    Route::get('school/subject/create', [SchoolSubjectController::class, 'create'])->name('school.subject.create');
    Route::post('school/subject/store', [SchoolSubjectController::class, 'store'])->name('school.subject.store');
    Route::get('school/subject/edit/{schoolSubject}', [SchoolSubjectController::class, 'edit'])->name('school.subject.edit');
    Route::post('school/subject/update/{schoolSubject}', [SchoolSubjectController::class, 'update'])->name('school.subject.update');
    Route::get('school/subject/delete/{schoolSubject}', [SchoolSubjectController::class, 'destroy'])->name('school.subject.delete');

    // Assign Subject Routes
    Route::get('assign/subject/view', [AssignSubjectController::class, 'index'])->name('assign.subject.view');
    Route::get('assign/subject/create', [AssignSubjectController::class, 'create'])->name('assign.subject.create');
    Route::post('assign/subject/store', [AssignSubjectController::class, 'store'])->name('assign.subject.store');
    Route::get('assign/subject/edit/{studentClass}', [AssignSubjectController::class, 'edit'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{studentClass}', [AssignSubjectController::class, 'update'])->name('assign.subject.update');
    Route::get('assign/subject/details/{studentClass}', [AssignSubjectController::class, 'show'])->name('assign.subject.detail');
});
