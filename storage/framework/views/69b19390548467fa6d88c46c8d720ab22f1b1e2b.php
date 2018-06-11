<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  </head>
  <body>
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
        <th>L'heure</th>
        <th>Est ce qu'il va se repeter ?</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $activitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($activity['name']); ?></td>
        <td><?php echo e($activity['description']); ?></td>
        <td><?php echo e($activity['date']); ?></td>
        <td><?php echo e($activity['time']); ?></td>
        <td><?php echo e($activity['repeat']); ?></td>



        <td><a href="<?php echo e(action('activityController@edit', $activity['id'])); ?>"class="btn btn-warning"> Edit</a></td>
        <td>
          <form action="<?php echo e(action('activityController@destroy', $activity['id'])); ?>"class="btn btn-warning" method="post">
            <?php echo csrf_field(); ?>
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  </div>
  </body>
</html>
