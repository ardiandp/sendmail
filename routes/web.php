<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EmailController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test-email', function () {
    $details = [
        'title' => 'Test Email from Laravel',
        'body' => 'This is a test email to verify the email configuration in Laravel.'
    ];

    Mail::raw($details['body'], function ($message) use ($details) {
        $message->to('testrecipient@mail.com')
                ->subject($details['title']);
    });

    return 'Email has been sent successfully!';
});

Route::get('/input-email', [EmailController::class, 'showForm']);
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send-email');


Route::get('/email-form1', [EmailController::class, 'showEmailForm1'])->name('email.form1');
Route::get('/email-form2', [EmailController::class, 'showEmailForm2'])->name('email.form2');
Route::post('/send-email-2', [EmailController::class, 'sendEmailWithAttachment'])->name('email.send');
