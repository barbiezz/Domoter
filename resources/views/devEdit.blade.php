@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit your device: </div>

					 <div class="container">
					 			<br>
					 			@foreach($device as $d)
            			   <a class="btn btn-primary" href="/applications/{{$d->app_name}}/devices"> Go back </a>
            			   @endforeach
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
                    @foreach($device as $d)
                    <form method="post" action="/applications/{{$d->app_name}}/devices/edited/{{$d->id}}">
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="name">Name:</label> 
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" value="{{$d->name}}" name="name">
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