<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Model\EmployeeModel;
use App\Model\AppointmentModel;
use PHPJasper\PHPJasper;
use App\Model\OfficeModel;
use App\Model\PersonalModel;
use App\Model\AddressModel;
use App\Model\GovernmentModel;
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
			'personal_id',
			'height',
			'weight',
			'bloodtype',
			'citizenship',
			'placeofbirth',
			'birthday',
			'civilstatus',
			'telephone',
			'mobileno',
			'email',
			'address_id',
			'prklotblk',
			'street',
			'strsub',
			'barangay',
			'muncit',
			'provsta',
			'country',
			'zipcode',
			'permanentadd',
			'government_id',
			'pagibig',
			'gsis',
			'sss',
			'philhealth',
			'tin',
			'agency_no',
			'spsurname',
			'spfirstname',
			'spsuf',
			'spmiddlename',
			'spoccupation',
			'spemployer',
			'spbadd',
			'sptelephone',
			'fsurname',
			'ffirstname',
			'fmiddlename',
			'fsuf',
			'mmaiden',
			'msurname',
			'mfirstname',
			'mmiddlename'

		)
		->join('table_employee','table_appointment.appointment_id','=','table_employee.status')
		->join('table_offices','table_employee.office','=','table_offices.office_id')
		->leftjoin('table_personal' , 'table_employee.bio_num', '=', 'table_personal.personal_id')
		->leftjoin('table_family_background' , 'table_employee.bio_num', '=', 'table_family_background.family_id')
		->leftjoin('table_address' , 'table_employee.bio_num', '=', 'table_address.address_id')
		->leftjoin('table_government' , 'table_employee.bio_num', '=', 'table_government.government_id')
		->where('table_employee.bio_num',$request->bio_num)
		->get();

		return json_encode($employeeData);
	}

	public function EmployeeAddress(Request $request){
		$employeeAddress = AddressModel::select(
			'table_address.prklotblk as prklotblk',
			'table_address.street as street',
			'table_address.strsub as strsub',
			'table_barangays.name as barangay',
			'table_cities.name as municipality',
			'table_provinces.name as province',
			'table_address.zipcode as zipcode'
		)
		->join('table_provinces', 'table_address.provsta', '=' , 'table_provinces.province_id')
		->leftjoin('table_barangays', 'table_address.barangay', '=' , 'table_barangays.code')
		->leftjoin('table_cities', 'table_address.muncit', '=' , 'table_cities.city_id')
		->where('table_address.address_id', '=', $request->bio_num)
		->get();
		
		return json_encode($employeeAddress);

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

	public function updateEmployee(Request $request){
		$data = EmployeeModel::where('bio_num','=', $request->bio_num)->first();
		$data->status = $request->status;
		$data->firstname = $request->firstname;
		$data->middlename = $request->middlename;
		$data->lastname = $request->lastname;
		$data->gender = $request->gender;
		$data->presuf = $request->presuf;
		$data->office = $request->office;
		$data->save();

		$checking = PersonalModel::where('personal_id','=', $request->bio_num)->first();
		if (!$checking) {
			$persons_data = new PersonalModel();
			$persons_data->personal_id = $request->bio_num;
		} else {
			$persons_data = PersonalModel::where('personal_id','=', $request->bio_num)->first();
		}
		$persons_data->height = $request->height;
		$persons_data->weight = $request->weight;
		$persons_data->bloodtype = $request->bloodtype;
		$persons_data->citizenship = 'filipino';
		$persons_data->placeofbirth = $request->placeofbirth;
		$persons_data->birthday = $request->birthday;
		$persons_data->civilstatus = $request->civilstatus;
		$persons_data->telephone = $request->telephone;
		$persons_data->mobileno = $request->mobileno;
		$persons_data->email = $request->email;
		$persons_data->save();

		$checkaddress = AddressModel::where('address_id','=', $request->bio_num)->first();
		if (!$checkaddress) {
			$person_address = new AddressModel();
			$person_address->address_id = $request->bio_num;
		} else {
			$person_address = AddressModel::where('address_id','=', $request->bio_num)->first();
		}
		$person_address->prklotblk = $request->prklotblk;
		$person_address->street = $request->street;
		$person_address->strsub = $request->strsub;
		$person_address->barangay = $request->barangay;
		$person_address->muncit = $request->muncit;
		$person_address->provsta = $request->provsta;
		$person_address->country = 'Philippines';
		$person_address->zipcode = $request->zipcode;
		$person_address->permanentadd = '1';
		$person_address->save();

		$checkgovernment = GovernmentModel::where('government_id','=', $request->bio_num)->first();
		if (!$checkgovernment) {
			$insurance = new GovernmentModel();
			$insurance->government_id = $request->bio_num;
		} else {
			$insurance = GovernmentModel::where('government_id','=', $request->bio_num)->first();
		}
		$insurance->pagibig = $request->pagibig;
		$insurance->gsis = $request->gsis;
		$insurance->sss = $request->sss;
		$insurance->philhealth = $request->philhealth;
		$insurance->tin = $request->tin;
		$insurance->agency_no= $request->agency_no;
		$insurance->save();
		

		return response()->json([
			'EmployeeData' => ([
				'status' => 'Success',
				'header' => strtoupper($request->firstname).' '.strtoupper($request->middlename).' '.strtoupper($request->lastname),
				'name' => ' with Biometric Number '.$request->bio_num.' Updated successfully!'
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

		$img_page_1 = public_path().'/PDS_inputs/PDS image/Personal Data Sheet page 1-1.jpg';
		$img_page_2 = public_path().'/PDS_inputs/PDS image/Personal Data Sheet page 2-1.jpg';
		$img_page_3 = public_path().'/PDS_inputs/PDS image/Personal Data Sheet page 3-1.jpg';
		$img_page_4 = public_path().'/PDS_inputs/PDS image/Personal Data Sheet page 4-1.jpg';
		$page_1 = public_path().'/PDS_inputs/PDS_page_1.jasper';
		$page_2 = public_path().'/PDS_inputs/PDS_page_2.jasper';
		$page_3 = public_path().'/PDS_inputs/PDS_page_3.jasper';
		$page_4 = public_path().'/PDS_inputs/PDS_page_4.jasper';

        // Check file if exist
		if (File::exists(public_path().'/PDS_outputs/'.$sample_name.'.pdf')) {
			File::delete(public_path().'/PDS_outputs/'.$sample_name.'pdf');
        }
            // end check file
            $options = [
				'format' => ['pdf'],
				'params' => [
                    'bio_num' => $bio_num,
                    'img_page_1' => $img_page_1,
                    'img_page_2' => $img_page_2,
                    'img_page_3' => $img_page_3,
					'img_page_4' => $img_page_4,
                    'page_1' => $page_1,
                    'page_2' => $page_2,
                    'page_3' => $page_3,
                    'page_4' => $page_4
					
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
