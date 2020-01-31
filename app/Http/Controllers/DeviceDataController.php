<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\DeviceProfile;
use App\Device;
use App\Gateway;

class DeviceDataController extends Controller
{
    public function index($name){
	 	  $devices = DB::select('select * from devices where app_name = ?', [$name]);
	 	  $app = DB::select('select * from apps where name = ?', [$name]);
	 	  $gateways = Gateway::all();
	 	  $device_profiles = DeviceProfile::all();
		  return view('devIndex', ['devices' => $devices, 'app' => $app,
		  'gateways' => $gateways, 'device_profiles' => $device_profiles]);
	 }
	 
	 public function getAppName($id){
	 	  $app = DB::table('devices')->where('id','=',$id)->get(['app_name']);
	 	  return $app;
	 }
	 
	 public function getLastInsertedId() {
		  $no_id = DB::table('devices')->count();
		  return $no_id; 
	 }
	 
	 public function create($name){
	 	  $app = DB::select('select * from apps where name = ?', [$name]);
		  return view('devCreate', ['app' => $app]);
	 }
	 
	 public function edit($id){
	 	  $device = DB::select('select * from devices where id = ?', [$id]);
		  return view('devEdit', ['device' => $device]);
	 }	 
	 
	 public function remove($id){
	 	  $device = DB::select('select * from devices where id = ?', [$id]);
		  return view('devRemove', ['device' => $device]);	 
	 }	 
	 	 
	 public function generateActivateToken(){
	 		$token_activate = bin2hex(random_bytes(6));
	 		return $token_activate;
	 }
	 
	 public function generateAuthToken(){
	 		$token_auth = bin2hex(random_bytes(64));
	 		return $token_auth;
	 }
	 
	 public function insert(Request $request, $a_name){ 
		  	            
		  	 $name = $request['name'];   
		  	 $app_name = $a_name;
		  	 $token_auth = DeviceDataController::generateAuthToken();
		  	 $token_activate = DeviceDataController::generateActivateToken();
		  	 $is_active = false;
		  	 $id = DeviceDataController::getLastInsertedId();
		  	 $id++;
		  	 $data = array('id' => $id, 'name' => $name, 'app_name' => $app_name,
		  	 'token_auth' => $token_auth, 'token_activate' => $token_activate, 'is_active' => $is_active);
		  	 DB::table('devices')->insert($data);
			 
			 $view = DeviceDataController::index($a_name);
          echo $view;    	 
	 }
	 
    public function update(Request $request, $a_name, $id)
    {
    	  $name = $request['name']; 
        DB::update('update devices set name = ? where id = ?', [$name,$id]);     
        $devices = DB::select('select * from devices where app_name = ?', [$a_name]);
	 	  $app = DB::select('select * from apps where name = ?', [$a_name]);
		  return view('devIndex', ['devices' => $devices, 'app' => $app]);      
    }
    
    /*public function activate(Request $request){
    	$id = $request['id'];
    	$token_activate = DB::select('select token_activate from devices where id = ?', [$id]);
    	if($request['token_activate'] == $token_activate){
    		$token_auth = DeviceDataController::generateAuthToken();
    		DB::update('update devices set token_auth = ? where id = ?', [$token_auth,$id]);
    		return response()->json(['token_auth' => $token_auth],200);
      }
      return response()->json(null,404);
    }*/
    
	 public function delete($name, $id){ 
	 	  DB::delete('delete from devices where id = ?', [$id]);
	 	  $devices = DB::select('select * from devices where app_name = ?', [$name]);
	 	  $app = DB::select('select * from apps where name = ?', [$name]);
		  return view('devIndex', ['devices' => $devices, 'app' => $app]);
	 }     	 
}
