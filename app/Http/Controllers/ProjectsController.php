<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Paginator;
use App\Models\Project;
use App\Models\Owner;
use App\Models\Status;

class ProjectsController extends Controller
{
  // List the projects - Index page
    public function index(){
      $projects = DB::table('projects')
        ->join('owners', 'owners.id', '=' ,'projects.owner_id')
        ->join('statuses', 'statuses.id', '=','projects.status_id',)
        ->select('projects.id as pid','title', 'owners.*', 'statuses.*')
        ->simplePaginate(2);
      $statuses = Status::all();

      return view('projects.index',['projects' => $projects, 'statuses'=>$statuses]);
    }

// Project registration page, return the statuses to list to the form select
    public function create(){
      $statuses = Status::all();
      return view('projects.create',['statuses' => $statuses]);
    }

// Request from project registration, saving the data
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

      return redirect('projects');
    }

    //Show the project details
    public function show($id){
     $project = DB::table('projects')
     ->join('owners', 'owners.id', '=' ,'projects.owner_id')
     ->join('statuses', 'statuses.id', '=','projects.status_id',)
     ->select('projects.id as pid','title', 'description', 'owners.name as owner_name', 'email', 'statuses.name as status_name', 'keys')
       ->where('projects.id', $id)
       ->get();

     return view('projects.details',['project' => $project]);
    }

//If arrive an edit request, send back the project that we want change
     public function edit($id){
      $project = DB::table('projects')
        ->join('owners', 'projects.owner_id', '=', 'owners.id')
        ->join('statuses', 'projects.status_id', '=', 'statuses.id')
        ->select('projects.id as pid','title', 'description','owners.name as owner_name', 'email', 'statuses.id as status_id', 'statuses.keys')
        ->where('projects.id', $id)
        ->get();
        $statuses = Status::all();
      return view('projects.create',['project' => $project,'statuses'=>$statuses]);
    }

//If arrive an post request, update the project
    public function update(Request $request){

      DB::update('update projects join owners on projects.owner_id =
      owners.id set projects.title=?,projects.description=?, projects.status_id=?,
      owners.name=?, owners.email=? where projects.id = ?',
      [$request->title,$request->description,$request->status, $request->name,
      $request->email, $request->id]);

      return ProjectsController::index();
    }

  // Delete a project and the owner
    public function delete($pid){
      $data = DB::table('projects')
        ->leftJoin('owners', 'owners.id', '=' ,'projects.owner_id')
        ->where('projects.id',$pid);
        DB::table('owners')
        ->join('projects', 'owners.id', '=' ,'projects.owner_id')
        ->where('projects.id',$pid)->delete();
        $data->delete();
      return redirect('projects');
    }
}
