@inject('provider1', 'App\Http\Controllers\CommonController')

@include("admin.include.admin_header")
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
@if((Auth::user()->type=='admin') || ($provider1::check_list_permission('create',Auth::user()->rights)==true))
<a href="{{URL('add_admin_user')}}" class="btn_1">Add New Sub Admin</a>
@endif
</div>
</div>
</div>
<div class="QA_table ">

<table class="table lms_table_active">
<thead>
<tr>

<th scope="col">@sortablelink('name', 'name')</th>

<th scope="col">@sortablelink('email', 'email')</th>

<th scope="col">@sortablelink('rights', 'rights')</th>

@if(Auth::user()->type=='admin')
<th>Added By</th>
@endif

<th scope="col">Status</th>

<th scope="col">Action</th>
</tr>
</thead>
@if(sizeof($data) > 0)


<tbody>
@foreach($data as $value)

@if((Auth::user()->email != $value->email))
	<tr>
	<th scope="row"> <a href="#" class="question_content">{{$value->name}}</a></th>
	<td>{{$value->email}}</td>
	<td>

	<a href="{{URL('rights')}}/{{$value->id}}" class="btn btn-primary status_btn" style="background:#353571;border: 1px solid greenyellow;">Manage Rights</a>
</td>
@if(Auth::user()->type=='admin')
<td>{{$provider1::added_by($value->created_by_email)}}</td>
@endif
<td>
	@if($value->status==1)
	<a href="#" class="status_btn">Active</a>
	@else
	<a href="#" class="status_btn" style="background:orange">Blocked</a>
	@endif
</td>
	<td>
		@if((Auth::user()->type=='admin') || ($provider1::check_list_permission('edit',Auth::user()->rights)==true))
		<a href="{{URL('edit_admin_user')}}/{{$value->id}}" class="btn btn-primary status_btn" style="background: blue;">edit</a>
		@endif
		@if((Auth::user()->type=='admin') || ($provider1::check_list_permission('delete',Auth::user()->rights)==true))
		<a href="{{URL('delete_admin_user')}}/{{$value->id}}" id='{{$value->id}}' class="btn btn-info status_btn click-off" style="background:orange;">delete</a>
		@endif
	</td>


	</tr>
	@endif
@endforeach
</tbody>
@endif

<tfoot>
<tr>

<th scope="col">@sortablelink('name', 'name')</th>

<th scope="col">@sortablelink('email', 'email')</th>

<th scope="col">@sortablelink('rights', 'rights')</th>

<th scope="col">Status</th>

<th scope="col">Action</th>
</tr>
</tfoot>
@if(sizeof($data) > 0)
<tr><td>{{ $data->links() }}</td></tr>
@endif

</table>
</div>
</div>
</div>
</div>
</div>
</div>

@include("admin.include.admin_footer")

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

</script>