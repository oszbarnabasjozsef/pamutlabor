<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

//Status model, one to one connection with Project
class Status extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table='statuses';

    public function projects(){
      return $this->hasOne(Status::class);
    }
}
