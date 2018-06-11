<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>

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
        <td>{{$activity['name']}}</td>
        <td>{{$activity['description']}}</td>
        <td>{{$activity['date']}}</td>
        <td>{{$activity['time']}}</td>
        <td>{{$activity['repeat']}}</td>



        <td><a href="{{action('activityController@edit', $activity['id'])}}"class="btn btn-warning"> Edit</a></td>
        <td>
          <form action="{{action('activityController@destroy', $activity['id'])}}"class="btn btn-warning" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
        <td>
          <div id="mulitplefileuploader">Upload</div>
          <div id="status"></div>
            <script>

              $(document).ready(function()
                {

                  var settings = {
                    url: "YOUR_MULTIPE_FILE_UPLOAD_URL",
                    method: "POST",
                    allowedTypes:"jpg,png,gif,doc,pdf,zip",
                    fileName: "myfile",
                    multiple: true,
                    onSuccess:function(files,data,xhr)
                    {
                      $("#status").html("<font color='green'>Upload is success</font>");
                     },
                      onError: function(files,status,errMsg)
                    {       
                      $("#status").html("<font color='red'>Upload is Failed</font>");
                    }
                  }
                  $("#mulitplefileuploader").uploadFile(settings);

                });
              </script>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
