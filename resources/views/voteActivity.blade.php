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
        <form method="POST" action="{{action('VoteController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
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
    </body>
</html>
