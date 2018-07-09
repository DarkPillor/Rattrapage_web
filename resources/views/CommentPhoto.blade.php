<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Commenter</title>
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
        <H1> Commentez vos photos préférez et aimez les !</h1>
          <br />
          @foreach($photos as $photo)
          <?php $test = $photo->photo;
                $test2 =$photo->id?>
          <center><img src="{{asset("storage/storage/$test")}}" id="popup" alt ="<?php echo "$test"; ?>" ></center>

          <center><form action="{{url('Photos/contact', $test2)}}" method="POST">
            @csrf
                <input type="submit" class="btn btn-danger" value="Cette image peut nuire à l'image de l'école"/>
            </form></center>
          @endforeach
          <center><H2>Il a été liké {{$counts}}</H2></center>

          <center><form action="{{action('LikephotosController@update', $id)}}"class="btn btn-warning" method="POST">
            @csrf
            <button class="btn btn-danger" type="submit">Like</button>
          </form>

          <form action="{{action('LikephotosController@destroy', $id)}}"class="btn btn-warning" method="DELETE">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Dislike</button>
          </form></center><br/ >

          <form method="POST" action="{{action('CommentController@update', $id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <center><div class="">
              <div class="col-md-6"></div>
                <div class="form-group col-md-4">
                  <label for="description">Description:</label>
                  <textarea name="description" class="form-control" rows="5" cols="40" maxlength="255" ></textarea>
              </div>
            </div></center>

            <center><div class="">
              <div class="col-md-6"></div>
              <div class="form-group col-md-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form></center>

          <center><div class="containerComment">
            @foreach($comments as $comment)

              <?php $name = $comment->name;
                $firstname = $comment->firstname;
                $description = $comment->description;
                $created = $comment->created_at;
                $id_comment = $comment->id;


                echo "  <div class=\"boxC\">
                      <p class=\"NomC\">$name</p>
                      <p class=\"PrenomC\">$firstname</p>
                      <p class=\"DesC\">$description</p>
                      <p class=\"DateC\">$created</p>
                    </div>
                  ";?>

            <form action="{{url('Comment/contact', $id_comment)}}" method="POST">
                @csrf
                  <input type="submit" class="btn btn-danger" value="Ce commentaire peut nuire à l'image de l'école"/>
            </form>
        @endforeach
    </div></center>

    </body>
</html>
