<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\EmployeeModel;
use App\Model\AppointmentModel;
use App\Model\OfficeModel;
use PHPJasper\PHPJasper;

use File;
use Config;
use Session;
use Auth;

class ReportsController extends Controller
{


	public function appointmentReport(Request $request){
		$name = $request->name;
        $input = public_path().'/Report_inputs/PrintByAppointment.jrxml';
    	return $this->process_report( $name, $input);
	}
	public function officeReport(Request $request){
		$name = $request->name;
        $input = public_path().'/Report_inputs/PrintByOffice.jrxml';
    	return $this->process_report( $name, $input);
	}
	public function genderReport(Request $request){
		$name = $request->name;
        $input = public_path().'/Report_inputs/PrintByGender.jrxml';
    	return $this->process_report( $name, $input);
	}
	public function birthmonthReport(Request $request){
		$name = $request->name;
        $input = public_path().'/Report_inputs/PrintByBirthMonth.jrxml';
    	return $this->process_report( $name, $input);
	}


	
	public function process_report( $name, $input){

        $output = public_path().'/Report_outputs/'.$name;    
		   // Check file if exist
		if (File::exists(public_path().'/Report_outputs/'.$name.'.pdf')) {
			File::delete(public_path().'/Report_outputs/'.$name.'pdf');
        }
            // end check file
		// Process jasper file to [pdf,rtf,xml]
		$options = [
			'format' => ['pdf'],
			'params' => [
				'name' => $name,
			],
			'db_connection' => [
				'driver' => 'mysql',
				'username' => 'root',
				'password' => '""',
				'database' => 'hris_db',
				'host' => 'localhost',
				'port' => '3306'
			]
		];
		
		$jasper = new PHPJasper;
		$jasper->process(
			$input,
			$output,
			$options
		)->execute();
			// Stream process file
			$streamFile = public_path('Report_outputs/'.$name.'.pdf');
			return response()->file($streamFile);
			// end stream
}


}
