<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/mon_css.css')); ?>">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>

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
    <div class="container">
    <br />
    <?php if(\Session::has('success')): ?>
      <div class="alert alert-success">
        <p><?php echo e(\Session::get('success')); ?></p>
      </div><br />
     <?php endif; ?>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nom de l'activité</th>
        <th>Description de l'activité</th>
        <th>Date :</th>
        <!-- <th>L'heure</th>
        <th>Est ce qu'il va se repeter ?</th> -->
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $activitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><a href="<?php echo e(action('PhotosController@show', $activity['id'])); ?>"><?php echo e($activity['name']); ?></a></td>
        <td><?php echo e($activity['description']); ?></td>
        <td><?php echo e($activity['date']); ?></td>
        <!-- <td><?php echo e($activity['time']); ?></td> -->
        <!-- <td><?php echo e($activity['repeat']); ?></td> -->

        <td><a href="<?php echo e(action('activityController@edit', $activity['id'])); ?>"class="btn btn-warning"> Edit</a></td>
        <td>
          <form action="<?php echo e(action('activityController@destroy', $activity['id'])); ?>"class="btn btn-warning" method="post">
            <?php echo csrf_field(); ?>
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
        <td><a href="<?php echo e(action('RegisterController@edit', $activity['id'])); ?>"class="btn btn-warning"> S'inscrire</a></td>

          <td>
            <form action="<?php echo e(action('RegisterController@destroy', $activity['id'])); ?>"class="btn btn-warning" method="post">
              <?php echo csrf_field(); ?>
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Se désinscrire !</button>
            </form>
          </td>
        <td><a href="<?php echo e(action('RegisterController@show', $activity['id'])); ?>"class="btn btn-warning"> Regarder la liste des inscrits</a></td>


        </form>
        <td>
          <form action="<?php echo e(action('PhotosController@update', $activity['id'])); ?>"class="btn btn-warning" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="file" name="photo" >
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  </div>
</div>
  </body>
</html>
