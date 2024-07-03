<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentClassMappingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDetailsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherDetailsController;
use App\Http\Controllers\TeacherExperienceController;
use App\Http\Controllers\TeacherQualificationController;
use App\Http\Controllers\TeacherSubjectsMappingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login-handler', [UserController::class, 'loginHandler'])->name('login-handler');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::post('/profile-update', [ProfileController::class, 'update'])->name('profile.update');

    //'logout-handler
    Route::get('/logout-handler', [UserController::class, 'logoutHandler'])->name('logout-handler');

    //Teacher Routes
    Route::get('teacher-list', [TeacherController::class, 'index'])->name('teacher.list');
    Route::view('teacher-add', 'teacher.add')->name('teacher.add');
    Route::post('teacher-create', [TeacherController::class, 'store'])->name('teacher.create');
    Route::get('teacher-edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('teacher-update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('teacher-delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.delete');
    Route::get('teacher-status/{id}', [TeacherController::class, 'changeStatus'])->name('teacher.status');

    //Teacher Details
    Route::get('teacher-details/{id}', [TeacherDetailsController::class, 'details'])->name('teacher.details');
    Route::get('teacher-details-create', [TeacherDetailsController::class, 'detailsCreate'])->name('teacher.details.create');
    Route::post('teacher-details-update/{id}', [TeacherDetailsController::class, 'detailsUpdate'])->name('teacher.details.update');

    //Teacher Qualifications
    Route::get('teacher-qualifications/{id}', [TeacherQualificationController::class, 'index'])->name('teacher.qualifications');
    Route::get('teacher-qualifications-create', [TeacherQualificationController::class, 'store'])->name('teacher.qualifications.create');
    Route::post('teacher-qualifications-update/{id}', [TeacherQualificationController::class, 'update'])->name('teacher.qualifications.update');
    Route::delete('teacher-qualifications-delete/{id}', [TeacherQualificationController::class, 'destroy'])->name('teacher.qualifications.delete');

    //Teacher Experiences
    Route::get('teacher-experiences/{id}', [TeacherExperienceController::class, 'index'])->name('teacher.experiences');
    Route::get('teacher-experiences-create', [TeacherExperienceController::class, 'store'])->name('teacher.experiences.create');
    Route::post('teacher-experiences-update/{id}', [TeacherExperienceController::class, 'update'])->name('teacher.experiences.update');
    Route::delete('teacher-experiences-delete/{id}', [TeacherExperienceController::class, 'destroy'])->name('teacher.experiences.delete');

    //Classes Routes
    Route::get('class-list', [ClassesController::class, 'index'])->name('classes.list');
    Route::view('class-add', 'classes.add')->name('classes.add');
    Route::post('class-create', [ClassesController::class, 'store'])->name('classes.create');
    Route::get('class-edit/{id}', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::post('class-update/{id}', [ClassesController::class, 'update'])->name('classes.update');
    Route::get('class-delete/{id}', [ClassesController::class, 'destroy'])->name('classes.delete');
    Route::get('class-status/{id}', [ClassesController::class, 'changeStatus'])->name('classes.status');

    //Division Routes
    Route::get('division-list/{id}', [DivisionController::class, 'index'])->name('divisions.list');
    Route::view('division-add', 'classes.divisions.add')->name('divisions.add');
    Route::post('division-create', [DivisionController::class, 'store'])->name('divisions.create');
    Route::get('division-edit/{id}', [DivisionController::class, 'edit'])->name('divisions.edit');
    Route::post('division-update/{id}', [DivisionController::class, 'update'])->name('divisions.update');
    Route::get('division-delete/{id}', [DivisionController::class, 'destroy'])->name('divisions.delete');

    //Student Routes
    Route::get('student-list', [StudentController::class, 'index'])->name('students.list');
    Route::view('student-add', 'students.add')->name('students.add');
    Route::post('student-create', [StudentController::class, 'store'])->name('students.create');
    Route::get('student-edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('student-update/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('student-delete/{id}', [StudentController::class, 'destroy'])->name('students.delete');
    Route::get('student-status/{id}', [StudentController::class, 'changeStatus'])->name('students.status');

    //Student Class Mapping Routes
    Route::get('student-class-mapping', [StudentClassMappingController::class, 'index'])->name('students.class.list');
    Route::get('student-class-mapping-add', [StudentClassMappingController::class, 'create'])->name('students.class.add');
    Route::post('student-class-mapping', [StudentClassMappingController::class, 'store'])->name('students.class.create');
    Route::post('student-class-mapping/{id}', [StudentClassMappingController::class, 'edit'])->name('students.class.edit');
    Route::post('student-class-mapping-update/{id}', [StudentClassMappingController::class, 'update'])->name('students.class.update');
    Route::get('student-class-mapping-delete/{id}', [StudentClassMappingController::class, 'destroy'])->name('students.class.delete');
    Route::post('students-divisions-list', [StudentClassMappingController::class, 'getDivisions'])->name('students.divisions.list');


    //Student Details Routes
    Route::get('student-details/{id}', [StudentDetailsController::class, 'index'])->name('students.details');
    Route::view('student-details-add/{id}', 'students.details.add')->name('students.details.add');
    Route::post('student-details-create', [StudentDetailsController::class, 'store'])->name('students.details.create');
    Route::post('student-details-update/{id}', [StudentDetailsController::class, 'update'])->name('students.details.update');
    Route::get('student-details-delete/{id}', [StudentDetailsController::class, 'destroy'])->name('students.details.delete');

    Route::get('student-class-mapping', [StudentClassMappingController::class, 'index'])->name('students.class.list');
    Route::post('student-class-mapping', [StudentClassMappingController::class, 'store'])->name('students.class.create');
    Route::post('student-class-mapping/{id}', [StudentClassMappingController::class, 'edit'])->name('students.class.edit');
    Route::post('student-class-mapping-update/{id}', [StudentClassMappingController::class, 'update'])->name('students.class.update');
    Route::get('student-class-mapping-delete/{id}', [StudentClassMappingController::class, 'destroy'])->name('students.class.delete');

    Route::get('student-attendance', [StudentAttendanceController::class, 'index'])->name('students.attendance');
    Route::post('student-attendance', [StudentAttendanceController::class, 'update'])->name('students.attendance.update');

    // Subject Routes
    Route::get('subject-list', [SubjectController::class, 'index'])->name('subjects.list');
    Route::view('subject-add', 'subjects.add')->name('subjects.add');
    Route::post('subject-create', [SubjectController::class, 'store'])->name('subjects.create');
    Route::get('subject-edit/{id}', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::post('subject-update/{id}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::get('subject-delete/{id}', [SubjectController::class, 'destroy'])->name('subjects.delete');

    // Teacher Subjects Mapping Routes
    Route::get('teacher-subject-mapping', [TeacherSubjectsMappingController::class, 'index'])->name('teacher.subject.mapping');
    Route::get('teacher-subject-mapping-add', [TeacherSubjectsMappingController::class, 'create'])->name('teacher.subject.mapping.add');
    Route::post('teacher-subject-mapping-create', [TeacherSubjectsMappingController::class, 'store'])->name('teacher.subject.mapping.create');
    Route::get('teacher-subject-mapping-edit/{id}', [TeacherSubjectsMappingController::class, 'edit'])->name('teacher.subject.mapping.edit');
    Route::post('teacher-subject-mapping-update/{id}', [TeacherSubjectsMappingController::class, 'update'])->name('teacher.subject.mapping.update');
    Route::get('teacher-subject-mapping-delete/{id}', [TeacherSubjectsMappingController::class, 'destroy'])->name('teacher.subject.mapping.delete');

    //Schedules Routes
    Route::get('schedules', [SchedulesController::class, 'index'])->name('schedules.list');
    Route::get('schedules-add', [SchedulesController::class, 'create'])->name('schedules.add');
    Route::post('schedules-create', [SchedulesController::class, 'store'])->name('schedules.create');
    Route::get('schedules-edit/{id}', [SchedulesController::class, 'edit'])->name('schedules.edit');
    Route::post('schedules-update/{id}', [SchedulesController::class, 'update'])->name('schedules.update');
    Route::get('schedules-delete/{id}', [SchedulesController::class, 'destroy'])->name('schedules.delete');

    // Leaves Routes
    Route::get('leaves', [LeavesController::class, 'index'])->name('leaves.list');
    Route::view('leaves-add', 'teacher.leaves.add')->name('leaves.add');
    Route::post('leaves-create', [LeavesController::class, 'store'])->name('leaves.create');
    Route::get('leaves-edit/{id}', [LeavesController::class, 'edit'])->name('leaves.edit');
    Route::post('leaves-update/{id}', [LeavesController::class, 'update'])->name('leaves.update');
    Route::delete('leaves-delete/{id}', [LeavesController::class, 'destroy'])->name('leaves.delete');
    Route::post('leaves-status/{id}', [LeavesController::class, 'changeStatus'])->name('leaves.status');

});

require __DIR__.'/auth.php';
