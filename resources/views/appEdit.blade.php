@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit your app: </div>

					 <div class="container">
					 			<br>
            			   <a class="btn btn-primary" href="/applications"> Go back </a>
        			 </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if ($errors->any())
    					  <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    @foreach($app as $a)
                    <form method="post" action="{{route('appUpdate', $a->id)}}">
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="name">Name:</label> 
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" value="{{$a->name}}" name="name">
                    </div>
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="description">Description:</label> 
                          <input type="text" class="form-control" id="description" placeholder="Enter Description" value="{{$a->description}}" name="description">
                    </div>
                    <div class="form-group">
                    		  <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="device_profile_name">Device Profile Name:</label>
                          <div class="col-md-6">
                          @if(count($device_profiles) > 0)
										<select class="form-control" name="device_profile_name" id="device_profile_name">
												@foreach($device_profiles as $device_profile)
													<option value="{{$a->device_profile_name}}">{{$device_profile->name}}</option>
												@endforeach
										</select>
								  @elseif(count($device_profiles) ==0)
										<p> No device-profiles found. <a href="/addDeviceProfile">Create one</a>.</p>
								  @endif
                          </div>
                    </div>
                    <div class="form-group">
                    		  <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="gateway_name">Gateway:</label>
                          <div class="col-md-6">
                          @if(count($gateways) > 0)
										<select class="form-control" name="gateway_name" id="gateway_name">
												@foreach($gateways as $gateway)
													<option value="{{$a->gateway_name}}">{{$gateway->name}}</option>
												@endforeach
										</select>
								  @elseif(count($gateways) ==0)
										<p> No gateways found. <a href="/addGateway">Create one</a>.</p>
								  @endif
								  </div>
                    </div>

   					  <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection