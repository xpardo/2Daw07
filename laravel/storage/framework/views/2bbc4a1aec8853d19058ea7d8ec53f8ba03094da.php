  
<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__(' Create Files')); ?></div>
                    <div class="card-body">
                        <div class="row">
                           
                        </div>
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <img class="img-fluid" src="<?php echo e(asset("storage/{$file->filepath}")); ?>" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>created_at:</strong>
                                    <?php echo e($file->created_at); ?>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>updated_at:</strong>
                                    <?php echo e($file->updated_at); ?>

                                </div>
                            </div>

                            <div class="col-lg-12 margin-tb">
                                
                            </div>
                                <form action="<?php echo e(route('files.destroy',$file)); ?>" method="POST">   
                                                        
                                    <?php echo csrf_field(); ?>
                                  
                                    <a class="btn btn-warning"  href="<?php echo e(route("files.edit", $file)); ?>">edit </a>
                                    <a class="btn btn-primary" href="<?php echo e(route('files.index')); ?>">Back</a>
                                    
                                    <?php echo method_field('DELETE'); ?>      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                          
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tarda/Escriptori/Daw2/M7/2Daw07/laravel/resources/views/files/show.blade.php ENDPATH**/ ?>