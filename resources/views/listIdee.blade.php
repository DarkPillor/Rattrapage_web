<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/mon_css.css')}}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>

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
            </div>
        @endif
    <div class="container">

    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nom de l'activité</th>
        <th>Description de l'activité</th>
        <th>Date :</th>
        <th>Prix :</th>
        <!-- <th>L'heure</th>
        <th>Est ce qu'il va se repeter ?</th> -->
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($activitys as $activity)
      <tr>
        <td>{{$activity['name']}}</td>
        <td>{{$activity['description']}}</td>
        <td>{{$activity['date']}}</td>
        <td>{{$activity['cost']}} €</td>


        @if($type_id == 1)
        <td><a href="{{action('activityController@edit', $activity['id'])}}"class="btn btn-warning"> Edit</a></td>
        <td>
          <form action="{{action('activityController@destroy', $activity['id'])}}"class="btn btn-warning" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
        @endif

        <td><a href="{{action('VoteController@edit', $activity['id'])}}"class="btn btn-warning">A voter !</a></td>

        <td>
            <form action="{{action('VoteController@destroy', $activity['id'])}}"class="btn btn-warning" method="post" >
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-success" type="submit" >Dévoter</button>
            </form>
        </td>
        
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
</div>
  </body>
</html>
