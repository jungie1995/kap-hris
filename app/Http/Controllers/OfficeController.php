<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\OfficeModel;

class OfficeController extends Controller
{
	
	public function getOfficeList(){
    	return OfficeModel::select('office_id', 'office_name')->get();
    }
    public function getOffList(){
        $list = OfficeModel::select('office_id', 'office_name')->paginate(10);
    	return $list;
    }

    public function addOfficeList(Request $request){
		$checking = OfficeModel::where('office_name', $request->off_title)->first();

		if(!$checking){
			$data = new OfficeModel();
			$data->office_id = $request->off_id;
			$data->office_name = $request->off_title;
			$data->save();

			return response()->json([
				'OfficeData' => ([
					'status' => 'Success',
					'header' => strtoupper($request->off_title),
					'name' => ' with Office Number '.$request->off_id.' added successfully!'
				])
			]);
		}else{
			return response()->json([
				'OfficeData' => ([
					'status' => 'Error',
					'header' => 'Duplicate Entry',
					'name' => ' error'
				])
			]);
		}

	}
	public function editOffice(Request $request){
		$data = OfficeModel::select(
			'office_id',
			'office_name'
		)
		->where('office_id', $request->id)
		->get();
		return $data;
	}

	public function updateOffice(Request $request){
		$data = OfficeModel::where('office_id','=', $request->office_id)->first();
		$data->office_name = $request->office_name;
		$data->save();
		
		return response()->json([
			'OfficeData' => ([
				'status' => 'Success',
				'header' => strtoupper($request->office_name),
				'name' => ' with Office Number '.$request->office_id.' Updated successfully!'
			])
		]);
	}

   
}
