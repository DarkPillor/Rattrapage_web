<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Les activité</title>
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
      </div>


</header>
<body>
  <br />
  <H1> La liste des activités</h1>
    <br />
     <div class="containerActivity">
      @foreach($activitys as $activity)
            <div class="boxA">
            <p class="NomA" ><a href="{{action('PhotosController@show', $activity['id'])}}">{{$activity['name']}}</p>
            <p class="DesA" >{{$activity['description']}}</p>
            <p class="DateA" >{{$activity['date']}}</p>
            <p class="PrixA" >{{$activity['cost']}} €</p>
            <p class="TimeA" >{{$activity['time']}}</p>

      @if($type_id == 1)
        <a href="{{action('RegisterController@CSV', $activity['id'])}}"class="CSVA"> Génerer un csv</a>
        <a href="{{action('activityController@edit', $activity['id'])}}"class="EditA"> Edit</a>
        <form action="{{action('activityController@destroy', $activity['id'])}}"class="" method="post">
          @csrf
          <input name="_method" type="hidden" value="DELETE" class="DeleteA" >
          <button class="DeleteA" type="submit">Delete</button>
        </form>
        <a href="{{action('RegisterController@show', $activity['id'])}}"class="ListRegisterA"> Regarder la liste des inscrits</a>

      @endif

          @if ($activity['date'] < $today)
          @if($type_id == 1)
          <div class ="Upload">
            <form action="{{action('PhotosController@update', $activity['id'])}}"class="btn btn-warning" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="photo"  >
                <button type="submit" class="">Submit</button>
            </form>
          </div>
          @else
          <div class ="UploadA">
            <form action="{{action('PhotosController@update', $activity['id'])}}"class="btn btn-warning" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="photo"  >
                <button type="submit" class="">Submit</button>
            </form>
          </div>
          @endif
        @else
        <?php
        $userRegister = DB::table('registers')
                    ->join('activities', 'activities.id', '=', 'registers.activities_id')
                    ->select('registers.id')
                    ->where('registers.user_id', '=', Auth::user()->id)
                    ->where('registers.activities_id', '=', $activity['id'])
                    ->first();
                  if (empty ( $userRegister ))
                      {
                      ?>
                      <a href="{{action('RegisterController@edit', $activity['id'])}}"class="Inscrire" > S'inscrire</a>
                      <?php
                      } else
                      {
                        ?>
                        <form action="{{action('RegisterController@destroy', $activity['id'])}}" method="post">
                          @csrf
                            <input name="_method" type="hidden" value="DELETE" class="DesinscrireA">
                            <button  type="submit" class="DesinscrireA">Se désinscrire !</button>
                        </form>
                        <?php
                      };
                     ?>

        @endif
      </div>
      @endforeach
    </div>
  </body>
</html>
