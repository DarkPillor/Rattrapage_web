<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example  </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  </head>
  <body>
    <div class="container">
      <h2>Création d'une activité</h2><br/>
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
              <textarea name="description" class="form-control" rows="5" cols="40"></textarea>
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
          <div class="form-group col-md-4">
              <lable>A partir de ?</lable>
              <input type="time" name="time">
              </select>
          </div>
      </div>
      <div class="row">
        <div class="col-md-6"></div>
          <div class="form-group col-md-4">
              <lable>Voulez vous valider d'officer cet activité?</lable>
              <select name="validate">
                <option value="0">Non</option>
                <option value="1">Oui</option>
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
    <!-- <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
         });
    </script> -->
  </body>
</html>
