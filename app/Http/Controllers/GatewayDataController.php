<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

class GatewayDataController extends Controller
{		
	 public function index(){
	 	  $gateways = DB::select('select * from gateways');
		  return view('gatewayIndex', ['gateways' => $gateways]);
	 }
	 
	 public function info($name){
		  $gateways = DB::select('select * from gateways where name = ?', [$name]);	
		  return view('gatewayInfo', ['gateways' => $gateways]);
	 }	 
	 
	 public function getLastInsertedId() {
		  $no_id = DB::table('gateways')->count();
		  return $no_id; 
	 }
	 
	 public function create(){
		  return view('gatewayCreate');
	 }
	 
	 public function remove($id){
	 	
	 	  $gateway = DB::select('select * from gateways where id = ?', [$id]);
		  return view('gatewayDelete', ['gateway' => $gateway]);	 
	 }	
	 
	 public function edit($id){
		  $gateway = DB::select('select * from gateways where id = ?', [$id]);
		  return view('gatewayEdit', ['gateway' => $gateway]);	 
	 } 
	 
	 public function insert(Request $request){ 
		  	            
		  	 $name = $request['name'];         
		  	 $mqtt_server = $request['mqtt_server'];
		  	 $mqtt_port = $request['mqtt_port'];
		  	 $token = $request['token'];
		  	 $is_active = true;
		  	 $id = GatewayDataController::getLastInsertedId();
		  	 $id++;
		  	 $data = array('id' => $id, 'name' => $name, 'mqtt_server' => $mqtt_server, 
		  	 'mqtt_port' => $mqtt_port, 'token' => $token, 'is_active' => $is_active);
		  	 DB::table('gateways')->insert($data);
			 $view = GatewayDataController::index();
          echo $view; 	 
	 }  
	 
	 public function update(Request $request, $id) 
    {
        $name = $request['name'];
		  $mqtt_server = $request['mqtt_server'];
		  $mqtt_port = $request['mqtt_port'];
        DB::update('update gateways set name = ?, mqtt_server = ?, mqtt_port = ? where id = ?', 
        [$name,$mqtt_server,$mqtt_port,$id]);
        $view = GatewayDataController::index();
		  echo $view; 
    }
       
	 public function delete(Request $request, $id){ 
	 	  DB::delete('delete from gateways where id = ?', [$id]);
		  $view = GatewayDataController::index();
        echo $view;  
	 }     
}
