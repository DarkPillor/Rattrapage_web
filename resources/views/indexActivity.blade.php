<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
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
        <th>L'heure</th>
        <th>Est ce qu'il va se repeter ?</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($activitys as $activity)
      <tr>
        <td>{{$activity['Name_activity']}}</td>
        <td>{{$activity['Description_activity']}}</td>
        <td>{{$activity['Repeat_activity']}}</td>

        <td>{{$activity['Date_activity']}}</td>
        <td>{{$activity['Time_activity']}}</td>

        <td><a href="{{action('ActivityController@edit', $activity['Id_activity'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('ActivityController@destroy', $activity['Id_activity'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
