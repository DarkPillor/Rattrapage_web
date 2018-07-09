<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/mon_css.css')}}">
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
    @endif
  </div>
    <div class="container">
      <h2>Allez vous enregistrer !</h2><br  />
        <form method="POST" action="{{action('RegisterController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">


       <div class="row">
        <div class="col-md-6"></div>
          <div class="form-group col-md-4">
              <lable>Voulez vous payer maintenant ou sur place ?</lable>
              <select name="payed">
                  <option value="Non">Je payerais sur place</option>
                  <option value="Oui">Je sort ma carte bancaire !</option>
              </select>
            </div>
          </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </body>
</html>
