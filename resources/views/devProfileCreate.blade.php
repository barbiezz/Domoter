<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Domoter') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Domoter') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
				<div class="container">
    				<div class="row justify-content-center">
       				 <div class="col-md-8">
            				<div class="card">
                				<div class="card-header"> Add new Device-Profile: </div>

					 				<div class="container">
					 						<br>
            			  				 <a class="btn btn-primary" href="{{url()->previous()}}"> Go back </a>
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
                    
					 <form method="POST" action="/deviceProfiles/inserted">
   					 @csrf
    					<div class="form-group">
        						<label for="name">Name</label>
        						<input type="text" name="name" class="form-control">
   					</div>
   					<div class="form-group">
        						<label for="topic">Topic</label>
        						<input type="text" name="topic" class="form-control">
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
        						<div id="container2">
        						<div class="row">
            					<div class="col-md-2">
                					<input type="text" name="functions[0][key]" class="form-control">
            					</div>
            					<div class="col-md-4">
            					<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
            						<select class="form-control" name="functions[0][type]">
											<option value="string"> string </option>  
											<option value="text"> text </option> 
											<option value="integer"> integer </option> 
											<option value="boolean"> boolean </option>           						
            						</select>
            					</div>
        						</div>
        						</div>
        						<button id="add_field_button" type="button"> + Add Row </button>
    					</div>
    					<div>
        					<button class="btn btn-primary" type="submit"> Submit </button>
    					</div>
					</form>
                </div>
            			</div>
       				 </div>
    				</div>
				</div>
        </main>
    </div>
    <script type="text/javascript">
    document.getElementById("#add_field_button").onclick = function(){
		var count=1;
		$("#container2").append(addNewRow(count));
			count++;
			
			function addNewRow(count){
  			var newrow='<div class="row">'+
            			'<div class="col-md-2">'+
                			'<input type="text" name="functions['+count+'][key]" class="form-control">'+
            			'</div>'+
            			'<div class="col-md-4">'+
                			'<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">'+
            				'<select class="form-control" name="functions['+count+'][type]">'+
									'<option value="functions['+count+'][type]"> string </option>  '+
									'<option value="functions['+count+'][type]"> text </option> '+
									'<option value="functions['+count+'][type]"> integer </option> '+
									'<option value="functions['+count+'][type]"> boolean </option> '+    
            			'</div>'+
        					'</div>';
  				return newrow;
		}
	 }	
    </script>
</body>
</html>