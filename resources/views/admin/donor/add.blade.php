@include('admin.include.admin_header')

<div class="main_content_iner ">
<div class="container-fluid plr_30 body_white_bg pt_30">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="single_element">
<div class="quick_activity">
<div class="row">
<div class="col-12">
            <div class="card-header">Add Donor</div>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                    </div>

                     <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Password</label>                        
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="phone_no" class="form-label">Phone No</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" value="{{ old('phone_no') }}">
                            @if ($errors->has('phone_no'))
                                <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                            @endif
                    </div>

                     <div class="mb-3">
                        <label for="landline_no" class="form-label">Landline No</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('landline_no') is-invalid @enderror" id="landline_no" name="landline_no" value="{{ old('landline_no') }}">
                            @if ($errors->has('landline_no'))
                                <span class="text-danger">{{ $errors->first('landline_no') }}</span>
                            @endif
                    </div>


                    <div class="mb-3">
                        <label for="profile_pic" class="form-label">Profile Pic</label>
                          <input type="file" class="exampleFormControlInput1 form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" name="profile_pic" value="{{ old('profile_pic') }}">
                            @if ($errors->has('profile_pic'))
                                <span class="text-danger">{{ $errors->first('profile_pic') }}</span>
                            @endif
                    </div>                   


                    <div class="mb-3">
                        <label for="blood_type" class="form-label">Blood Type</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('blood_type') is-invalid @enderror" id="blood_type" name="blood_type" value="{{ old('blood_type') }}">
                            @if ($errors->has('blood_type'))
                                <span class="text-danger">{{ $errors->first('blood_type') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                          <textarea rows="4" class="exampleFormControlInput1 form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}"></textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Country</label>
                          

                          <select  id="country-dd" class="exampleFormControlInput1 form-control @error('country') is-invalid @enderror" name='country' value="{{old('country')}}">
                            <option value="">Select Country</option>
                            @foreach ($countries as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>

                            @if ($errors->has('country'))
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            @endif
                    </div>


                 <div class="mb-3">
                        <label for="name" class="form-label">state</label>
                          

                          <select  id="state-dd" class="exampleFormControlInput1 form-control @error('state') is-invalid @enderror" name='state' value="{{old('state')}}">
                            <option value="">Select state</option>
                        </select>

                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            @endif
                    </div>


                <div class="mb-3">
                        <label for="name" class="form-label">city</label>
                          

                          <select  id="city-dd" class="exampleFormControlInput1 form-control @error('city') is-invalid @enderror" name='city' value="{{old('city')}}">
                            <option value="">Select city</option>
                        </select>

                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                    </div>
 
                    

                    <div class="mb-3">
                        <label for="profile_status" class="form-label">Profile Status</label>
                           <select  id="profile_status" class="exampleFormControlInput1 form-control @error('profile_status') is-invalid @enderror" name='profile_status' value="{{old('profile_status')}}">
                            <option value="">Select Profile Status</option>
                            <option value="1" selected>Visible</option>
                            <option value="0">Hidden</option>
                        </select>
                            @if ($errors->has('profile_status'))
                                <span class="text-danger">{{ $errors->first('profile_status') }}</span>
                            @endif
                    </div>
                    

                    <div class="mb-3">
                        <label for="is_available_to_donate" class="form-label">Is Available To Donate</label>
                           <select  id="is_available_to_donate" class="exampleFormControlInput1 form-control @error('is_available_to_donate') is-invalid @enderror" name='is_available_to_donate' value="{{old('is_available_to_donate')}}">
                            <option value="">Select Is Available To Donate</option>
                            <option value="1" selected>Visible</option>
                            <option value="0">Hidden</option>
                        </select>
                            @if ($errors->has('is_available_to_donate'))
                                <span class="text-danger">{{ $errors->first('is_available_to_donate') }}</span>
                            @endif
                    </div>


                    <div class="mb-3">
                        <label for="is_visible_contact_detail" class="form-label">Is Visible Contact Detail</label>
                           <select  id="is_visible_contact_detail" class="exampleFormControlInput1 form-control @error('is_visible_contact_detail') is-invalid @enderror" name='is_visible_contact_detail' value="{{old('is_visible_contact_detail')}}">
                            <option value="">Select Is Visible Contact Detail</option>
                            <option value="1" selected>Visible</option>
                            <option value="0">Hidden</option>
                        </select>
                            @if ($errors->has('is_visible_contact_detail'))
                                <span class="text-danger">{{ $errors->first('is_visible_contact_detail') }}</span>
                            @endif
                    </div>


                     <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                           <select  id="status" class="exampleFormControlInput1 form-control @error('status') is-invalid @enderror" name='status' value="{{old('status')}}">
                            <option value="">Select Status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">In-active</option>
                        </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                    </div>









                   
                    <div class="mb-3">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="submit">
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

@include('admin.include.admin_footer')