<!doctype html>
<html>
<head>
    <meta charset="utf-8">

   <title>{{ config('app.name', 'PamutLabor') }}</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/css.css') }}">

</head>

<body>

  <form method="post" action="/store" class="create-form" >
    <div class="form-group">
      @csrf
      <label for="exampleFormControlInput1">Név:</label>
      <input type="input" name="title" class="form-control" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Leírás:</label>
      <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Example select</label>
      <select name="status" class="form-control" id="exampleFormControlSelect1">
        @foreach ($statuses as $status)
          <option value="{{ $status -> id }}">{{ $status -> keys }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Kapcsolattartó neve:</label>
      <input type="input" name="name" class="form-control" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Kapcsolattartó Email-címe:</label>
      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" >
    </div>

    <button type="submit" class="btn btn-primary">Mentés</button>
  </form>

</body>
</html>
