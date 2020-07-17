<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

//AUTH LOGIN and REGISTER
Route::resource('checkin-patients', 'CheckinController');
Auth::routes();
Route::get('login/management', 'Auth\LoginController@showManagementLoginForm');
Route::get('login/patient', 'Auth\LoginController@showPatientLoginForm');
Route::get('login/doctor', 'Auth\LoginController@showDoctorLoginForm');
Route::get('login/laboratory', 'Auth\LoginController@showLaboratoryLoginForm');
Route::get('login/billing', 'Auth\LoginController@showBillingLoginForm');
Route::get('register/management', 'Auth\RegisterController@showManagementRegisterForm');
Route::get('register/patient', 'Auth\RegisterController@showPatientRegisterForm');
Route::get('register/doctor', 'Auth\RegisterController@showDoctorRegisterForm');
Route::get('register/doctor', 'Auth\RegisterController@viewspec')->name('view.spec');

Route::post('login/management', 'Auth\LoginController@managementLogin');
Route::post('login/patient', 'Auth\LoginController@patientLogin');
Route::post('login/doctor', 'Auth\LoginController@doctorLogin');
Route::post('login/laboratory', 'Auth\LoginController@laboratoryLogin');
Route::post('login/billing', 'Auth\LoginController@billingLogin');
Route::post('register/management', 'Auth\RegisterController@createManagement');
Route::post('register/patient', 'Auth\RegisterController@createPatient');
Route::post('register/doctor', 'Auth\RegisterController@createDoctor');

Route::view('/', 'home')->middleware('auth');


//HOMEPAGE
Route::get('/', 'HomepageController@index');
Route::get('/about', 'HomepageController@about');
Route::get('/doctors', 'HomepageController@doctors');
Route::get('/laboratory', 'HomepageController@laboratory');
Route::get('/contact', 'HomepageController@contact');

//-----------------------------------------------------------------------------------------

//MANAGEMENT
Route::get('management/dashboard', 'ManagementController@dashboard');
Route::get('management/manage-patients', 'ManagementController@managepatients');
Route::get('management/pending-patients', 'ManagementController@pendingpatients');
Route::get('management/checkin-patients', 'ManagementController@checkinpatients');
Route::get('management/add-specialization', 'ManagementController@specialization');
Route::get('management/edit-specialization', 'ManagementController@editspecialization');
Route::get('management/manage-doctors', 'ManagementController@managedoctors');
Route::get('management/pending-doctors', 'ManagementController@pendingdoctors');
Route::get('management/laboratory', 'ManagementController@laboratory');
Route::get('management/add-laboratory', 'ManagementController@addlaboratory');
Route::get('management/add-billing', 'ManagementController@addbilling');
Route::get('management/laboratory-requests', 'ManagementController@laboratoryrequests');
Route::get('management/patient-invoice', 'ManagementController@patientinvoice');
Route::get('management/appointment-history', 'ManagementController@appointment');
Route::get('management/contact-us-queries', 'ManagementController@contactus');
Route::get('management/reports', 'ManagementController@reports');
Route::get('management/rooms', 'ManagementController@viewroom');
//crud
Route::post('management/add-entry', 'ManagementController@addspec');
Route::get('management/delete/{id}', 'ManagementController@deletespec')->name('specializations.destroy');
Route::get('management/edit-specialization/{id}', 'ManagementController@editspec')->name('specializations.edit');
Route::post('management/edit-specialization/update/{id}', 'ManagementController@updatespec');
Route::post('management/add-facility', 'ManagementController@addfacility');
Route::get('management/edit-doctor/{id}', 'ManagementController@editdoc')->name('doctor.edit');
Route::post('management/edit-doctor/update/{id}', 'ManagementController@updatedoc');
Route::post('management/add-handler', 'ManagementController@addhandler');
Route::get('management/edit-pendingcheckin/{id}', 'ManagementController@editcheckinpatient')->name('pendingcheckin.edit');
Route::post('management/add-roomtype', 'ManagementController@addroomtype');
Route::post('management/add-roomnumber', 'ManagementController@addroomnumber');
Route::get('management/view-patient/{id}', 'ManagementController@viewpatient')->name('view.patient');
Route::get('management/view-testresult/{id}', 'ManagementController@viewtestresult')->name('testresult.view');
Route::get('management/edit-doctorstatus/{id}', 'ManagementController@editdoctorstatus')->name('doctorstatus.edit');
Route::post('management/edit-doctorstatus/update/{id}', 'ManagementController@updatedoctorstatus');
Route::get('management/invoice/{id}', 'ManagementController@viewinvoice')->name('invoice');
Route::get('management/edit-laboratory/{id}', 'ManagementController@editlaboratory')->name('editlaboratory');
Route::post('management/edit-laboratory/update/{id}', 'ManagementController@updatelaboratory');
Route::get('management/edit-billing/{id}', 'ManagementController@editbilling')->name('editbilling');
Route::post('management/edit-billing/update/{id}', 'ManagementController@updatebilling');

//-------------------------------------------------------------------------------------------------------------

//PATIENT
Route::get('patient/dashboard', 'PatientController@dashboard');
Route::get('patient/personal-information', 'PatientController@personalinformation');
Route::get('patient/book-appointment', 'PatientController@bookappointment');
Route::get('patient/pending-schedules', 'PatientController@pendingschedules');
Route::get('patient/approved-schedules', 'PatientController@approvedschedules');
Route::get('patient/medical-history', 'PatientController@medicalhistory');
Route::get('patient/test-results', 'PatientController@testresults');
Route::get('patient/appointment-history', 'PatientController@appointmenthistory');
//crud
Route::post('patient/add-booking', 'PatientController@addbooking');
Route::get('patient/book-appointment', 'PatientController@viewdoc');
Route::get('patient/edit-appointment/{id}', 'PatientController@editappointment')->name('patientapp.edit');
Route::post('patient/edit-appointment/update/{id}', 'PatientController@updateappointment');
Route::get('patient/delete/{id}', 'PatientController@deletesched')->name('appointment.destroy');
Route::get('patient/view-testresult/{id}', 'PatientController@viewtestresult')->name('viewpatienttestresult');

//--------------------------------------------------------------------------------------------------------

//DOCTOR
Route::get('doctor/dashboard', 'DoctorController@dashboard');
Route::get('doctor/personal-information', 'DoctorController@personalinfo');
Route::get('doctor/schedules', 'DoctorController@schedules');
Route::get('doctor/approved-appointments', 'DoctorController@approvedappointments');
Route::get('doctor/pending-appointments', 'DoctorController@pendingappointments');
Route::get('doctor/appointment-history', 'DoctorController@appointmenthistory');
Route::get('doctor/manage-patients', 'DoctorController@managepatients');
Route::get('doctor/check-in-patients', 'DoctorController@checkinpatients');
Route::get('doctor/laboratory-facilities', 'DoctorController@labfacilities');
Route::get('doctor/laboratory-test-results', 'DoctorController@labtestresults');
//crud
Route::get('doctor/edit-appointment/{id}', 'DoctorController@editappointment')->name('appointment.edit');
Route::post('doctor/edit-appointment/update/{id}', 'DoctorController@updateappointment');
Route::get('doctor/view-patient/{id}', 'DoctorController@viewpatient')->name('medical.add');
Route::post('doctor/view-patient/add-med', 'DoctorController@addmedicalrecord');
Route::get('doctor/view-patientrecord/{id}', 'DoctorController@viewmedicalrecord')->name('patient.view');
Route::post('doctor/view-patient/lab-request', 'DoctorController@addrequest');
Route::get('doctor/view-test/{id}', 'DoctorController@viewlabtest')->name('lab.test');
Route::post('doctor/view-test/forward/{id}', 'DoctorController@updatelabtest');
Route::get('doctor/check-in/{id}', 'DoctorController@checkin')->name('in.patient');
Route::post('doctor/view-patient/checkin-patient', 'DoctorController@checkinpatient');
Route::get('doctor/view-testresult/{id}', 'DoctorController@viewtestresult')->name('view.testresult');
Route::post('doctor/discard-appointment/{id}', 'DoctorController@discardappointment');

//------------------------------------------------------------------------------------------------------------

//LABORATORY
Route::get('laboratory/dashboard', 'LaboratoryController@dashboard');
Route::get('laboratory/pending-requests', 'LaboratoryController@pending');
Route::get('laboratory/test-results', 'LaboratoryController@testresult');
Route::get('laboratory/facilities', 'LaboratoryController@facilities');
//crud
Route::get('laboratory/edit-request/{id}', 'LaboratoryController@editrequest')->name('laboratory.edit');
Route::post('laboratory/edit-request/update/{id}', 'LaboratoryController@updaterequest');
Route::get('laboratory/view-testresult/{id}', 'LaboratoryController@viewtestresult')->name('labtestresult.view');

//------------------------------------------------------------------------------------------------------------

//BILLING
Route::get('billing/dashboard', 'BillingController@dashboard');
Route::get('billing/invoice', 'BillingController@invoice');
Route::get('billing/laboratory-requests', 'BillingController@labrequests');
Route::get('billing/consultation-fees', 'BillingController@fees');
Route::get('billing/laboratory-fees', 'BillingController@labfees');
Route::get('billing/reports', 'BillingController@reports');
//crud
Route::get('billing/edit-request/{id}', 'BillingController@editreq')->name('request.edit');
Route::post('billing/edit-request/update/{id}', 'BillingController@updatestatus');
Route::resource('billing/edit-invoice', 'ManagePayment');
Route::post('billing/edit-invoice/update/{id}', 'BillingController@updateinvoice');
Route::get('billing/inv/{id}', 'BillingController@viewinv')->name('inv');

