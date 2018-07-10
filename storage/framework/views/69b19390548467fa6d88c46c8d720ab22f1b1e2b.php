<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Les activité</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/mon_css.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/Activity.css')); ?>">
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>

  </head>
  <header>
    <div class="flex-center position-ref full-height">
        <?php if(Route::has('login')): ?>
        <div class="top-right links">
          <?php if(auth()->guard()->check()): ?>
              <a href="<?php echo e(url('/home')); ?>">Home</a>
              <a href="<?php echo e(url('/activitys')); ?>">Voir les activités</a>
              <a href="<?php echo e(url('/pastactivity')); ?>">Voir les activités passée</a>
              <a href="<?php echo e(url('/idee')); ?>">Voir les idées</a>
              <a href="<?php echo e(url('/activitys/create')); ?>"> Créer une idée</a>
              <a href="<?php echo e(route('logout')); ?>"> Déconnexion</a>
          <?php else: ?>
              <a href="<?php echo e(route('login')); ?>">Login</a>
              <a href="<?php echo e(route('register')); ?>">Register</a>
          <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>


</header>
<body>
  <br />
  <H1> La liste des activités</h1>
    <br />
     <div class="containerActivity">
      <?php $__currentLoopData = $activitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="boxA">
            <p class="NomA" ><a href="<?php echo e(action('PhotosController@show', $activity['id'])); ?>"><?php echo e($activity['name']); ?></p>
            <p class="DesA" ><?php echo e($activity['description']); ?></p>
            <p class="DateA" ><?php echo e($activity['date']); ?></p>
            <p class="PrixA" ><?php echo e($activity['cost']); ?> €</p>
            <p class="TimeA" ><?php echo e($activity['time']); ?></p>

      <?php if($type_id == 1): ?>
        <a href="<?php echo e(action('RegisterController@CSV', $activity['id'])); ?>"class="CSVA"> Génerer un csv</a>
        <a href="<?php echo e(action('activityController@edit', $activity['id'])); ?>"class="EditA"> Edit</a>
        <form action="<?php echo e(action('activityController@destroy', $activity['id'])); ?>"class="" method="post">
          <?php echo csrf_field(); ?>
          <input name="_method" type="hidden" value="DELETE" class="DeleteA" >
          <button class="DeleteA" type="submit">Delete</button>
        </form>
        <a href="<?php echo e(action('RegisterController@show', $activity['id'])); ?>"class="ListRegisterA"> Regarder la liste des inscrits</a>

      <?php endif; ?>

          <?php if($activity['date'] < $today): ?>
          <?php if($type_id == 1): ?>
          <div class ="Upload">
            <form action="<?php echo e(action('PhotosController@update', $activity['id'])); ?>"class="btn btn-warning" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" name="photo"  >
                <button type="submit" class="">Submit</button>
            </form>
          </div>
          <?php else: ?>
          <div class ="UploadA">
            <form action="<?php echo e(action('PhotosController@update', $activity['id'])); ?>"class="btn btn-warning" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" name="photo"  >
                <button type="submit" class="">Submit</button>
            </form>
          </div>
          <?php endif; ?>
        <?php else: ?>
        <?php
        $userRegister = DB::table('registers')
                    ->join('activities', 'activities.id', '=', 'registers.activities_id')
                    ->select('registers.id')
                    ->where('registers.user_id', '=', Auth::user()->id)
                    ->where('registers.activities_id', '=', $activity['id'])
                    ->first();
                  if (empty ( $userRegister ))
                      {
                      ?>
                      <a href="<?php echo e(action('RegisterController@edit', $activity['id'])); ?>"class="Inscrire" > S'inscrire</a>
                      <?php
                      } else
                      {
                        ?>
                        <form action="<?php echo e(action('RegisterController@destroy', $activity['id'])); ?>" method="post">
                          <?php echo csrf_field(); ?>
                            <input name="_method" type="hidden" value="DELETE" class="DesinscrireA">
                            <button  type="submit" class="DesinscrireA">Se désinscrire !</button>
                        </form>
                        <?php
                      };
                     ?>

        <?php endif; ?>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </body>
</html>
