<?php

namespace App\Http\Controllers;
use DB;
use App\DeviceProfile;
use Illuminate\Http\Request;

class DeviceProfileDataController extends Controller
{
    public function index(){
    	  return view('devProfileIndex', ['device_profiles' => DeviceProfile::all()]);
	 }	 
	 
	 public function create(){ 
		  return view('devProfileCreate');	 
	 }
	 
	 public function getLastInsertedId() {
		  $no_id = DB::table('device_profiles')->count();
		  return $no_id; 
	 }	 
	 
	 public function info($name){
	 	  $device_profile = DB::select('select * from device_profiles where name = ?', [$name])->get();
	 	  return $device_profile;
	 }
	 
	 public function remove($id){ 
	 	  $device_profile = DB::select('select * from device_profiles where id = ?', [$id]);
		  return view ('devProfileRemove', ['device_profile' => $device_profile]);	 
	 }
	 
	 public function edit($id){ 
		  $device_profile = DB::select('select * from device_profiles where id = ?', [$id]);
		  return view('devProfileEdit', ['device_profile' => $device_profile]);	 
	 }
	 
	 public function store(Request $request){
		  $device_profile = DeviceProfile::create($request->all());
		  $view = DeviceProfileDataController::index();
        return $view; 
	 }	 	 
	 
	 public function delete(Request $request, $id){
		  DB::delete('delete from device_profiles where id = ?', [$id]);  
		  $view = DeviceProfileDataController::index();
        echo $view;
	 }   
	 
	 public function update(Request $request, $id){
	 	  $device_profile = DeviceProfile::findOrFail($id);
	 	  $device_profile->update($request->all());
	 	  $view = DeviceProfileDataController::index();
        return $view;  
	 }
	 
}
