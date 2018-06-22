<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des personnes inscrites</title>
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
                  <a href="{{ route('logout') }}"> Déconnexion</a>
              @else
                  <a href="{{ route('login') }}">Login</a>
                  <a href="{{ route('register') }}">Register</a>
              @endauth
            </div>
        @endif
      </div>
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
        <th>Nom</th>
        <th>Prénom</th>
        <th>A-t-il payé?</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <?php $name = $user->name;
            $firntamename = $user->firstname;
            $payed = $user->payed;
            echo "<tr>
                    <td>$name</td>
                    <td>$firntamename</td>
                    <td>$payed </td>
                  </tr>";?>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
