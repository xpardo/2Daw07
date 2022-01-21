<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($content['name']); ?>,

<?php echo e($content['body']); ?>

 
<?php $__env->startComponent('mail::button', ['url' => $content['url']]); ?>
Click Here
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /var/www/html/tarda/2Daw07/laravel/resources/views/mails/testmail.blade.php ENDPATH**/ ?>