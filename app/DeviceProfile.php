<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceProfile extends Model
{
   protected $casts = [
   		'functions' => 'array'
   ];
   
   protected $fillable = ['name', 'topic', 'functions'];
   
	public function setFunctionsAttribute($value){
			$functions = [];
			
			foreach($value as $array_item){
					if(!is_null($array_item['key'])){
							$functions[]= $array_item;					
					}			
			}
			
			$this->attributes['functions'] = json_encode($functions);
	}   
   
}
