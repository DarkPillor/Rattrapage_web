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
        <form method="POST" action="{{action('activityController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-6"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$activity->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6"></div>
            <div class="form-group col-md-4">
              <label for="description">Description:</label>
              <textarea name="description" class="form-control" rows="5" cols="40" value="{{$activity->description}}"></textarea>
          </div>
        <div class="row">
          <div class="col-md-6"></div>
            <div class="form-group col-md-4">
                <lable>Est-ce que l'activité va se repeter ?</lable>
                <select name="repeat">
                  <option value="0" @if($activity->repeat=="0") selected @endif>Non</option>
                  <option value="1" @if($activity->repeat=="1") selected @endif>Oui</option>
                </select>
            </div>
        </div>
        <div class="row">
         <div class="col-md-6"></div>
           <div class="form-group col-md-4">
               <lable>Quand voulez vous organiser cela ?</lable>
               <input type="date" name="date" value="{{$activity->date}}">
               </select>
           </div>
       </div>
       <div class="row">
        <div class="col-md-6"></div>
          <div class="form-group col-md-4">
              <lable>A partir de ?</lable>
              <input type="time" name="time" value="{{$activity->time}}">
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
