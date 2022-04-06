  
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update Files</h2>
        </div>
    </div>
</div>


<form action="<?php echo e(route('files.update', $file)); ?>" method="POST" enctype="multipart/form-data">

    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
  
     
    <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="upload">File:</label>
                <input type="file" name="upload" class="form-control">
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>update_at:</strong>
                <input type="date"   id="update_at" name="update_at" class="form-control" value="<?php echo e($file->created_at); ?>"><br><br>
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="<?php echo e(route('files.index')); ?>">Back</a>
            
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </div>

   
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tarda/Escriptori/Daw2/M7/2Daw07/laravel/resources/views/files/edit.blade.php ENDPATH**/ ?>