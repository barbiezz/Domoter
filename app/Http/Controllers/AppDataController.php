<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use App\DeviceProfile;
use App\Gateway;

class AppDataController extends Controller
{
	
	 public function index() 
	 {
	 	  $apps = DB::select('select * from apps');
		  return view('appIndex', ['apps' => $apps]);
	 }

	 public function info($name){
		  $app = DB::select('select * from apps where name = ?', [$name]);
		  $device_profiles = DB::select('select * from device_profiles');
	 	  $gateways = DB::select('select * from gateways');
		  return view('appInfo', ['app' => $app, 'device_profiles' => DeviceProfile::all(), 'gateways' => $gateways]);
	 }	 
	 
	 public function create(){ 
	 	  $device_profiles = DB::select('select * from device_profiles');
	 	  $gateways = DB::select('select * from gateways');
		  return view('appCreate', ['device_profiles' => $device_profiles, 'gateways' => $gateways]);	 
	 }
	 
	 public function remove($id){ 
	 	  $app = DB::select('select * from apps where id = ?', [$id]);
		  return view ('appRemove', ['app' => $app]);	 
	 }
	 
	 public function getLastInsertedId() {
		  $no_id = DB::table('apps')->count();
		  return $no_id; 
	 }
	 
	 public function edit($id){
		  $app = DB::select('select * from apps where id = ?', [$id]);
		  $device_profiles = DB::select('select * from device_profiles');
		  $gateways = DB::select('select * from gateways');
		  return view('appEdit', ['app' => $app, 'device_profiles' => $device_profiles, 
		  'gateways' => $gateways]);	 
	 }
	 
	 public function insert(Request $request){ 
		  	 $name = $request['name'];  
		  	 $description = $request['description'];
		  	 $device_profile_name = $request['device_profile_name'];
		  	 $gateway_name = $request['gateway_name'];
		  	 $id = AppDataController::getLastInsertedId();
		  	 $id++;
		  	 $data = array('id' => $id, 'name' => $name, 'description' => $description, 
		  	 'device_profile_name' => $device_profile_name, 'gateway_name' => $gateway_name);
		  	 DB::table('apps')->insert($data);

			 $view = AppDataController::index();
          echo $view;  	 
	 }	 
	 
	 public function delete(Request $request, $id){
		  DB::delete('delete from apps where id = ?', [$id]);  
		  $view = AppDataController::index();
        echo $view;
	 }  
	 
	 public function update(Request $request, $id) 
    {
        $name = $request['name'];
		  $description = $request['description'];
        $device_profile_name = $request['device_profile_name'];
        $gateway_name = $request['gateway_name'];
        DB::update('update apps set name = ?, description = ?, device_profile_name = ?, 
        gateway_name = ? where id = ?', 
        [$name,$description,$device_profile_name,$gateway_name,$id]);
        $view = AppDataController::index();
		  echo $view; 
    }
    
}
