<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($t); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<a href="<?php echo e(url("formAddticket")); ?>">añadir ticket </a>
<table>
    <tr>
        <td>id </td>
        <td>titlde </td>
        <td>desc </td>
        <td>author_id </td>
        <td>assigned_id </td>
        <td>status_id </td>
    
        <td>edit </td>
        <td>delete </td>
    </tr>
  
        <tr>
            <td><?php echo e($tickets->id); ?></td>
            <td><?php echo e($tickets->titlde); ?></td>
            <td><?php echo e($tickets->desc); ?></td>
            <td><?php echo e($tickets->author_id); ?></td>
            <td><?php echo e($tickets->assigned_id); ?></td>
            <td><?php echo e($tickets->status_id); ?></td>
         
            <td><a href="<?php echo e(url("editicket")); ?>/<?php echo e($ticket->id); ?>">edit </a></td>
            <td><a href="<?php echo e(url("deleteticket")); ?>/<?php echo e($ticket->id); ?>">delete </a></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
    

</body>
</html><?php /**PATH /home/tarda/Escriptori/Daw2/M7/2Daw07/laravel/resources/views/tickets/index.blade.php ENDPATH**/ ?>