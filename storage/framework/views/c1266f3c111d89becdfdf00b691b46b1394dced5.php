<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example </title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/mon_css.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/Activity.css')); ?>">
  </head>
  <body>
    <div class="flex-center position-ref full-height">
        <?php if(Route::has('login')): ?>
            <div class="top-right links">
              <?php if(auth()->guard()->check()): ?>
                  <a href="<?php echo e(url('/home')); ?>">Home</a>
                  <a href="<?php echo e(url('/activitys')); ?>">Voir les activités</a>
                  <a href="<?php echo e(url('/idee')); ?>">Voir les idées</a>
                  <a href="<?php echo e(url('/activitys/create')); ?>"> Créer une activité</a>
              <?php else: ?>
                  <a href="<?php echo e(route('login')); ?>">Login</a>
                  <a href="<?php echo e(route('register')); ?>">Register</a>
              <?php endif; ?>
              </div>
        <?php endif; ?>
      </div>
      <?php if($type_id == 1): ?>
    <div class="container">

        <form method="POST" action="<?php echo e(action('activityController@update', $id)); ?>">
        <?php echo csrf_field(); ?>
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">

          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo e($activity->name); ?>">
          </div>
        </div>
        <div class="row">

          <div class="form-group col-md-4">
              <label for="description">Description:</label>
              <textarea name="description" class="form-control" rows="5" cols="40" value="" maxlength="255"><?php echo e($activity->description); ?></textarea>
          </div>
        </div>
        <div class="row">

            <div class="form-group col-md-4">
                <lable>Est-ce que l'activité va se repeter ?</lable>
                <select name="repeat">
                  <option value="0" <?php if($activity->repeat=="0"): ?> selected <?php endif; ?>>Non</option>
                  <option value="1" <?php if($activity->repeat=="1"): ?> selected <?php endif; ?>>Oui</option>
                </select>
            </div>
        </div>
        <div class="row">

          <div class="form-group col-md-4">
               <lable>Quand voulez vous organiser cela ?</lable>
               <input type="date" name="date" value="<?php echo e($activity->date); ?>">
               </select>
           </div>
       </div>
       <div class="row">

        <div class="form-group col-md-4">
              <lable>A partir de ?</lable>
              <input type="time" name="time" value="<?php echo e($activity->time); ?>">
              </select>
          </div>
        </div>
          <div class="row">

              <div class="form-group col-md-4">
                  <lable>Voulez vous valider cet activité?</lable>
                  <select name="validate">
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                  </select>
              </div>
          </div>

        <div id="Submit">

          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Envoyer</button>
          </div>
        </div>
      </form>

      <?php endif; ?>
  </body>
</html>
