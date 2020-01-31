<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class Registergateway extends GatewayDataController
{
    public function token($id, Request $request){
	$tokens = array();
	$tokens['token'] = md5(random_bytes(8));
	
	$gateway = $request['gateway'];
	$devices = $request['devices'];
	$app = $request['app'];
	$device_profile = $request['device_profile'];

	//insert gateway
	$gateway_name = $gateway["0"]["name"];        
	$mqtt_server = $gateway["0"]["mqtt_server"];
	$mqtt_port = $gateway["0"]["mqtt_port"];
	$token = $tokens['token'];
	$is_active = true;
	$data = array('id' => $id, 'name' => $gateway_name, 'mqtt_server' => $mqtt_server, 
	'mqtt_port' => $mqtt_port, 'token' => $token, 'is_active' => $is_active);
	DB::table('gateways')->insert($data);
	
	//insert device
	for($i=0; $i<sizeof($devices); $i++){
		$device_name = $devices[$i]["name"];        
		$device_id = $devices[$i]["id"];
		$device_app_name = $devices[$i]["app_name"];
		$data_2 = array('id' => $device_id, 'name' => $device_name, 'app_name' => $device_app_name);
		DB::table('devices')->insert($data_2);
	}
	
	//insert app
	for($i=0; $i<sizeof($app); $i++){
		$app_name = $app[$i]["name"];        
		$app_id = $app[$i]["id"];
		$app_description = $app[$i]["description"];
		$app_device_profile_name = $app[$i]["device_profile_name"];
		$app_gateway_name = $app[$i]["gateway_name"];
		$data_3 = array('id' => $app_id, 'name' => $app_name, 'description' => $app_description, 
		'device_profile_name' => $app_device_profile_name, 'gateway_name' => $app_gateway_name);
		DB::table('apps')->insert($data_3);
	}
	
	//insert device-profile
	for($i=0; $i<sizeof($device_profile); $i++){
		$device_profile_name = $device_profile[$i]["name"];        
		$device_profile_id = $device_profile[$i]["id"];
		$device_profile_functions = $device_profile[$i]["functions"];
		$device_profile_topic = $device_profile[$i]["topic"];
		$data_4 = array('id' => $device_profile_id, 'name' => $device_profile_name, 'functions' => $device_profile_functions, 
		'topic' => $device_profile_topic);
		DB::table('device_profiles')->insert($data_4);
	}
	
	return json_encode($tokens);
    }
}
