@include('admin.include.admin_header')

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
                <form action="{{ route('submit_page') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Title</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Url Route</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('url_route') is-invalid @enderror" id="url_route" name="url_route" value="{{ old('url_route') }}">
                            @if ($errors->has('url_route'))
                                <span class="text-danger">{{ $errors->first('url_route') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}">
                            <option value="1" selected>Active</option>
                            <option value="0">De-active</option>
                        </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
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

@include('admin.include.admin_footer')