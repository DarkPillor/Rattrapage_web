<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example </title>
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
                    <a href="{{ url('/activitys/create')}}"> Créer une activité</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif
        <div class="container">
          <h2>Edit A Form</h2><br  />
          @foreach($photos as $photo)
          <?php $test = $photo->photo; ?>
          <img src="{{asset("storage/storage/$test")}}" id="popup" onclick="div_show()">
          @endforeach
          <form action="{{action('LikephotosController@update', $id)}}"class="btn btn-warning" method="POST">
            @csrf
            <button class="btn btn-danger" type="submit">Like</button>
          </form>

          <form action="{{action('LikephotosController@destroy', $id)}}"class="btn btn-warning" method="DELETE">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Dislike</button>
          </form>

          <form method="POST" action="{{action('CommentController@update', $id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            </div>
            </div>
            <div class="row">
              <div class="col-md-6"></div>
                <div class="form-group col-md-4">
                  <label for="description">Description:</label>
                  <textarea name="description" class="form-control" rows="5" cols="40" ></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6"></div>
              <div class="form-group col-md-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        @foreach($comments as $comment)
        <tr>
            <td>{{$comment['user_id']}}</td>
            <td>{{$comment['description']}}</td>
            <td>{{$comment['created_at']}}</td><br  />
          </form>

        </tr>
        @endforeach

    </div>

    </body>
</html>
