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
        <th>Heure :</th>
        <th>Prix :</th>
        <!-- <th>L'heure</th>
        <th>Est ce qu'il va se repeter ?</th> -->

        <th colspan="2">Action</th>
      </tr>
    </thead>
      <tbody>
      @foreach($activitys as $activity)
      <tr>
        <td><a href="{{action('PhotosController@show', $activity['id'])}}">{{$activity['name']}}</a></td>
        <td>{{$activity['description']}}</td>
        <td>{{$activity['date']}}</td>
        <td>{{$activity['time']}}</td>
        <td>{{$activity['cost']}} €</td>
        <!-- <td>{{$activity['time']}}</td> -->
        <!-- <td>{{$activity['repeat']}}</td> -->

        @if($type_id == 1)
        <td><a href="{{action('activityController@edit', $activity['id'])}}"class="btn btn-warning"> Edit</a></td>
        <td>
          <form action="{{action('activityController@destroy', $activity['id'])}}"class="btn btn-warning" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
        <td><a href="{{action('RegisterController@show', $activity['id'])}}"class="btn btn-warning"> Regarder la liste des inscrits</a></td>
        @endif
          @if ($activity['date'] < $today)
        <td><a href="{{action('RegisterController@edit', $activity['id'])}}"class="btn btn-warning"> S'inscrire</a></td>

          <td>
            <form action="{{action('RegisterController@destroy', $activity['id'])}}"class="btn btn-warning" method="post">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Se désinscrire !</button>
            </form>
          </td>
          @endif
        @if ($activity['date'] > $today)
        <form action="{{action('PhotosController@update', $activity['id'])}}"class="btn btn-warning" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="photo" >
                        <button type="submit" class="btn btn-success">Submit</button>
                      </form>
                      @endif
                    </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
  </body>
</html>
