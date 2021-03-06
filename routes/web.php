<?php

use App\Http\Controllers\Backend\Account\StudentFeeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeRegistrationController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\Marks\GradeController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Report\AttendanceReportController;
use App\Http\Controllers\Backend\Report\MarkSheetController;
use App\Http\Controllers\Backend\Report\ProfitController;
use App\Http\Controllers\Backend\Report\StudentResultController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegistrationController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Account;

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

Route::middleware(['auth', 'prevent-back-history'])->group(function () {
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

        // Designation Routes
        Route::get('designation/view', [DesignationController::class, 'index'])->name('designation.view');
        Route::get('designation/create', [DesignationController::class, 'create'])->name('designation.create');
        Route::post('designation/store', [DesignationController::class, 'store'])->name('designation.store');
        Route::get('designation/edit/{designation}', [DesignationController::class, 'edit'])->name('designation.edit');
        Route::post('designation/update/{designation}', [DesignationController::class, 'update'])->name('designation.update');
        Route::get('designation/delete/{designation}', [DesignationController::class, 'destroy'])->name('designation.delete');
    });

    // Student Registration Routes
    Route::prefix('students')->group(function () {
        Route::get('registration/view', [StudentRegistrationController::class, 'index'])->name('student.registration.view');
        Route::get('registration/add', [StudentRegistrationController::class, 'create'])->name('student.registration.create');
        Route::post('registration/store', [StudentRegistrationController::class, 'store'])->name('student.registration.store');
        Route::get('registration/details/{assignStudent}', [StudentRegistrationController::class, 'show'])->name('student.registration.show');
        Route::get('registration/edit/{assignStudent}', [StudentRegistrationController::class, 'edit'])->name('student.registration.edit');
        Route::post('registration/update/{assignStudent}', [StudentRegistrationController::class, 'update'])->name('student.registration.update');
        Route::get('registration/delete/{assignStudent}', [StudentRegistrationController::class, 'destroy'])->name('student.registration.delete');
        Route::get('year/class/wise', [StudentRegistrationController::class, 'search'])->name('student.year.class.wise');

        // Roll Generate Routes
        Route::get('roll/generate/view', [StudentRollController::class, 'index'])->name('roll.generate.view');
        Route::get('roll/generate/getStudents', [StudentRollController::class, 'getStudents'])->name('student.registration.getStudents');
        Route::post('roll/generate/store', [StudentRollController::class, 'store'])->name('roll.generate.store');

        // Registration Fee Routes
        Route::get('registration/fee/view', [RegistrationFeeController::class, 'index'])->name('registration.fee.view');
        Route::get('registration/fee/classWiseData', [RegistrationFeeController::class, 'getRegFeeClassWise'])->name('student.registration.fee.classwise.get');
        Route::get('registration/fee/paySlip', [RegistrationFeeController::class, 'paySlip'])->name('student.registration.fee.paySlip');

        // Monthly Fee Routes
        Route::get('monthly/fee/view', [MonthlyFeeController::class, 'index'])->name('monthly.fee.view');
        Route::get('monthly/fee/classWiseData', [MonthlyFeeController::class, 'getMonthlyFeeClassWise'])->name('student.monthly.fee.classwise.get');
        Route::get('monthly/fee/paySlip', [MonthlyFeeController::class, 'paySlip'])->name('student.monthly.fee.paySlip');

        // Exam Fee Routes
        Route::get('exam/fee/view', [ExamFeeController::class, 'index'])->name('exam.fee.view');
        Route::get('exam/fee/classWiseData', [ExamFeeController::class, 'getExamFeeClassWise'])->name('student.exam.fee.classwise.get');
        Route::get('exam/fee/paySlip', [ExamFeeController::class, 'paySlip'])->name('student.exam.fee.paySlip');
    });

    // Employee Routes
    Route::prefix('employees')->group(function () {
        // Registration Routes
        Route::get('registration/view', [EmployeeRegistrationController::class, 'index'])->name('employee.registration.view');
        Route::get('registration/add', [EmployeeRegistrationController::class, 'create'])->name('employee.registration.create');
        Route::post('registration/store', [EmployeeRegistrationController::class, 'store'])->name('employee.registration.store');
        Route::get('registration/details/{user}', [EmployeeRegistrationController::class, 'show'])->name('employee.registration.show');
        Route::get('registration/edit/{user}', [EmployeeRegistrationController::class, 'edit'])->name('employee.registration.edit');
        Route::post('registration/update/{user}', [EmployeeRegistrationController::class, 'update'])->name('employee.registration.update');
//        Route::get('registration/delete/{user}', [EmployeeRegistrationController::class, 'destroy'])->name('employee.registration.delete');

        // Salary Routes
        Route::get('salary/view', [EmployeeSalaryController::class, 'index'])->name('employee.salary.view');
        Route::get('salary/add', [EmployeeSalaryController::class, 'create'])->name('employee.salary.create');
        Route::get('salary/increment/{user}', [EmployeeSalaryController::class, 'increment'])->name('employee.salary.increment');
        Route::post('salary/increment/{user}', [EmployeeSalaryController::class, 'update'])->name('employee.salary.update');
        Route::get('salary/details/{user}', [EmployeeSalaryController::class, 'show'])->name('employee.salary.show');

        // Leave Routes
        Route::get('leave/view', [EmployeeLeaveController::class, 'index'])->name('employee.leave.view');
        Route::get('leave/add', [EmployeeLeaveController::class, 'create'])->name('employee.leave.create');
        Route::post('leave/store', [EmployeeLeaveController::class, 'store'])->name('employee.leave.store');
        Route::get('leave/edit/{employeeLeave}', [EmployeeLeaveController::class, 'edit'])->name('employee.leave.edit');
        Route::post('leave/update/{employeeLeave}', [EmployeeLeaveController::class, 'update'])->name('employee.leave.update');
        Route::get('leave/delete/{employeeLeave}', [EmployeeLeaveController::class, 'destroy'])->name('employee.leave.delete');

        // Attendance Routes
        Route::get('attendance/view', [EmployeeAttendanceController::class, 'index'])->name('employee.attendance.view');
        Route::get('attendance/add', [EmployeeAttendanceController::class, 'create'])->name('employee.attendance.create');
        Route::post('attendance/store', [EmployeeAttendanceController::class, 'store'])->name('employee.attendance.store');
        Route::get('attendance/edit/{date}', [EmployeeAttendanceController::class, 'edit'])->name('employee.attendance.edit');
        Route::get('attendance/show/{date}', [EmployeeAttendanceController::class, 'show'])->name('employee.attendance.show');

        // Monthly Salary
        Route::get('monthly/salary/view', [MonthlySalaryController::class, 'index'])->name('employee.monthly.salary.view');
        Route::get('monthly/salary/get', [MonthlySalaryController::class, 'monthlySalaryGet'])->name('employee.monthly.salary.get');
        Route::get('monthly/salary/paySlip/{user}', [MonthlySalaryController::class, 'paySlip'])->name('employee.monthly.salary.paySlip');
    });

    // Marks Routes
    Route::prefix('marks')->group(function () {

        //Entry Routes
        Route::get('entry/add', [MarksController::class, 'create'])->name('marks.entry.create');
        Route::get('subjects/get', [MarksController::class, 'getSubjects'])->name('marks.getSubjects');
        Route::get('getStudents', [MarksController::class, 'getStudents'])->name('student.marks.getStudents');
        Route::get('getStudentsWithMarks', [MarksController::class, 'getStudentsWithMarks'])->name('student.marks.getStudentsWithMarks');
        Route::post('entry/store', [MarksController::class, 'store'])->name('marks.entry.store');
        Route::get('entry/edit', [MarksController::class, 'edit'])->name('marks.entry.edit');
        Route::post('entry/update', [MarksController::class, 'update'])->name('marks.entry.update');

        // Grade Routes
        Route::get('grade/view', [GradeController::class, 'index'])->name('marks.grade.view');
        Route::get('grade/add', [GradeController::class, 'create'])->name('marks.grade.create');
        Route::post('grade/store', [GradeController::class, 'store'])->name('marks.grade.store');
        Route::get('grade/edit/{marksGrade}', [GradeController::class, 'edit'])->name('marks.grade.edit');
        Route::post('grade/update/{marksGrade}', [GradeController::class, 'update'])->name('marks.grade.update');
    });

    // Account Routes
    Route::prefix('account')->group(function () {
        // Student Fee Routes
        Route::get('student/fee/view', [StudentFeeController::class, 'index'])->name('student.fee.view');
        Route::get('student/fee/add', [StudentFeeController::class, 'create'])->name('student.fee.create');
        Route::get('account/fee/getStudents', [StudentFeeController::class, 'getStudents'])->name('account.fee.getStudents');
        Route::post('student/fee/store', [StudentFeeController::class, 'store'])->name('account.fee.store');

        // Employee Salary Routes
        Route::get('employee/salary/view', [Account\EmployeeSalaryController::class, 'index'])->name('account.salary.view');
        Route::get('employee/salary/add', [Account\EmployeeSalaryController::class, 'create'])->name('account.salary.create');
        Route::get('employee/salary/getEmployees', [Account\EmployeeSalaryController::class, 'getEmployees'])->name('account.salary.getEmployees');
        Route::post('employee/salary/store', [Account\EmployeeSalaryController::class, 'store'])->name('account.salary.store');

        // Other Cost Routes
        Route::get('other/cost/view', [Account\OtherCostController::class, 'index'])->name('other.cost.view');
        Route::get('other/cost/add', [Account\OtherCostController::class, 'create'])->name('other.cost.create');
        Route::post('other/cost/store', [Account\OtherCostController::class, 'store'])->name('other.cost.store');
        Route::get('other/cost/edit/{accountOtherCost}', [Account\OtherCostController::class, 'edit'])->name('other.cost.edit');
        Route::post('other/cost/update/{accountOtherCost}', [Account\OtherCostController::class, 'update'])->name('other.cost.update');
        Route::get('other/cost/delete/{accountOtherCost}', [Account\OtherCostController::class, 'destroy'])->name('other.cost.destroy');
    });

    // Report Routes
    Route::prefix('reports')->group(function () {

        // Other Cost Routes
        Route::get('monthly_yearly/profit/view', [ProfitController::class, 'index'])->name('monthly_yearly.profit.view');
        Route::get('monthly_yearly/profit/datewais', [ProfitController::class, 'getProfitDateWais'])->name('report.profit.datewais.get');
        Route::get('monthly_yearly/profit/pdf', [ProfitController::class, 'profitPdf'])->name('report.profit.pdf');

        // MarkSheet Generate Routes
        Route::get('markSheet/generate/view', [MarkSheetController::class, 'index'])->name('markSheet.generate.view');
        Route::get('report/markSheet/get', [MarkSheetController::class, 'getMarkSheet'])->name('report.markSheet.get');

        // Attendance Routes
        Route::get('attendance/report/view', [AttendanceReportController::class, 'index'])->name('attendance.report.view');
        Route::get('attendance/report/get', [AttendanceReportController::class, 'getAttendanceReports'])->name('attendance.report.get');

        // Student Result Routes
        Route::get('student/result/view', [StudentResultController::class, 'index'])->name('student.result.view');
        Route::get('student/result/get', [StudentResultController::class, 'getStudentResults'])->name('student.result.get');
        // Student Result Routes
        Route::get('student/id_card/view', [StudentResultController::class, 'idCardView'])->name('student.id_card.view');
        Route::get('student/id_card/get', [StudentResultController::class, 'getIdCard'])->name('student.id_card.get');
    });
});


