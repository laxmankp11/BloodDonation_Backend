@inject('provider1', 'App\Http\Controllers\CommonController')

@include("admin.include.admin_header")
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
@if((Auth::user()->type=='admin') || ($provider1::check_list_permission('create',Auth::user()->rights)==true))
<a href="{{URL('add_page')}}" class="btn_1">Add New Pages</a>
@endif
</div>
</div>
</div>
<div class="QA_table ">
<table class="table lms_table_active">
<thead>
<tr>

<th scope="col">@sortablelink('title', 'title')</th>

<th scope="col">@sortablelink('status', 'status')</th>

<th scope="col">Action</th>
</tr>
</thead>
<tbody>
@foreach($data as $value)
<tr>
<th scope="row"> <a href="#" class="question_content">{{$value->title}}</a></th>
<td>@if($value->status==1)
	<a href="#" class="status_btn">Active</a>
	@else
	<a href="#" class="status_btn" style="background:orange">Blocked</a>
	@endif</td>
<td>

	@if((Auth::user()->type=='admin') || ($provider1::check_list_permission('edit',Auth::user()->rights)==true))
	<a href="{{URL('edit_page')}}/{{$value->id}}" class="btn btn-primary status_btn" style="background: blue;">edit</a>
	@endif
    @if((Auth::user()->type=='admin') || ($provider1::check_list_permission('delete',Auth::user()->rights)==true))
	<a href="{{URL('delete_page')}}/{{$value->id}}" id='{{$value->id}}' class="btn btn-info status_btn click-off" style="background:orange;">delete</a>
	@endif
</td>


</tr>
@endforeach

</tbody>
<tfoot>
<tr>

<th scope="col">@sortablelink('title', 'title')</th>

<th scope="col">@sortablelink('status', 'status')</th>

<th scope="col">Action</th>
</tr>

@empty($data)
<tr><td>{{ $data->links() }}</td></tr>
@endempty



</tfoot>
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