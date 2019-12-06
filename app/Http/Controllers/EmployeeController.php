<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Model\EmployeeModel;
use App\Model\AppointmentModel;
use PHPJasper\PHPJasper;
use App\Model\OfficeModel;
use File;

class EmployeeController extends Controller
{
	public function idGenerator(){
		//id generator
		$stoploop = true;
		while($stoploop){
			$randomId = mt_rand(10000,99999);
			$checker = EmployeeModel::where('bio_num',$randomId)->get()->count();
			if ($checker == 0) {
				$stoploop = false;
				$valid =  $randomId;
			}
			else{
				$stoploop = true;
			}
		}
		return $valid;
	}

	public function employeeList(){
		// $employeeData = AppointmentModel::select('*')
		// ->join('table_employee','table_appointment.appointment_id','=','table_employee.status')
		// ->join('table_offices','table_employee.office','=','table_offices.office_id')
		// ->get();

		$employeeData = AppointmentModel::select(
			'table_employee.id as emp_id',
			'table_offices.id as off_id',
			'bio_num',
			'firstname',
			'middlename',
			'lastname',
			'presuf',
			'gender',
			'office_name',
			'office',
			'status',
			'table_employee.created_at as created_at',
			'appointment_name' 
		)
		->join('table_employee','table_appointment.appointment_id','=','table_employee.status')
		->join('table_offices','table_employee.office','=','table_offices.office_id')
		->get();

		return $employeeData;

	}

	public function employeedataList(){
		$employeeData = AppointmentModel::select(
			'table_employee.id as emp_id',
			'table_offices.id as off_id',
			'bio_num',
			'firstname',
			'middlename',
			'lastname',
			'presuf',
			'gender',
			'office_name',
			'office',
			'status',
			'table_employee.created_at as created_at',
			'appointment_name' 
		)
		->join('table_employee','table_appointment.appointment_id','=','table_employee.status')
		->join('table_offices','table_employee.office','=','table_offices.office_id')
		->paginate(10);
		return $employeeData;

	}

	public function viewEmployee(Request $request) {
		$employeeData = AppointmentModel::select(
			'table_employee.id as emp_id',
			'table_offices.id as off_id',
			'bio_num',
			'firstname',
			'middlename',
			'lastname',
			'presuf',
			'gender',
			'office_name',
			'office',
			'status',
			'table_employee.created_at as created_at',
			'appointment_name',
			'personal_id'
		)
		->join('table_employee','table_appointment.appointment_id','=','table_employee.status')
		->join('table_offices','table_employee.office','=','table_offices.office_id')
		->leftjoin('table_personal' , 'table_employee.bio_num', '=', 'table_personal.personal_id')
		->where('table_employee.bio_num',$request->bio_num)
		->get();

		return json_encode($employeeData);
	}

	public function addEmployee(Request $request) {

		$data = new EmployeeModel();
		$data->bio_num = $request->bio_num;
		$data->firstname = strtoupper($request->firstname);
		$data->middlename = strtoupper($request->middlename);
		$data->lastname = strtoupper($request->lastname);
		$data->presuf = strtoupper($request->presuf);
		$data->gender = strtoupper($request->gender);
		$data->dateofappoint = $request->dateofappoint;
		$data->status = $request->status;
		$data->office = $request->office;
		$data->save();

		return response()->json([
			'employeedata' => ([
				'header' => strtoupper($request->firstname).' '.strtoupper($request->middlename).' '.strtoupper($request->lastname),
				'name' => ' with Biometric Number '.$request->bio_num.' added successfully!'
			])
		]);
	}



	public function printPDS(Request $request){
		// dd('asdasd');

        // $PersonalData = new PersonalDataClass();
        // $persons_data = $PersonalData->EmployeeData();
        $sample = 'sadasd';
        $bio_num = $request->bio_num;
        $sample_name = $request->bio_num;
        $input = public_path().'/PDS_inputs/Empty_Book.jrxml';
        $output = public_path().'/PDS_outputs/'.$sample_name;    

        // Check file if exist
		if (File::exists(public_path().'/PDS_outputs/'.$sample_name.'.pdf')) {
			File::delete(public_path().'/PDS_outputs/'.$sample_name.'pdf');
        }
            // end check file
            $options = [
				'format' => ['pdf'],
				'params' => [
                    'bio_num' => $bio_num,
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
                $streamFile = public_path('PDS_outputs/'.$sample_name.'.pdf');
                return response()->file($streamFile);
                // end stream
		
    }

}
