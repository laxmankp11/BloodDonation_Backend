<?php echo $__env->make("admin.include.admin_header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="main_content_iner ">
<div class="container-fluid plr_30 body_white_bg pt_30">
<div class="row justify-content-center">
<div class="col-12">
<div class="QA_section">
<div class="white_box_tittle list_header">
<h4>Pages List</h4>
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
<a href="<?php echo e(URL('add_page')); ?>" class="btn_1">Add New Pages</a>
</div>
</div>
</div>
<div class="QA_table ">
<table class="table lms_table_active">
<thead>
<tr>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('title', 'title'));?></th>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('status', 'status'));?></th>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('rights', 'rights'));?></th>

<th scope="col">Status</th>

<th scope="col">Action</th>
</tr>
</thead>
<tbody>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<th scope="row"> <a href="#" class="question_content"><?php echo e($value->title); ?></a></th>
<td><?php echo e($value->status); ?></td>
<td>Rights</td>
<td><a href="#" class="status_btn">Active</a></td>
<td>
	<a href="<?php echo e(URL('edit_page')); ?>/<?php echo e($value->id); ?>" class="btn btn-primary status_btn" style="background: blue;">edit</a>
	<a href="<?php echo e(URL('delete_page')); ?>/<?php echo e($value->id); ?>" id='<?php echo e($value->id); ?>' class="btn btn-info status_btn click-off" style="background:orange;">delete</a>
</td>


</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
<tfoot>
<<<<<<< HEAD
<tr>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('title', 'title'));?></th>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('status', 'status'));?></th>

<th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('rights', 'rights'));?></th>

<th scope="col">Status</th>

<th scope="col">Action</th>
</tr>

<?php if(empty($data)): ?>
<tr><td><?php echo e($data->links()); ?></td></tr>
<?php endif; ?>


=======
<?php if(empty($data)): ?>
<tr><td><?php echo e($data->links()); ?></td></tr>
<?php endif; ?>  
>>>>>>> b8548fb0900967db3fa18e3c9b8abe529241783b
</tfoot>
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

</script><?php /**PATH /var/www/html/BloodDonation_Backend/resources/views/admin/pages/list.blade.php ENDPATH**/ ?>