<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AppointmentModel;
use App\Model\OfficeModel;
use Session;
use Auth;

class UtilitiesController extends Controller
{
   

	public function idGenerator(){
		//id generator
		$stoploop = true;
		while($stoploop){
			$randomId = mt_rand(1000,9999);
			$checker = AppointmentModel::where('appointment_id',$randomId)->get()->count();
			if ($checker == 0) {
				$stoploop = false;
				$valid =  $randomId;
			}
			else{
				$stoploop = true;
			}
		}
		$GeneratedData[] = ([
			'app_id' => $valid
		]);
		return $GeneratedData;

	}

	public function idOfficeGenerator(){
		//id generator
		$stoploop = true;
		while($stoploop){
			$randomId = mt_rand(1000,9999);
			$checker = OfficeModel::where('office_id',$randomId)->get()->count();
			if ($checker == 0) {
				$stoploop = false;
				$valid =  $randomId;
			}
			else{
				$stoploop = true;
			}
		}
		$GeneratedData[] = ([
			'off_id' => $valid
		]);
		return $GeneratedData;
	}

	public function utilities(Request $request){

		$app_data = AppointmentModel::all();
		$off_data = OfficeModel::all();
		$app_id = $this->idGenerator();
		$off_id = $this->idOfficeGenerator();

		$GeneratedData[] = ([
			'app_id' => $app_id,
			'off_id' => $off_id
		]);
		
		return json_encode($GeneratedData);

	}

}
