 
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Files')); ?></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <td><a  class="btn btn-primary" href="<?php echo e(url("create")); ?>">Crear file </a></td>
                                <tr>
                                    <td scope="col">ID</td>
                                    <td scope="col">Filepath</td>
                                    <td scope="col">Filesize</td>
                                    <td scope="col">Created</td>
                                    <td scope="col">Updated</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                
                                    <td><?php echo e($file->id); ?></td>
                                    <td><?php echo e($file->filepath); ?></td>
                                    <td><?php echo e($file->filesize); ?></td>
                                    <td><?php echo e($file->created_at); ?></td>
                                    <td><?php echo e($file->updated_at); ?></td>
                                
                                    <td><a class="btn btn-warning"  href="<?php echo e(route("files.edit", $file)); ?>">edit </a></td>

                                    <td> <form action="<?php echo e(route('files.destroy',$file)); ?>" method="POST">   
                                        
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>      
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        
                                        </form></td>
                                    
                                    <td>
                                        
                                    </td>
                                    
                                
                                </tr>
                            
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
               </div>
           </div>
       </div>
   </div>
</div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tarda/Escriptori/Daw2/M7/2Daw07/laravel/resources/views/files/index.blade.php ENDPATH**/ ?>