@inject('provider1', 'App\Http\Controllers\CommonController')
@include('admin.include.admin_header')

<div class="main_content_iner ">
<div class="container-fluid plr_30 body_white_bg pt_30">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="single_element">
<div class="quick_activity">
<div class="row">
<div class="col-12">
            <div class="card-header">Add Hospital</div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Hospital Name</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $hospitals[0]->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="hospital_type" class="form-label">Hospital Type</label>
                           <select  id="hospital_type" class="exampleFormControlInput1 form-control @error('hospital_type') is-invalid @enderror" name='hospital_type' value="{{old('hospital_type')}}">
                            <option value="">Select Hospital Type</option>
                            <option value="Public">Public</option>
                            <option value="Private">Private</option>
                            <option value="Clinic">Clinic</option>
                        </select>
                            @if ($errors->has('hospital_type'))
                                <span class="text-danger">{{ $errors->first('hospital_type') }}</span>
                            @endif
                    </div>


                    <div class="mb-3">
                        <label for="name" class="form-label">Hospital Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $hospitals[0]->email }}">
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
                          <input type="text" class="exampleFormControlInput1 form-control @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" value="{{ $hospitals[0]->phone_no }}">
                            @if ($errors->has('phone_no'))
                                <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                            @endif
                    </div>


                   <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ $hospitals[0]->website }}">
                            @if ($errors->has('website'))
                                <span class="text-danger">{{ $errors->first('website') }}</span>
                            @endif
                    </div>


                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                          <textarea rows="4" class="exampleFormControlInput1 form-control @error('address') is-invalid @enderror" id="address" name="address">{{ $hospitals[0]->address }}</textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="hospital_partners_reason" class="form-label">Why does your hospital want to partner with our blood donation application?</label>
                          <textarea rows="4" class="exampleFormControlInput1 form-control @error('hospital_partners_reason') is-invalid @enderror" id="hospital_partners_reason" name="hospital_partners_reason">{{ $hospitals[0]->hospital_partners_reason }}</textarea>
                            @if ($errors->has('hospital_partners_reason'))
                                <span class="text-danger">{{ $errors->first('hospital_partners_reason') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="requirement_from_partenrship" class="form-label">Any specific requirements or expectations from the partnership? [Brief Explanation]</label>
                          <textarea rows="4" class="exampleFormControlInput1 form-control @error('requirement_from_partenrship') is-invalid @enderror" id="requirement_from_partenrship" name="requirement_from_partenrship" value="{{ old('requirement_from_partenrship') }}">{{ $hospitals[0]->requirement_from_partenrship }}</textarea>
                            @if ($errors->has('requirement_from_partenrship'))
                                <span class="text-danger">{{ $errors->first('requirement_from_partenrship') }}</span>
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
                             <option value="{{$provider1::get_state_id($hospitals[0]->state)}}">{{$provider1::get_state($hospitals[0]->state)}}</option>
                        </select>

                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            @endif
                    </div>


                <div class="mb-3">
                        <label for="name" class="form-label">city</label>
                          

                          <select  id="city-dd" class="exampleFormControlInput1 form-control @error('city') is-invalid @enderror" name='city' value="{{old('city')}}">
                                <option value="{{$provider1::get_city_id($hospitals[0]->city)}}">{{$provider1::get_city($hospitals[0]->city)}}</option>
                            </select>

                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="zipcode" class="form-label">Zipcode</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('zipcode') is-invalid @enderror" id="zipcode" name="zipcode" value="{{ $hospitals[0]->zipcode }}">
                            @if ($errors->has('zipcode'))
                                <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="contact_person_name" class="form-label">Contact Person Name</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('contact_person_name') is-invalid @enderror" id="contact_person_name" name="contact_person_name" value="{{ $hospitals[0]->contact_person_name }}">
                            @if ($errors->has('contact_person_name'))
                                <span class="text-danger">{{ $errors->first('contact_person_name') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        <label for="contact_person_phone_no" class="form-label">Phone No</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('contact_person_phone_no') is-invalid @enderror" id="contact_person_phone_no" name="contact_person_phone_no" value="{{ $hospitals[0]->contact_person_phone_no }}">
                            @if ($errors->has('contact_person_phone_no'))
                                <span class="text-danger">{{ $errors->first('contact_person_phone_no') }}</span>
                            @endif
                    </div>
                     

                    <div class="mb-3">
                        <label for="name" class="form-label">Contact Person Email Address</label>
                        <input type="email" class="form-control @error('contact_person_email') is-invalid @enderror" id="contact_person_email" name="contact_person_email" value="{{ $hospitals[0]->contact_person_email }}">
                            @if ($errors->has('contact_person_email'))
                                <span class="text-danger">{{ $errors->first('contact_person_email') }}</span>
                            @endif
                        </div>

                     
                    <div class="mb-3">
                        <label for="contact_person_position" class="form-label">Contact Person Name</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('contact_person_position') is-invalid @enderror" id="contact_person_position" name="contact_person_position" value="{{ $hospitals[0]->contact_person_position }}">
                            @if ($errors->has('contact_person_position'))
                                <span class="text-danger">{{ $errors->first('contact_person_position') }}</span>
                            @endif
                    </div> 

                     <div class="mb-3">
                        <label for="is_blood_bank" class="form-label">Does the hospital have a blood bank?</label>
                           <select  id="is_blood_bank" class="exampleFormControlInput1 form-control @error('is_blood_bank') is-invalid @enderror" name='is_blood_bank' value="{{old('is_blood_bank')}}">
                            <option value="yes" selected>Yes</option>
                            <option value="no">No</option>
                        </select>
                            @if ($errors->has('is_blood_bank'))
                                <span class="text-danger">{{ $errors->first('is_blood_bank') }}</span>
                            @endif
                    </div>                    

                     <div class="mb-3">
                        <label for="license_no" class="form-label">Contact Person Licence No</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('license_no') is-invalid @enderror" id="license_no" name="license_no" value="{{ $hospitals[0]->license_no }}">
                            @if ($errors->has('license_no'))
                                <span class="text-danger">{{ $errors->first('license_no') }}</span>
                            @endif
                    </div>

                     <div class="mb-3">
                        <label for="blood_donation_units_monthly" class="form-label">Number of Blood Donation Units Collected Monthly: [Average Monthly Units]</label>
                          <input type="text" class="exampleFormControlInput1 form-control @error('blood_donation_units_monthly') is-invalid @enderror" id="blood_donation_units_monthly" name="blood_donation_units_monthly" value="{{ $hospitals[0]->blood_donation_units_monthly }}">
                            @if ($errors->has('blood_donation_units_monthly'))
                                <span class="text-danger">{{ $errors->first('blood_donation_units_monthly') }}</span>
                            @endif
                    </div>  


 <div class="mb-3">
                        
                          <input type="checkbox" name="terms_agreement" class="select-permission select-all-module-permissions select-all-client-permissions" id="select_all" data-class="select-all-client-permissions" value="1" required checked> I agree to comply with all applicable laws and regulations regarding blood donation.
                            @if ($errors->has('terms_agreement'))
                                <span class="text-danger">{{ $errors->first('terms_agreement') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        
                          <input type="checkbox" name="share_info_via_app" class="select-permission select-all-module-permissions select-all-client-permissions" id="select_all" data-class="select-all-client-permissions" value="1" required checked> I understand that our hospital's information will be shared with potential blood hospitalss via the application.
                            @if ($errors->has('share_info_via_app'))
                                <span class="text-danger">{{ $errors->first('share_info_via_app') }}</span>
                            @endif
                    </div>

                    <div class="mb-3">
                        
                          <input type="checkbox" name="cooperate_agree" class="select-permission select-all-module-permissions select-all-client-permissions" id="select_all" data-class="select-all-client-permissions" value="1" required checked>I agree to cooperate with the blood donation application team for the successful implementation of this partnership.
                            @if ($errors->has('cooperate_agree'))
                                <span class="text-danger">{{ $errors->first('cooperate_agree') }}</span>
                            @endif
                    </div>

                     <div class="mb-3">
                        <label for="signature" class="form-label">Signature</label>
                          <input type="file" class="exampleFormControlInput1 form-control @error('signature') is-invalid @enderror" id="signature" name="signature" value="{{ old('signature') }}">
                            @if ($errors->has('signature'))
                                <span class="text-danger">{{ $errors->first('signature') }}</span>
                            @endif
                    </div>  

                    <input type="hidden" name="signature_text" value="{{$hospitals[0]->signature}}">
                     <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                           <select  id="status" class="exampleFormControlInput1 form-control @error('status') is-invalid @enderror" name='status' value="{{old('status')}}">
                            <option value="">Select Status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">De-active</option>
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

        $('#status option[value={{ $hospitals[0]->status }}]').attr('selected','selected');
        $('#country-dd option[value={{ $hospitals[0]->country }}]').attr('selected','selected');
        $('#state-dd option[value={{ $hospitals[0]->state }}]').attr('selected','selected');
        $('#city-dd option[value={{ $hospitals[0]->city }}]').attr('selected','selected');
        $('#hospital_type option[value="{{ $hospitals[0]->hospital_type }}"]').attr('selected','selected');
    </script>

@include('admin.include.admin_footer')
