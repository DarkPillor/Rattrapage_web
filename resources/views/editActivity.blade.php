<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifier une activiter</title>
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
      @if($type_id == 1)
    <div class="container">

        <form method="POST" action="{{action('activityController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">

          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$activity->name}}">
          </div>
        </div>
        <div class="row">

          <div class="form-group col-md-4">
              <label for="description">Description:</label>
              <textarea name="description" class="form-control" rows="5" cols="40" value="" maxlength="255">{{$activity->description}}</textarea>
          </div>
        </div>
        <div class="row">

            <div class="form-group col-md-4">
                <lable>Est-ce que l'activité va se repeter ?</lable>
                <select name="repeat">
                  <option value="0" @if($activity->repeat=="0") selected @endif>Non</option>
                  <option value="1" @if($activity->repeat=="1") selected @endif>Oui</option>
                </select>
            </div>
        </div>
        <div class="row">

          <div class="form-group col-md-4">
               <lable>Quand voulez vous organiser cela ?</lable>
               <input type="date" name="date" value="{{$activity->date}}">
               </select>
           </div>
       </div>
       <div class="row">

        <div class="form-group col-md-4">
              <lable>A partir de ?</lable>
              <input type="time" name="time" value="{{$activity->time}}">
              </select>
          </div>
        </div>
          <div class="row">

              <div class="form-group col-md-4">
                  <lable>Voulez vous valider cet activité?</lable>
                  <select name="validate">
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                  </select>
              </div>
          </div>

        <div id="Submit">

          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Envoyer</button>
          </div>
        </div>
      </form>

      @endif
  </body>
</html>
