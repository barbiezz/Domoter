<?php

namespace App\Http\Controllers;
use App\Device;
use DB;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
	 //Updates an existing gateway
    public function update(Request $request, Gateway $gateway)
    {
        $gateway->update($request->all());

        return response()->json($gateway, 200);
    }

	public function activate(Request $request, Device $device)
	{
		
		  $device->update($request->all());	
	}

}
