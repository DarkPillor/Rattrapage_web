<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des photos</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/elements.css') }}">
    <link rel="stylesheet" href="{{asset('css/mon_css.css')}}">
    <script type="text/javascript" src="{!! asset('js/my_js.js') !!}"></script>

  </head>
  <body>
    <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
          @auth
              <a href="{{ url('/home') }}">Home</a>
              <a href="{{ url('/activitys')}}">Voir les activités</a>
              <a href="{{ url('/idee') }}">Voir les idées</a>
              @if(Auth::user()->type_id ==1)
              <a href="{{ url('/activitys/create')}}"> Créer une activité</a>
              @endif
              <a href="{{ route('logout') }}"> Déconnexion</a>
          @else
              <a href="{{ route('login') }}">Login</a>
              <a href="{{ route('register') }}">Register</a>
          @endauth
        </div>
      </div>
    @endif

    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <br />
     <H1> La liste des photos lié à cet activité !</h1>
       <br />
     @foreach ($photo as $photos)
        <?php $test = $photos->photo;?>
          <a href="{{action('CommentController@edit', $photos['id'])}}"class="btn btn-warning">
          <img src="{{asset("storage/storage/$test")}}" id="popup" onclick="div_show()" alt ="<?php echo "$test"; ?>"></a>
        @endforeach



      </div>
        </body>


</html>
