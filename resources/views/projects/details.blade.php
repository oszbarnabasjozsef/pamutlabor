@extends('master')

@section('title', 'Details')


@section('content')
  <div class="table-responsive table-div">
    @if(count($project) == 0)
      <p class="center">A kért oldal nem létezik! Itt tudsz visszalépni:
        <br /><button type="button" name="back" class="btn btn-primary"><a href="/">Vissza a projektekhez</a></button></p>
    @else
        <h1>{{ $project[0]->title }}</h1>
        <p><b>Stástusz:</b> {{ $project[0]->keys }} - {{ $project[0]->status_name }}</p>
        <p><b>Projekt leírása:</b> {{ $project[0]->description }}</p>
        <h3>Kapcsolattartó adatai:</h3>
        <p><b>Név:</b>{{ $project[0]->owner_name }}</p>
        <p><b>Email:</b>{{ $project[0]->email }}</p>

          <!--Show details-->
          <button type="button" name="back" class="btn btn-primary"><a href="/">Vissza a projektekhez</a></button>
          <!--Edit an element-->
          <button type="button" name="edit" class="btn btn-primary"><a href={{"../edit/".$project[0]->pid }}>Szerkesztés</a></button>
          <!--Delete an element-->
          <button type="button" class="btn btn-danger"><a href={{"../delete/".$project[0]->pid }}>Törlés</a></button>
        @endif
  </div>

@stop
