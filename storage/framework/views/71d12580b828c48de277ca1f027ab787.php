<?php echo $__env->make('admin.include.admin_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main_content_iner ">
<div class="container-fluid plr_30 body_white_bg pt_30">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="single_element">
<div class="quick_activity">
<div class="row">
<div class="col-12">
            <div class="card-header">Add New Page</div>
            <div class="card-body">
                <form action="<?php echo e(route('submit_page')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Title</label>
                          <input type="text" class="exampleFormControlInput1 form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title" name="title" value="<?php echo e(old('title')); ?>">
                            <?php if($errors->has('title')): ?>
                                <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                            <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Url Route</label>
                          <input type="text" class="exampleFormControlInput1 form-control <?php $__errorArgs = ['url_route'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="url_route" name="url_route" value="<?php echo e(old('url_route')); ?>">
                            <?php if($errors->has('url_route')): ?>
                                <span class="text-danger"><?php echo e($errors->first('url_route')); ?></span>
                            <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Status</label>
                        <select name="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status" value="<?php echo e(old('status')); ?>">
                            <option value="1" selected>Active</option>
                            <option value="0">De-active</option>
                        </select>
                            <?php if($errors->has('status')): ?>
                                <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                            <?php endif; ?>
                        </div>
                    
                   
                    <div class="mb-3">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Submit">
                    </div>
                    
                </form>
          
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php echo $__env->make('admin.include.admin_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/BloodDonation_Backend/resources/views/admin/pages/add_page.blade.php ENDPATH**/ ?>