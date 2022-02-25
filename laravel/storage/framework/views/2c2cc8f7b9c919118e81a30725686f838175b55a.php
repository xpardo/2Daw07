<div id="flash">
<?php if($message = Session::get('success')): ?>
   <?php echo $__env->make('flash-message', ['type' => "success", 'message' => $message], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
 
<?php if($message = Session::get('error')): ?>
   <?php echo $__env->make('flash-message', ['type' => "error", 'message' => $message], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
 
<?php if($message = Session::get('warning')): ?>
   <?php echo $__env->make('flash-message', ['type' => "warning", 'message' => $message], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
 
<?php if($message = Session::get('info')): ?>
   <?php echo $__env->make('flash-message', ['type' => "info", 'message' => $message], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
 
<?php if($errors->any()): ?>
   <?php echo $__env->make('flash-message', ['type' => "error", 'message' => "Check errors!"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
</div><?php /**PATH /home/tarda/Escriptori/Daw2/M7/2Daw07/laravel/resources/views/flash.blade.php ENDPATH**/ ?>