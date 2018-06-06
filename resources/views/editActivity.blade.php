<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Edit A Form</h2><br  />
        <form method="post" action="{{action('ActivityController@update', $Id_activity)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-6"></div>
          <div class="form-group col-md-4">
            <label for="Name_activity">Name:</label>
            <input type="text" class="form-control" name="Name_Activity" value="{{$activity->Name_activity}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6"></div>
            <div class="form-group col-md-4">
              <label for="Email">Description:</label>
              <textarea name="Description_activity" class="form-control" rows="5" cols="40" value="{{$activity->Description_activity}}"></textarea>
          </div>
        <div class="row">
          <div class="col-md-6"></div>
            <div class="form-group col-md-4">
                <lable>Est-ce que l'activité va se repeter ?</lable>
                <select name="Repeat_activity">
                  <option value="0" @if($activity->Repeat_activity=="0") selected @endif>Non</option>
                  <option value="1" @if($activity->Repeat_activity=="1") selected @endif>Oui</option>
                </select>
            </div>
        </div>
        <div class="row">
         <div class="col-md-6"></div>
           <div class="form-group col-md-4">
               <lable>Quand voulez vous organiser cela ?</lable>
               <input type="date" name="Date_activity" value="{{$activity->Date_activity}}">
               </select>
           </div>
       </div>
       <div class="row">
        <div class="col-md-6"></div>
          <div class="form-group col-md-4">
              <lable>A partir de ?</lable>
              <input type="time" name="Time_activity" value="{{$activity->time_activity}}">
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
