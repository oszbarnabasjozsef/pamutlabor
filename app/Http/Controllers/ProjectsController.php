<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Owner;
use App\Models\Status;

class ProjectsController extends Controller
{
    public function index(){
      $projects = DB::table('projects')
        ->join('owners', 'projects.owner_id', '=', 'owners.id')
        ->join('statuses', 'projects.status_id', '=', 'statuses.id')
        ->get();
      return view('projects.index',['projects' => $projects]);
    }

    
}
