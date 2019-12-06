<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\ProvinceModel;
use App\Model\MunicipalityModel;
use App\Model\BarangayModel;



class AddressController extends Controller
{
    public function getProvince(){
    	return ProvinceModel::all();
    }

    public function getMunicipality(Request $request){
    	return MunicipalityModel::where('province_id',$request->id)->get();
    }

    public function getBarangay(Request $request){
    	return BarangayModel::where('city_id',$request->id)->get();
    }

}
