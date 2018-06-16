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

    <tbody>
      @foreach ($photo as $photos)

      <?php $test =$photos->photo; ?>
       <img src="{{asset("storage/storage/$test")}}">
     @endforeach
     <body id="body" style="overflow:hidden;">
       <div id="abc">
         <div id="popupContact">
         <!-- Contact Us Form -->
         <form action="{{action('activityController@destroy', $activity['id'])}}"class="btn btn-warning" method="post" id="form">
           <img id="close" src="images/3.png" onclick ="div_hide()">
           <h2>Contact Us</h2>
           <hr>
           <textarea id="msg" name="description" placeholder="Message"></textarea>
           <button type="submit" class="btn btn-success">Submit</button>
         </form>
       </div>
     </div>
   </body>
    </tbody>
  </table>
  </div>
  </body>
</html>
