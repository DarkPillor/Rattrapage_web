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
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <!-- <th>L'heure</th>
        <th>Est ce qu'il va se repeter ?</th> -->
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($photo as $photos)
      <?php $test =$photos->photo; ?>
       <img src="{{asset("storage/$test")}}">
     @endforeach


    </tbody>
  </table>
  </div>
  </body>
</html>
