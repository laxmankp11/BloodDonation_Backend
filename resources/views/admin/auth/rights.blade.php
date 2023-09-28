@include('admin.include.admin_header')

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
                    @csrf
                    
                    <!-- <div class="mb-3">
                        <label for="name" class="form-label"><h3><b>Pages</b></h3></label><br>
                        
                         
                        
                        <table class="mytbl">
                             @foreach($data["pages"] as $dt)
                         <label class="checkbox-inline @error('rights') is-invalid @enderror" id="rights" name="rights" value="{{ old('rights') }}">                            
                        <div class="rights_div">
                        <input type="checkbox" id="page_id" value="{{$dt->id}}" name="rights[]">{{$dt->title}}
                         <input type="checkbox" value="view" name="view" id="view">View
                         <input type="checkbox" value="add" name="add" id="add">Add
                         <input type="checkbox" value="edit" name="edit" id="edit">Edit
                         <input type="checkbox" value="delete" name="delete" id="delete">Delete
                        </div>
                        </label><br><br>
                        @endforeach
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
                 @foreach($data["pages"] as $dt)
                <tr>
                  <th scope="row">{{$dt->title}}</th>
                  <td><input type="checkbox" class="select-permission select-all-module-permissions select-all-client-permissions" id="select_all" data-class="select-all-client-permissions"> Select All</td>

                  <td><input type="checkbox" class="check select-permission select-module-permission select-client-permission" data-class="select-client-permission" value="create_{{$dt->id}}" id="create_{{$dt->id}}" name="rights[]"> Create {{$dt->title}} </td>

                 <td><input type="checkbox" class="check select-permission select-module-permission select-client-permission" data-class="select-client-permission" value="edit_{{$dt->id}}" id="edit_{{$dt->id}}" name="rights[]"> Edit {{$dt->title}}</td>

                 <td><input type="checkbox" class="check select-permission select-module-permission select-client-permission" data-class="select-client-permission" value="delete_{{$dt->id}}" id="delete_{{$dt->id}}" name="rights[]"> Delete {{$dt->title}}</td>

                 <td><input type="checkbox" class="check select-permission select-module-permission select-client-permission" data-class="select-client-permission" value="view_{{$dt->id}}" id="view_{{$dt->id}}" name="rights[]"> View {{$dt->title}}</td>
                </tr>
                @endforeach
                @if ($errors->has('rights'))
                                <span class="text-danger">{{ $errors->first('rights') }}</span>
                            @endif
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



@include('admin.include.admin_footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">

    $(".select-all-client-permissions").on("change",function(){
   if($(this).is(":checked")) 
   $(this).closest("tr").find(".check").prop('checked',true);
   else
    $(this).closest("tr").find(".check").prop('checked',false);

});
</script>