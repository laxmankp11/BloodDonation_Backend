<?php echo $__env->make("admin.include.admin_header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="main_content_iner ">
<div class="container-fluid plr_30 body_white_bg pt_30">
<div class="row justify-content-center">
<div class="col-12">
<div class="QA_section">
<div class="white_box_tittle list_header">
<h4>Sub Admin User List</h4>
<div class="box_right d-flex lms_block">
<div class="serach_field_2">
<div class="search_inner">
<form Active="#">
<div class="search_field">
<input type="text" placeholder="Search content here...">
</div>
<button type="submit"> <i class="ti-search"></i> </button>
</form>
</div>
</div>
<div class="add_button ms-2">
<a href="<?php echo e(URL('add_admin_user')); ?>" class="btn_1">Add New Sub Admin</a>
</div>
</div>
</div>
<div class="QA_table ">
<<<<<<< HEAD
<table class="table table">
=======
<table class="table lms_table_active">
>>>>>>> b8548fb0900967db3fa18e3c9b8abe529241783b
<thead>
<tr>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', 'name'));?></th>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', 'email'));?></th>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('rights', 'rights'));?></th>

<th scope="col">Status</th>

<th scope="col">Action</th>
</tr>
</thead>
<<<<<<< HEAD
<?php if(sizeof($data) > 0): ?>
<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td> <a href="#" class="question_content"><?php echo e($value->name); ?></a></td>
<td><?php echo e($value->email); ?></td>
<td>

	<a href="<?php echo e(URL('rights')); ?>/<?php echo e($value->id); ?>" class="btn btn-primary status_btn" style="background:#353571;border: 1px solid greenyellow;">Manage Rights</a>
</td>
<td>
	<?php if($value->status==1): ?>
	<a href="#" class="status_btn">Active</a>
	<?php else: ?>
	<a href="#" class="status_btn" style="background:orange">Blocked</a>
	<?php endif; ?>
</td>

<td>
	<a href="<?php echo e(URL('edit_admin_user')); ?>/<?php echo e($value->id); ?>" class="btn btn-primary status_btn" style="background: blue;">edit</a>
	<a href="<?php echo e(URL('delete_admin_user')); ?>/<?php echo e($value->id); ?>" id='<?php echo e($value->id); ?>' class="btn btn-info status_btn click-off" style="background:orange;">delete</a>
</td>


</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<<<<<<< HEAD
<?php endif; ?>
</tbody>

<tfoot>
<tr>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', 'name'));?></th>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', 'email'));?></th>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('rights', 'rights'));?></th>

<th scope="col">Status</th>

<th scope="col">Action</th>
</tr>
</tfoot>
<?php if(sizeof($data) > 0): ?>
<tr><td><?php echo e($data->links()); ?></td></tr>
<?php endif; ?>
=======

</tbody>
<tfoot>
<tr><td><?php echo e($data->links()); ?></td></tr>
</tfoot>
>>>>>>> b8548fb0900967db3fa18e3c9b8abe529241783b
</table>
</div>
</div>
</div>
</div>
</div>
</div>

<?php echo $__env->make("admin.include.admin_footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style type="text/css">
	.dataTables_info,.dataTables_paginate{
		display: none;
	}
</style>
<script type="text/javascript">
	
	$('.click-off').click(function () {
    // escape here if the confirm is false;
    if (!confirm('Are you sure?')) return false;
    var id = $(this).attr("id");
    var btn = this;
    setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);
    return true;
});

</script><?php /**PATH /var/www/html/BloodDonation_Backend/resources/views/admin/admin_userlist.blade.php ENDPATH**/ ?>