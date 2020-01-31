<?php

namespace App\Http\Controllers;
use App\Gateway;
use Illuminate\Http\Request;

class GatewayController extends Controller
{
	 //Lists all gateways
	 public function index()
    {
        return Gateway::all();
    }
    
    //Shows the gateway with id
    public function show(Gateway $gateway)
    {
        return $gateway;
    }

	 //Creates a new gateway
    public function store(Request $request)
    {
        $gateway = Gateway::create($request->all());

        return response()->json($gateway, 201);
    }
    
	 //Updates an existing gateway
    public function update(Request $request, Gateway $gateway)
    {
        $gateway->update($request->all());

        return response()->json($gateway, 200);
    }

	 //Deletes an existing gateway
    public function delete(Gateway $gateway)
    {
        $gateway->delete();

        return response()->json(null, 204);
    }
}
