<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorManagerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientAppoinmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientFileController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\Dashboard\PatientDashboardController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('home',[HomeController::class , 'main'])->name('home');
Route::get('about-cancer',[HomeController::class,'about'])->name('about');
Route::get('nutrition',[HomeController::class,'nutrition'])->name('nutrition');
Route::get('awareness',[HomeController::class,'awareness'])->name('awareness');
Route::get('contact-us',[HomeController::class,'contact'])->name('contact');
Route::get('symptoms',[HomeController::class,'symptoms'])->name('symptoms');
Route::post('contact',[ContactController::class , 'store'])->name('contact.store');

Route::view('/test', 'dashboard.temp');

Route::redirect("/", 'login', 301);

Route::middleware('guest')->group(function () {
    Route::prefix('/login')->controller(LoginController::class)->group(function () {
        Route::get('/', 'showLogin')->name('login');
        Route::post('/', 'login')->name('login.post');
    });

    Route::prefix('/patient/login')->controller(UserLoginController::class)->group(function () {
        Route::get('/', 'showLogin')->name('patients.login');
        Route::post('/', 'login')->name('patients.login.post');
    });

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('/forgot-password/{broker}', 'showForgotPassword')->name('password.request');
        Route::post('/forgot-password/{broker}', 'forgotPassword')->name('password.email');
        Route::get('/reset-password/{token}/{broker}', 'showResetPassword')->name('password.reset');
        Route::post('/reset-password/{broker}', 'resetPassword')->name('password.update');
    });
});

Route::middleware(['auth', 'locale'])->prefix('/dashboard')->group(function () {
    // Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('reception/employees',ReceptionController::class);
    Route::resource('doctor/managers',DoctorManagerController::class);
    Route::resource('doctors',DoctorController::class);
    Route::resource('patient/appoinments',PatientAppoinmentController::class);
    Route::resource('patient/files',PatientFileController::class);
    Route::resource('patients',PatientController::class);
    Route::resource('admins', AdminController::class)->except(['create']);

    Route::prefix('/account')->controller(AccountController::class)->group(function () {
        Route::get('/', 'profile')->name('account.profile');
        Route::get('/settings', 'settings')->name('account.settings');
        Route::put('/settings', 'saveSettings')->name('account.save-settings');
        Route::put('/change-email', 'changeEmail')->name('account.change-email');
        Route::put('/change-password', 'changePassword')->name('account.change-password');
    });

    Route::prefix('/settings')->controller(SettingController::class)->group(function () {
        Route::get('/', 'general')->name('settings.general');
        Route::post('/', 'update')->name('settings.update');
    });

    Route::get('/language/{locale}', [DashboardController::class, 'changeLocale'])->name('dashboard.locale');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware(['auth:user', 'locale'])->prefix('/patient/dashboard')->group(function () {
    // Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/', [PatientDashboardController::class, 'index'])->name('users.patients.index');
    Route::get('/files', [PatientDashboardController::class, 'files'])->name('users.files.index');
    Route::get('/appoinments', [PatientDashboardController::class, 'appoinments'])->name('users.appoinments.index');
    Route::get('/urgents/create', [PatientDashboardController::class, 'createUrgent'])->name('users.urgents.create');
    Route::get('/urgents', [PatientDashboardController::class, 'urgents'])->name('users.urgents.index');
    Route::post('/urgents', [PatientDashboardController::class, 'storeUrgent'])->name('users.urgents.store');
    Route::get('/consultations', [PatientDashboardController::class, 'consultations'])->name('users.consultations');
    Route::post('/consultations', [PatientDashboardController::class, 'storeConsultations'])->name('users.consultations.store');
    Route::get('/consultation/create', [PatientDashboardController::class, 'createConsultation'])->name('users.consultation.create');


    Route::get('/language/{locale}', [DashboardController::class, 'changeLocale'])->name('users.locale');


    Route::get('/logout', [UserLoginController::class, 'logout'])->name('users.logout');

});




Route::get('/zoom', function () {

    //GENERATING ACCESS TOKEN
    $response = Http::withHeaders([
        'Host' => 'zoom.us',
        'Authorization' => 'Basic ' . base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET'))
    ])->post('https://zoom.us/oauth/token?grant_type=account_credentials&account_id=' . env('ZOOM_ACCOUNT_ID'));
    $jsonResponse = json_decode($response->body());
    $accessToken = $jsonResponse->access_token;

    //CREATING A ZOOM MEETING
    $details = [
        "topic" => "The title of your Zoom meeting",
        "type" => 2,
        "start_time" => "2023-06-22T10:21:57",
        "duration" => "45",
        "timezone" => "Europe/Madrid",
        "agenda" => "test",
        "recurrence" => [
            "type" => 1,
            "repeat_interval" => 1
        ],
        "settings" => [
            "host_video" => "true",
            "participant_video" => "true",
            "join_before_host" => "False",
            "mute_upon_entry" => "False",
            "watermark" => "true",
            "audio" => "voip",
            "auto_recording" => "cloud"
        ]
    ];
    $response = Http::withHeaders([
        'content-type' => 'application/json',
        'Authorization' => 'Bearer ' . $accessToken,
    ])->post('https://api.zoom.us/v2/users/me/meetings', $details);
    dd(json_decode($response->body()));
});
