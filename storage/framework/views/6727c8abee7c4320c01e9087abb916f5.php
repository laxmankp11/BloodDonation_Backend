<?php echo $__env->make('admin.include.admin_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main_content_iner ">
<div class="container-fluid plr_30 body_white_bg pt_30">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="single_element">
<div class="quick_activity">
<div class="row">
<div class="col-12">
            <div class="card-header">Manage Sub Admin User Rights</div>
            <div class="card-body">
                <form method="post">
                    <?php echo csrf_field(); ?>
                    
                    <!-- <div class="mb-3">
                        <label for="name" class="form-label"><h3><b>Pages</b></h3></label><br>
                        
                         
                        
                        <table class="mytbl">
                             <?php $__currentLoopData = $data["pages"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <label class="checkbox-inline <?php $__errorArgs = ['rights'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="rights" name="rights" value="<?php echo e(old('rights')); ?>">                            
                        <div class="rights_div">
                        <input type="checkbox" id="page_id" value="<?php echo e($dt->id); ?>" name="rights[]"><?php echo e($dt->title); ?>

                         <input type="checkbox" value="view" name="view" id="view">View
                         <input type="checkbox" value="add" name="add" id="add">Add
                         <input type="checkbox" value="edit" name="edit" id="edit">Edit
                         <input type="checkbox" value="delete" name="delete" id="delete">Delete
                        </div>
                        </label><br><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>

                            
                        </div> -->

                        <div class="container mt-5">

            

            <h3>Assign Permissions</h3>
            <table class="table table-striped" id="permissions-table">
              <thead>
                <tr>
                  <th scope="col">Module</th>
                  <th scope="col"><input type="checkbox" class="select-all-permissions"> Select All</th>
                  <th scope="col" colspan="4">Available Permissions</th>
                </tr>
              </thead>
              <tbody>
                 <?php $__currentLoopData = $data["pages"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th scope="row"><?php echo e($dt->title); ?></th>
                  <td><input type="checkbox" class="select-permission select-all-module-permissions select-all-client-permissions" id="select_all" data-class="select-all-client-permissions"> Select All</td>

                  <td><input type="checkbox" class="check select-permission select-module-permission select-client-permission" data-class="select-client-permission" value="create_<?php echo e($dt->id); ?>" id="create_<?php echo e($dt->id); ?>" name="rights[]"> Create <?php echo e($dt->title); ?> </td>

                 <td><input type="checkbox" class="check select-permission select-module-permission select-client-permission" data-class="select-client-permission" value="edit_<?php echo e($dt->id); ?>" id="edit_<?php echo e($dt->id); ?>" name="rights[]"> Edit <?php echo e($dt->title); ?></td>

                 <td><input type="checkbox" class="check select-permission select-module-permission select-client-permission" data-class="select-client-permission" value="delete_<?php echo e($dt->id); ?>" id="delete_<?php echo e($dt->id); ?>" name="rights[]"> Delete <?php echo e($dt->title); ?></td>

                 <td><input type="checkbox" class="check select-permission select-module-permission select-client-permission" data-class="select-client-permission" value="view_<?php echo e($dt->id); ?>" id="view_<?php echo e($dt->id); ?>" name="rights[]"> View <?php echo e($dt->title); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($errors->has('rights')): ?>
                                <span class="text-danger"><?php echo e($errors->first('rights')); ?></span>
                            <?php endif; ?>
                <!-- <tr>
                  <th scope="row">Blogs</th>
                  <td><input type="checkbox" class="select-permission select-all-module-permissions select-all-blogs-permissions" data-class="select-all-blogs-permissions"> Select All</td>
                  <td><input type="checkbox" class="select-permission select-module-permission select-blogs-permission" data-class="select-blogs-permission"> Create Blog <input type="checkbox" class="select-permission select-module-permission select-blogs-permission" data-class="select-blogs-permission"> Edit Blog</td>
                </tr>
                <tr>
                  <th scope="row">Users</th>
                  <td><input type="checkbox" class="select-permission select-all-module-permissions select-all-users-permissions" data-class="select-all-users-permissions"> Select All</td>
                  <td><input type="checkbox" class="select-permission select-module-permission select-users-permission" data-class="select-users-permission"> Create User <input type="checkbox" class="select-permission select-module-permission select-users-permission" data-class="select-users-permission"> Edit User</td>
                </tr> -->
              </tbody>
            </table>

        </div>
                    
                    
                    <div class="mb-3">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" id="submit_btn" value="Submit">
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



<?php echo $__env->make('admin.include.admin_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">

    $(".select-all-client-permissions").on("change",function(){
   if($(this).is(":checked")) 
   $(this).closest("tr").find(".check").prop('checked',true);
   else
    $(this).closest("tr").find(".check").prop('checked',false);

});
</script><?php /**PATH /var/www/html/BloodDonation_Backend/resources/views/admin/auth/rights.blade.php ENDPATH**/ ?>