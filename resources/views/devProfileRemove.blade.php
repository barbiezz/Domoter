@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Remove Device Profile: </div>

               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
               @foreach($device_profile as $dp)
               <div class="container">
                    <p> Are you really sure you want to delete this profile and its entry in the database? </p>
                    <a class="btn btn-primary" href="/deviceProfiles"> Go back </a>
                    <a class="btn btn-primary" href="/deviceProfiles/{{$dp->id}}"> Yes, I am sure </a>
               </div>
               @endforeach
            </div>
        </div>
    </div>
</div>
@endsection