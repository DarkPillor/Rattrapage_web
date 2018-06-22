<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Créer une activité </title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/mon_css.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
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
                  <a href="<?php echo e(route('logout')); ?>"> Déconnexion</a>
              <?php else: ?>
                  <a href="<?php echo e(route('login')); ?>">Login</a>
                  <a href="<?php echo e(route('register')); ?>">Register</a>
              <?php endif; ?>
            </div>
        <?php endif; ?>
      </div>
      <br />

        <br />
      <?php if($type_id ==1): ?>
    <div class="container">
      <center><h2>Création d'une activité</h2><br/></center>
      <form method="post" action="<?php echo e(url('activitys')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
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
              <textarea name="description" class="form-control" rows="5" cols="40" maxlength="255"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6"></div>
          <div class="form-group col-md-4">
            <label for="name">Combien l'activité va couter:</label>
            <input type="number" step="0.01" min="0" max="9999" class="form-control" name="cost">
          </div>
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
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Envoyer</button>
          </div>
        </div>
      </form>
    </div>
    <?php endif; ?>
  </body>
</html>
