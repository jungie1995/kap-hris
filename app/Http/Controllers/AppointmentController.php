<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Model\AppointmentModel;
use App\Model\EmployeeModel;
use App\Model\OfficeModel;


class AppointmentController extends Controller
{
	
	public function addAppointment(Request $request){
		$checking = AppointmentModel::where('appointment_name', $request->app_title)->first();

		if(!$checking){
			$data = new AppointmentModel();
			$data->appointment_id = $request->app_id;
			$data->appointment_name = $request->app_title;
			$data->save();

			return response()->json([
				'AppointmentData' => ([
					'status' => 'Success',
					'header' => strtoupper($request->app_title),
					'name' => ' with Appointment Number '.$request->app_id.' added successfully!'
				])
			]);
		}else{
			return response()->json([
				'AppointmentData' => ([
					'status' => 'Error',
					'header' => 'Duplicate Entry',
					'name' => ' error'
				])
			]);
		}

	}
	public function editAppointment(Request $request){
		$data = AppointmentModel::select(
			'appointment_id',
			'appointment_name'
		)
		->where('appointment_id', $request->id)
		->get();
		return $data;
	}
	public function updateAppointment(Request $request){
		$data = AppointmentModel::where('appointment_id','=', $request->appointment_id)->first();
		$data->appointment_name = $request->appointment_name;
		$data->save();
		
		return response()->json([
			'AppointmentData' => ([
				'status' => 'Success',
				'header' => strtoupper($request->appointment_name),
				'name' => ' with Appointment Number '.$request->appointment_id.' Updated successfully!'
			])
		]);
	}	
    
	public function getAppointment(){
		$statsHolder = [];

		$collect = new Collection();
		$stats = AppointmentModel::all();
		$offices = OfficeModel::all();

		foreach ($stats as $data) {
			$statsCount = EmployeeModel::where('status',$data->appointment_id)->count();
			$statsHolder[] = ([
				'stats_name' => $data->appointment_name,
				'stats_id' => $data->appointment_id,
				'stats_count' => $statsCount
			]);
		}
		return collect($statsHolder);
	}

	public function getAppointmentList(){
		$list = AppointmentModel::select(
			'appointment_id',
			'appointment_name'
		)
		->get();

		return $list;
	}
	public function getAppList(){
		$list = AppointmentModel::select(
			'appointment_id',
			'appointment_name'
		)
		->paginate(10);

		return $list;
	}

	

}
