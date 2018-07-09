<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Acceuil</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/mon_css.css')}}">
    <link rel="stylesheet" href="{{asset('css/Activity.css')}}">

  </head>
  <body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
          @auth
              <a href="{{ url('/home') }}">Home</a>
              <a href="{{ url('/activitys')}}">Voir les activités</a>
              <a href="{{ url('/idee') }}">Voir les idées</a>
              <a href="{{ url('/activitys/create')}}"> Créer une idée</a>
              <a href="{{ route('logout') }}"> Déconnexion</a>
          @else
              <a href="{{ route('login') }}">Login</a>
              <a href="{{ route('register') }}">Register</a>
          @endauth
        </div>
      </div>
        @endif
<br />
<H1> La liste des événements où vous vous êtes inscrit :</h1>
  <br />

<div class="container">
    <div class="row justify-content-center">

            <div class="card">
              <div class="containerActivity">
               @foreach($activitys as $activity)
               <?php $id = $activity->id;
                     $name = $activity->name;
                     $description = $activity->description;
                     $date = $activity->date;
                     $time = $activity->time;
                     $cost = $activity->cost;
                     echo"
                     <div class=\"boxA\">
                     <p class=\"NomA\" >$name</p>
                     <p class=\"DesA\" >$description</p>
                     <p class=\"DateA\" >$date</p>
                     <p class=\"PrixA\" >$cost €</p>
                     <p class=\"TimeA\" >$time</p>"?>

                     @if ($date < $today)
                     <div class ="Upload">
                       <form action="{{action('PhotosController@update', $id)}}"class="btn btn-warning" method="post" enctype="multipart/form-data">
                           @csrf
                           <input type="file" name="photo"  >
                           <button type="submit" class="">Submit</button>
                       </form>
                     </div>
                       @else
                       <form action="{{action('RegisterController@destroy', $id)}}" method="post">
                         @csrf
                           <input name="_method" type="hidden" value="DELETE" class="DesinscrireH">
                           <button  type="submit" class="DesinscrireH">Se désinscrire !</button>
                       </form>
                   @endif
               </div>
             @endforeach
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</html>
