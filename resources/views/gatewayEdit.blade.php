@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit your gateway: </div>

					 <div class="container">
					 			<br>
            			   <a class="btn btn-primary" href="/gateways"> Go back </a>
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
                    @foreach($gateway as $g)
                    <form method="post" action="{{route('gatewayUpdate', $g->id)}}">
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="name">Name:</label> 
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" value="{{$g->name}}" name="name">
                    <p style="color:red;">don't leave blank spaces between words</p></div>
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="mqtt_server">MQTTServer:</label>
                          <input type="text" class="form-control" id="mqtt_server" placeholder="Enter Server Address" 
                          name="mqtt_server" value="{{$g->mqtt_server}}">
                    </div>
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="mqtt_port">MQTTPort:</label>
                          <input type="number" class="form-control" id="mqtt_port" placeholder="Enter Port" name="mqtt_port" value="{{$g->mqtt_port}}">
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