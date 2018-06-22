<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Créer une activité </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/mon_css.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
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
      <br />

        <br />
      @if($type_id ==1)
    <div class="container">
      <center><h2>Création d'une activité</h2><br/></center>
      <form method="post" action="{{url('activitys')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6"></div>
            <div class="form-group col-md-4">
              <label for="description">Description:</label>
              <textarea name="description" class="form-control" rows="5" cols="40" maxlength="255"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6"></div>
          <div class="form-group col-md-4">
            <label for="name">Combien l'activité va couter:</label>
            <input type="number" step="0.01" min="0" max="9999" class="form-control" name="cost">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6"></div>
            <div class="form-group col-md-4">
                <lable>Est-ce que l'activité va se repeter ?</lable>
                <select name="repeat">
                  <option value="0">Non</option>
                  <option value="1">Oui</option>
                </select>
            </div>
        </div>
        <div class="row">
         <div class="col-md-6"></div>
           <div class="form-group col-md-4">
               <lable>Quand voulez vous organiser cela ?</lable>
               <input type="date" name="date">
               </select>
           </div>
       </div>
       <div class="row">
          <div class="col-md-6"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Envoyer</button>
          </div>
        </div>
      </form>
    </div>
    @endif
  </body>
</html>
