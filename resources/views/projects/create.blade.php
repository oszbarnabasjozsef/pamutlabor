@extends('master')

@section('title', 'Create/Edit')


@section('content')

<!--If arrive $project -> edit the project, else create a new project-->
  <form method="post" action="@if(isset($project)){{"/update"}}@else{{"/store"}}@endif" class="create-form" >
    <div class="form-group">
      @csrf
      <label for="exampleFormControlInput1">Név:</label>
      <input type="input" name="title" class="form-control" id="exampleFormControlInput1" value="@if(isset($project)){{ $project[0] -> title }}@endif" required="required" minlength="6" maxlength="150">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Leírás:</label>
      <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required="required" minlength="20"> @if(isset($project)){{ $project[0] -> description }}@endif</textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Example select</label>
      <select name="status" class="form-control" id="exampleFormControlSelect1">
        <!-- List status selection, if update the project, set the selected status to the old status -->
        @foreach ($statuses as $status)
          <option value="{{ $status -> id }}" @if(isset($project) && ($status->id==$project[0]->status_id)) selected @endif>{{ $status -> keys }}</option>
        @endforeach

      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Kapcsolattartó neve:</label>
      <input type="input" name="name" class="form-control" id="exampleFormControlInput1" value="@if(isset($project)){{ $project[0] -> owner_name }}@endif" required="required" minlength="6" maxlength="45">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Kapcsolattartó Email-címe:</label>
      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="@if(isset($project)){{ $project[0] -> email }}@endif" required="required" minlength="6" maxlength="45">
    </div>
    @if(isset($project))
      <input type="hidden" name="id" class="form-control" id="exampleFormControlInput1"  value="{{ $project[0] -> pid }}">
    @endif
    <button type="submit" class="btn btn-success">Mentés</button>
    @if(isset($project))
      <button type="button" name="back" class="btn btn-primary"><a href="/projects">Vissza a projektekhez</a></button>
    @endif
  </form>

@stop
