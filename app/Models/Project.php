<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table='projects';

    public function owner(){
      return this->belongsTo(Owner::class);
    }
    public function owner(){
      return this->belongsTo(Status::class);
    }
}
