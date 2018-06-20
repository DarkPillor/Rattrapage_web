<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
    <div class="top-right links">
      @auth
          <a href="{{ url('/home') }}">Home</a>
          <a href="{{ url('/activitys')}}">Voir les activités</a>
          <a href="{{ url('/idee') }}">Voir les idées</a>
          <a href="{{ url('/activitys/create')}}"> Créer une activité</a>
      @else
          <a href="{{ route('login') }}">Login</a>
          <a href="{{ route('register') }}">Register</a>
      @endauth

@endif
    <div class="container">
      <h2>Edit A Form</h2><br  />
        <form method="POST" action="{{action('PhotoController@store', $id)}}">
        @csrf
        <input type="file" name="photo" >
        <div class="row">
          <div class="col-md-6"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <!-- <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
         });
    </script> -->
  </div>
</div>
  </body>
</html>
