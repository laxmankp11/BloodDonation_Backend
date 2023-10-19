@inject('provider1', 'App\Http\Controllers\CommonController')

@include("admin.include.admin_header")
<div class="main_content_iner ">
<div class="container-fluid plr_30 body_white_bg pt_30">
<div class="row justify-content-center">
<div class="col-12">
<div class="QA_section">
<div class="white_box_tittle list_header">
<h4>Web Users List</h4>
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
<a href="{{URL('add_web_users')}}" class="btn_1">Add New Donor</a>
@endif
</div>
</div>
</div>
<div class="QA_table ">

<table class="table lms_table_active" style="overflow: scroll;width: 300%;">
<thead>
<tr>

<th scope="col">Action</th>

<th scope="col">@sortablelink('name', 'name')</th>

<th scope="col">@sortablelink('patient_name', 'patient_name')</th>

<th scope="col">@sortablelink('email', 'email')</th>

<th scope="col">@sortablelink('phone_no', 'phone_no')</th>

<th scope="col">@sortablelink('blood_type', 'blood_type')</th>

<th scope="col">@sortablelink('	address', '	address')</th>

<th scope="col">@sortablelink('city', 'city')</th>

<th scope="col">@sortablelink('state', 'state')</th>

<th scope="col">@sortablelink('country', 'country')</th>

<th scope="col">@sortablelink('profile_status', 'profile_status')</th>

<th scope="col">@sortablelink('status', 'status')</th>

@if(Auth::user()->type=='admin')
<th>Added By</th>
@endif


</tr>
</thead>

@if(sizeof($data) > 0)


<tbody>
@foreach($data as $value)

	<tr>

	<td>
		@if((Auth::user()->type=='admin') || ($provider1::check_list_permission('edit',Auth::user()->rights)==true))
		<a href="{{URL('edit_web_users')}}/{{$value->id}}" class="status_btn" style="background: blue;min-width: 35px;"><span class="fa fa-edit"></span></a>
		@endif
		@if((Auth::user()->type=='admin') || ($provider1::check_list_permission('delete',Auth::user()->rights)==true))
		<a href="{{URL('delete_web_users')}}/{{$value->id}}" id='{{$value->id}}' class="status_btn click-off" style="background:orange;min-width: 35px;"><span class="fa fa-trash"></span></a>
		@endif
	</td>

	<th scope="row"> <a href="#">{{$value->name}}</a></th>

	<th scope="row"> <a href="#">{{$value->patient_name}}</a></th>
	
	<td>{{$value->email}}</td>

	<td>{{$value->phone_no}}</td>

	<td>{{$value->blood_type}}</td>

	<td>{{$value->address}}</td>

	<td>{{$provider1::get_city($value->city)}}</td>

	<td>{{$provider1::get_state($value->state)}}</td>

	<td>{{$provider1::get_country($value->country)}}</td>

	<td>@if($value->profile_status==1)
	<a href="#" class="status_btn">Active</a>
	@else
	<a href="#" class="status_btn" style="background:orange">Hidden</a>
	@endif</td>

	<td>
	@if($value->status==1)
	<a href="#" class="status_btn">Active</a>
	@else
	<a href="#" class="status_btn" style="background:orange">Blocked</a>
	@endif
</td>

@if(Auth::user()->type=='admin')
<td>{{$provider1::added_by($value->created_by_email)}}</td>
@endif

	
	</tr>
@endforeach
</tbody>
@endif

<tfoot>
<tr>

<th scope="col">Action</th>

<th scope="col">@sortablelink('name', 'name')</th>

<th scope="col">@sortablelink('patient_name', 'patient_name')</th>

<th scope="col">@sortablelink('email', 'email')</th>

<th scope="col">@sortablelink('phone_no', 'phone_no')</th>

<th scope="col">@sortablelink('blood_type', 'blood_type')</th>

<th scope="col">@sortablelink('	address', '	address')</th>

<th scope="col">@sortablelink('city', 'city')</th>

<th scope="col">@sortablelink('state', 'state')</th>

<th scope="col">@sortablelink('country', 'country')</th>

<th scope="col">@sortablelink('profile_status', 'profile_status')</th>

<th scope="col">@sortablelink('status', 'status')</th>

@if(Auth::user()->type=='admin')
<th>Added By</th>
@endif

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
<style type="text/css">

	td{
		max-width: 100px !important;
	}
</style>