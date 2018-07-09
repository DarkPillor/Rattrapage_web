<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des idées</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/mon_css.css')}}">
    <link rel="stylesheet" href="{{asset('css/Activity.css')}}">
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>

  </head>
  <header>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
          @auth
              <a href="{{ url('/home') }}">Home</a>
              <a href="{{ url('/activitys')}}">Voir les activités</a>
              <a href="{{ url('/pastactivity')}}">Voir les activités passée</a>
              <a href="{{ url('/idee') }}">Voir les idées</a>
              <a href="{{ url('/activitys/create')}}"> Créer une idée</a>
              <a href="{{ route('logout') }}"> Déconnexion</a>
          @else
              <a href="{{ route('login') }}">Login</a>
              <a href="{{ route('register') }}">Register</a>
          @endauth
        </div>
        @endif

</header>
<body>
  <br />
  <H1> La liste des idées </H1>

     <div class="containerActivity">
      @foreach($activitys as $activity)
            <div class="boxA">
            <p class="NomA" >{{$activity['name']}}</p>
            <p class="DesA" >{{$activity['description']}}</p>
            <p class="DateA" >{{$activity['date']}}</p>
            <p class="PrixA" >{{$activity['cost']}} €</p>
            <p class="TimeA" >{{$activity['time']}}</p>

      @if($type_id == 1)
        <a href="{{action('activityController@edit', $activity['id'])}}"class="EditA"> Edit</a>
        <form action="{{action('activityController@destroy', $activity['id'])}}"class="" method="post">
          @csrf
          <input name="_method" type="hidden" value="DELETE" class="DeleteA" >
          <button class="DeleteA" type="submit">Delete</button>
        </form>
        <a href="{{action('RegisterController@show', $activity['id'])}}"class="ListRegisterA"> Regarder la liste des inscrits</a>

      @endif

        <a href="{{action('VoteController@edit', $activity['id'])}}"class="VoteI">A voter !</a>
        <form action="{{action('VoteController@destroy', $activity['id'])}}"class="" method="post" >
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button  type="submit" class="DevoteI" >Dévoter</button>
        </form>
        <div class="alertI">
        <form action="{{url('idee/contact', $activity['id'])}}" method="POST">
            @csrf
              <input type="submit" class="btn btn-danger" value="Peut nuire à l'image de l'école"/>
        </form>
        </div>
        </div>

      @endforeach

  </body>
</html>
