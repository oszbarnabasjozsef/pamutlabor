<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

//Owner model, one to one connection with Project
class Owner extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table='owners';
    
    public function projects(){
      return $this->hasOne('App\Models\Project');
    }
}
