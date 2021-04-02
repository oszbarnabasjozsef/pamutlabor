<!-- List the projects-->
@extends('master')

@section('title', 'Projects')


@section('content')
  <div class="table-responsive table-div">
    @if(count($projects) == 0)
      <p>Jelenleg nincs egy projekt sem a rendszerben. <b>Szerkesztés/létrehozás</b> menüpontban tudsz létrehozni új projektet.</p>
    @else
      
    <!--List the projects-->
    @foreach($projects as $project)
        <table class="table table-borderless table-projects">
          <tbody>
            <tr>
              <td><h3>{{ $project->title }}</h3></td>
              <td class="column-projects">{{ $project ->keys}}</td>
            </tr>
            <tr>
              <td colspan="2">{{ $project ->email}}</td>
            </tr>
            <tr>
              <td colspan="2">
                <!--Show details-->
                <button type="button" name="show" class="btn btn-success"><a href={{"show/".$project->pid }}>Bővebben</a></button>
                <!--Edit an element-->
                <button type="button" name="edit" class="btn btn-primary"><a href={{"edit/".$project->pid }}>Szerkesztés</a></button>
                <!--Delete an element-->
                <button type="button" class="btn btn-danger"><a href={{"delete/".$project->pid }}>Törlés</a></button>
              </td>
            </tr>
          </tbody>
        </table>
    @endforeach
  @endif
  </div>

<!--Basic paginator-->
    <div class="d-flex justify-content-center paginator">
        {!! $projects->links() !!}
    </div>

@stop
