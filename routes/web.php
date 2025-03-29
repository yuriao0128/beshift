<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CareerRecordController;
use App\Http\Controllers\DesiredConditionController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailableScheduleController;
use App\Http\Controllers\MentorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ArticleController;


Route::view('/', 'index');

// // 管理者用ルート
// Route::prefix('/admin')->name('admin.')->group(function () {
//     Route::middleware('guest')->group(function () {
//         Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//         Route::post('/login', [AuthController::class, 'adminLogin'])->name('login.submit');
//     });

//     Route::middleware('auth')->group(function () {
//         Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
//         Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//         Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
//         Route::post('/users', [UserController::class, 'store'])->name('users.store');
//         Route::get('/users-list', [UserController::class, 'index'])->name('users-list');
//         Route::get('/appointments/calendar', [AppointmentController::class, 'adminCalendar'])->name('appointments.calendar');
        
//         //予約一覧
//         Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
//         Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');
//         Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
//         Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
//         Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.delete');
//     });


//         //管理者一覧
//         Route::get('/admin-list', [AdminController::class, 'listAdmins'])->name('admin.list');
//         Route::delete('/admin-list/{id}', [AdminController::class, 'destroyAdmin'])->name('destroy'); // 管理者削除
//         Route::get('/admin-list/{id}/edit', [AdminController::class, 'editAdmin'])->name('edit'); // 管理者編集
//         Route::put('/admin-list/{id}', [AdminController::class, 'updateAdmin'])->name('update'); // 管理者更新        
//     });


// ユーザー用ルート
Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'createUser'])->name('user.register');
    Route::post('/register', [UserController::class, 'storeUser'])->name('user.register.submit');
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('users.login');
    Route::post('/login', [UserAuthController::class, 'login'])->name('users.login.submit');
});

    Route::middleware('auth')->group(function () {
        Route::get('/mypage', function () {
            $articles = Article::orderBy('id', 'desc')->get();
            return view('users.mypage', compact('articles'));
        })->name('users.mypage');
        
        Route::post('/users/logout', [UserAuthController::class, 'logout'])->name('users.logout');

    //プロフィール編集ページ
    Route::get('/users/profile/edit', [ProfileController::class, 'edit'])->name('users.profile.edit');
    Route::get('/users/profile/reedit', [ProfileController::class, 'reedit'])->name('users.profile.reedit');
    Route::put('/users/profile', [ProfileController::class, 'update'])->name('users.profile.update');    

    //キャリア登録
Route::get('/users/career/create', [CareerRecordController::class, 'create'])->name('users.career.create');
Route::post('/users/career/store', [CareerRecordController::class, 'store'])->name('users.career.store');
Route::delete('/users/career/{id}', [CareerRecordController::class, 'destroy'])->name('users.career.destroy');
Route::get('/users/career/{id}/edit', [CareerRecordController::class, 'edit'])->name('users.career.edit');
Route::put('/users/career/{id}', [CareerRecordController::class, 'update'])->name('users.career.update');


//希望条件
Route::get('/users/desired/create', [DesiredConditionController::class, 'create'])->name('users.desired.create');
Route::post('/users/desired/store', [DesiredConditionController::class, 'store'])->name('users.desired.store');
Route::put('/users/desired/{id}/toggle-scout', [DesiredConditionController::class, 'toggleScout'])->name('users.desired.toggleScout');
Route::get('/users/desired/{id}/edit', [DesiredConditionController::class, 'edit'])->name('users.desired.edit');
Route::put('/users/desired/{id}', [DesiredConditionController::class, 'update'])->name('users.desired.update');
Route::delete('/users/desired/{id}', [DesiredConditionController::class, 'destroy'])->name('users.desired.destroy');

//面談予約
Route::get('/appointment/start', [AppointmentController::class, 'start'])->name('appointment.start');
Route::get('/appointment/calendar', [AppointmentController::class, 'calendar'])->name('appointment.calendar');
Route::post('/appointment/calendar', [AppointmentController::class, 'saveCalendar'])->name('appointment.calendar.save');
Route::get('/appointment/details', [AppointmentController::class, 'details'])->name('appointment.details');
Route::post('/appointment/submit', [AppointmentController::class, 'submit'])->name('appointment.submit'); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//メンター登録
Route::get('/admin/mentors', [MentorController::class, 'index'])->name('admin.mentors.index');
Route::post('/admin/mentors', [MentorController::class, 'store'])->name('admin.mentors.store');

});

//ランディングページ
Route::get('/', function () {
    return view('landing');
});

// アサインメントページ
Route::get('/assessment', [AssessmentController::class, 'index'])->name('users.assessment');
Route::post('/assessment', [AssessmentController::class, 'store'])->name('users.assessment.store');
Route::get('/mypage', [AssessmentController::class, 'showResults'])->name('users.mypage');
Route::get('/assessment/{step?}', [AssessmentController::class, 'showQuestion'])->name('assessment');
Route::post('/assessment/{step}', [AssessmentController::class, 'storeAnswer'])->name('assessment.store');

//記事
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
