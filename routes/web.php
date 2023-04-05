<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publicController;
use App\Http\Controllers\postController;
use App\Http\Controllers\sliderController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\newsFeatureController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\mediaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SenfController;
use App\Http\Controllers\SenfStudentController;
use App\Http\Controllers\SenfSubjectController;
use App\Http\Controllers\StdpaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentSubjectAttendanceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', [publicController::class, 'index']);
Route::get('/history', [publicController::class, 'history']);
Route::get('/president-message', [publicController::class, 'presidentMessage']);
Route::get('/facts-figures', [publicController::class, 'factsFigures']);
Route::get('/strategic-plan', [publicController::class, 'strategicPlan']);
Route::get('/university-organogram', [publicController::class, 'universityOrganogram']);
Route::get('/our-team', [publicController::class, 'ourTeam']);
Route::get('/academic-deputy', [publicController::class, 'academicDeputy']);
Route::get('/student-deputy', [publicController::class, 'studentDeputy']);
Route::get('/finance-deputy', [publicController::class, 'financeDeputy']);
Route::get('/how-to-apply', [publicController::class, 'howToApply']);
Route::get('/apply-process', [publicController::class, 'applyProcess']);
Route::get('/university-services', [publicController::class, 'universityServices']);

Route::get('/economy-faculty', [publicController::class, 'economyFaculty']);
Route::get('/law-faculty', [publicController::class, 'lawFaculty']);

Route::get('/news-events', [publicController::class, 'newsEvents']);
Route::get('/news-events/{id}', [publicController::class, 'newsDetail']);
Route::get('/gallery', [publicController::class, 'gallery']);
Route::get('/gallery-detail/{id}', [publicController::class, 'galleryDetail']);

Route::get('/contact', [publicController::class, 'contact']);


//Administration routes:


Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('slider',sliderController::class);
    Route::resource('gallery',galleryController::class);
    Route::resource('news',newsController::class);
    Route::resource('media',mediaController::class);
    Route::resource('newsfeature',newsFeatureController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('departments',DepartmentController::class);
    Route::resource('faculties',FacultyController::class);
    Route::resource('bills',BillController::class);
    Route::resource('results',ResultController::class);
    Route::resource('senfs',SenfController::class);
    Route::resource('senf-students',SenfStudentController::class);
    Route::resource('senf-subjects',SenfSubjectController::class);
    Route::resource('stdpayments',StdpaymentController::class);
    Route::resource('students',StudentController::class);
    Route::resource('subjects',SubjectController::class);
    Route::post('subjects/assign',[SubjectController::class, 'assign'])->name('subjects.assign');
    Route::resource('teachers',TeacherController::class);
    Route::resource('exams',ExamController::class);

    Route::resource('users',UserController::class);
    Route::get('attendances/report', [StudentSubjectAttendanceController::class,'report'])->name('attendances.report');
    Route::resource('attendances',StudentSubjectAttendanceController::class);
    Route::get('payments/paid', [PaymentController::class,'paid'])->name('payments.paid');
    Route::resource('payments',PaymentController::class);
});
require __DIR__.'/auth.php';
