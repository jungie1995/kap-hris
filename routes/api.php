<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

// Axios access

// Route::middleware('auth:api')->group( function() {




Route::get('/generate-idnumber','EmployeeController@idGenerator');

Route::get('/employee-list','EmployeeController@employeeList');
Route::get('/employee-data-list','EmployeeController@employeedataList');

Route::get('/view-employee/{bio_num}','EmployeeController@viewEmployee');

Route::get('/get-province-list','AddressController@getProvince');

Route::get('/get-municipality-list/{id}','AddressController@getMunicipality');

Route::get('/get-barangay-list/{id}','AddressController@getBarangay');
	
Route::post('/add-employee','EmployeeController@addEmployee');

Route::get('/view-pds/{bio_num}','EmployeeController@printPDS');

Route::get('/get-appointment-list','AppointmentController@getAppointmentList');
Route::get('/get-appointments','AppointmentController@getAppList');
Route::get('/get-appointment','AppointmentController@getAppointment');
Route::post('/add-appointment','AppointmentController@addAppointment');
Route::get('/edit-appointment/{id}','AppointmentController@editAppointment');
Route::put('/update-appointment','AppointmentController@updateAppointment');


Route::get('/get-offices','OfficeController@getOffList');
Route::get('/get-office-list','OfficeController@getOfficeList');
Route::post('/add-office-list', 'OfficeController@addOfficeList');
Route::get('/edit-office/{id}','OfficeController@editOffice');
Route::put('/update-office','OfficeController@updateOffice');


Route::get('/get-generated-appid', 'UtilitiesController@idGenerator'); 
Route::get('/get-generated-officeid', 'UtilitiesController@idOfficeGenerator'); 

Route::get('/printby-birthmonth/{name}','ReportsController@birthmonthReport');
Route::get('/printby-gender/{name}','ReportsController@genderReport');
Route::get('/printby-appointment/{name}','ReportsController@appointmentReport');
Route::get('/printby-office/{name}','ReportsController@officeReport');



// });


