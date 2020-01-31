@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Remove user: </div>

               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
               @foreach($user as $u)
               <div class="container">
                    <p> Are you really sure you want to delete this user and its entry in the database? </p>
                    <a class="btn btn-primary" href="{{url()->previous()}}"> Go back </a>
                    <a class="btn btn-primary" href="/users/{{$u->id}}"> Yes, I am sure </a>
               </div>
               @endforeach
            </div>
        </div>
    </div>
</div>
@endsection