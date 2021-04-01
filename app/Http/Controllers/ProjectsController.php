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

    public function create(){
      $statuses = status::all();
      return view('projects.create',['statuses' => $statuses]);
    }

    public function store(Request $request){
      $owner = new Owner;
      $owner->name = $request->name;
      $owner->email = $request->email;
      $owner->save();

      $project = new Project;
      $project->title = $request->title;
      $project->description = $request->description;
      $project->status_id = $request->status;

      $owner->projects()->save($project);

      return ProjectsController::index();
    }
}
