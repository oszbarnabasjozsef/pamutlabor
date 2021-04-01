<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Status;

class Project extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table='projects';

    public function owner(){
      return this->belongsTo(Owner::class);
    }
    public function status(){
      return this->belongsTo(Status::class);
    }
}
