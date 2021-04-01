<!doctype html>
<html>
<head>
    <meta charset="utf-8">

   <title>{{ config('app.name', 'PamutLabor') }}</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/css.css') }}">

</head>

<body>



<div class="table-responsive table-div">
  @foreach($projects as $project)

    <table class="table table-borderless table-projects">
				<tbody>
					<tr>
						<td><h2>{{ $project ->title }}</h2></td>
						<td class="column-projects">{{ $project ->keys}}</td>
					</tr>
					<tr>
						<td colspan="2">{{ $project ->email}}</td>
					</tr>
					<tr>
						<td colspan="2">
							<button type="button" class="btn btn-primary">Szerkesztés</button>
							<button type="button" class="btn btn-danger">Törlés</button>
						</td>
					</tr>
				</tbody>
			</table>


  @endforeach
  </div>
</body>
</html>
