<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

// Schedules
Route::get('/schedule', 'ScheduleController@index');
Route::get('/schedule/show/{id}', 'ScheduleController@show');
Route::get('/schedule/create', 'ScheduleController@create');
Route::post('/schedule/create', 'ScheduleController@store');
Route::get('/schedule/edit/{id}', 'ScheduleController@edit');
Route::post('/schedule/update/{id}', 'ScheduleController@update');
Route::post('/schedule/remove/{id}', 'ScheduleController@destroy');
Route::get('/scheduleprint', 'ScheduleController@Print')->name('schedule.print');
Route::get('/pdfschedule', 'ScheduleController@Print')->name('pdfschedule');

// Patient
Route::get('/patient', 'PatientController@index');
Route::get('/patient/show/{id}', 'PatientController@show');
Route::get('/patient/create', 'PatientController@create');
Route::post('/patient/create', 'PatientController@store');
Route::get('/patient/edit/{id}', 'PatientController@edit');
Route::post('/patient/update/{id}', 'PatientController@update');
Route::post('/patient/remove/{id}', 'PatientController@destroy');
Route::get('/patientprint', 'PatientController@Print')->name('patient.print');
Route::get('/pdfpatient', 'PatientController@Print')->name('pdfpatient');

// Doctor 
Route::get('/doctor', 'DoctorController@index');
Route::get('/doctor/show/{id}', 'DoctorController@show');
Route::get('/doctor/create', 'DoctorController@create');
Route::post('/doctor/create', 'DoctorController@store');
Route::get('/doctor/edit/{id}', 'DoctorController@edit');
Route::post('/doctor/update/{id}', 'DoctorController@update');
Route::post('/doctor/remove/{id}', 'DoctorController@destroy');
Route::get('/doctorprint', 'DoctorController@Print')->name('doctor.print');
Route::get('/pdfdoctor', 'DoctorController@Print')->name('pdfdoctor');

// specialties
Route::get('/specialty', 'SpecialtyController@index');
Route::get('/specialty/show/{id}', 'SpecialtyController@show');
Route::get('/specialty/create', 'SpecialtyController@create');
Route::post('/specialty/create', 'SpecialtyController@store');
Route::get('/specialty/edit/{id}', 'SpecialtyController@edit');
Route::post('/specialty/update/{id}', 'SpecialtyController@update');
Route::post('/specialty/remove/{id}', 'SpecialtyController@destroy');
Route::get('/specialtyprint', 'SpecialtyController@Print')->name('specialty.print');
Route::get('/pdfspecialty', 'SpecialtyController@Print')->name('pdfspecialty');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

