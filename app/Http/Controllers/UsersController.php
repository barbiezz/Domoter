<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
	 	  $users = DB::select('select * from users');
		  return view('userIndex', ['users' => $users]);
	 }
	 
	 public function remove($id){
	 	  $user = DB::select('select * from users where id = ?', [$id]);
		  return view('userDelete', ['user' => $user]);	 
	 }
	 
	 public function delete(Request $request, $id){ 
	 	  DB::delete('delete from users where id = ?', [$id]);
		  $view = UsersController::index();
        echo $view;  
	 }  	 
	 
}
