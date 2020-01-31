@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit your device-profile: </div>

					 <div class="container">
					 			<br>
            			   <a class="btn btn-primary" href="/deviceProfiles"> Go back </a>
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
                    @foreach($device_profile as $dp)
                    <form method="post" action="{{route('devProfileUpdate', $dp->id)}}">
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="name">Name:</label> 
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" value="{{$dp->name}}" name="name">
                    </div>
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="topic">Topic:</label> 
                          <input type="text" class="form-control" id="topic" placeholder="Enter Topic" value="{{$dp->topic}}" name="topic">
                    </div>
                    <div class="form-group">
   							  <label for="functions">Functions</label>
                           	<div class="row">
        									<div class="col-md-2">
            								Key:
        									</div>
        									<div class="col-md-4">
            								Type:
        									</div>
    									</div>
    									@for ($i=0; $i <= 6; $i++)
        								<div class="row">
            							<div class="col-md-2">
                								<input type="text" name="functions[{{ $i }}][key]" class="form-control" 
                  							value="{{ old('$dp->functions['.$i.'][key]') }}">
            							</div>
            							<div class="col-md-4">
                								<input type="text" name="functions[{{ $i }}][type]" class="form-control" 
                  							value="{{ old('$dp->functions['.$i.'][type]') }}">
            							</div>
        								</div>
    									@endfor
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