<div class="row">

    <div class="col-md-2">
        <label for="no_bldg">No./Bldg</label>
        <input type="text" class="form-control" id="no_bldg" name="no_bldg" value="{{ $crew->no_bldg }}">
    </div>
    <div class="col-md-5">
        <label for="street_barangay">Street/Barangay</label>
        <input type="text" class="form-control" id="street_barangay" name="street_barangay" value="{{ $crew->street_barangay }}">
    </div>
    <div class="col-md-5">
        <label for="municipality_city">Municipality/City</label>
        <input type="text" class="form-control" id="municipality_city" name="municipality_city" value="{{ $crew->municipality_city }}">
    </div>
    <div class="col-md-3">
        <label for="province">Province</label>
        <input type="text" class="form-control" id="province" name="province" value="{{ $crew->province }}">
    </div>
    <div class="col-md-2">
        <label for="zip_code">Zip Code</label>
        <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ $crew->zip_code }}">
    </div>
    <div class="col-md-3">
        <label for="mobile_no">Mobile No.</label>
        <input type="text" class="form-control xs" id="mobile_no" name="mobile_no" value="{{ $crew->mobile_no }}">
    </div>
    <div class="col-md-4">
        <label for="country_id">Country</label>
        <select id='country_id' name='country_id' class="form-control select2">
            <option value='0'>Select Country</option>
            @foreach($country['data'] as $country)
            <option value="{{$country->id}}"
                @if ($crew->country_id == $country->id)
                  {{'selected="selected"'}}
                @endif
                >{{ $country->country }} </option>
            @endforeach
          </select>
    </div>
    <div class="col-md-2">
        <label for="birth_date">Date of Birth</label>
        <input type="text" class="form-control date" id="birth_date" name="birth_date" value="{{ $crew->birth_date ? date('d-M-Y', strtotime($crew->birth_date))  : '' }}">
    </div>

    <div class="col-md-7">
        <label for="birth_place">Place of Birth</label>
        <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{ $crew->birth_place }}">
    </div>

    <div class="col-md-3">
        <label for="gender">Gender</label>
        <select id='gender' name='gender' class="form-control select2">
            <option value='0'>Select Gender</option>
            <option value="Male"
                @if ($crew->gender == 'Male')
                  {{'selected="selected"'}}
                @endif
                >Male</option>
            <option value="Female"
                @if ($crew->gender == 'Female')
                  {{'selected="selected"'}}
                @endif
                >Female</option>

          </select>
    </div>
    <div class="col-md-3">
        <label for="civil_status">Civil Status</label>
        <select id='civil_status' name='civil_status' class="form-control select2">
            <option value='0'>Select Civil Status</option>
            <option value="Single"
                @if ($crew->civil_status == 'Single')
                  {{'selected="selected"'}}
                @endif
                >Single</option>
            <option value="Married"
                @if ($crew->civil_status == 'Married')
                  {{'selected="selected"'}}
                @endif
                >Married</option>
            <option value="Widowed"
                @if ($crew->civil_status == 'Widowed')
                  {{'selected="selected"'}}
                @endif
                >Widowed</option>
            <option value="Separated"
                @if ($crew->civil_status == 'Separated')
                  {{'selected="selected"'}}
                @endif
                >Separated</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="height">Height</label>
        <input type="text" class="form-control" id="height" name="height" value="{{ $crew->height }}">
    </div>
    <div class="col-md-2">
        <label for="weight">Weight</label>
        <input type="text" class="form-control" id="weight" name="weight" value="{{ $crew->weight }}">
    </div>
    <div class="col-md-3">
        <label for="blood_type">Blood Type</label>
        <select id='blood_type' name='blood_type' class="form-control select2">
            <option value='0'>Select Blood Type</option>
            <option value="A"
                @if ($crew->blood_type == 'A')
                  {{'selected="selected"'}}
                @endif
                >A</option>
            <option value="B"
                @if ($crew->blood_type == 'B')
                  {{'selected="selected"'}}
                @endif
                >B</option>
            <option value="AB"
                @if ($crew->blood_type == 'AB')
                  {{'selected="selected"'}}
                @endif
                >AB</option>
            <option value="O"
                @if ($crew->blood_type == 'O')
                  {{'selected="selected"'}}
                @endif
                >O</option>


            <option value='O'>O</option>
          </select>
    </div>
    <div class="col-md-2">
        <label for="eye_color">Eye Color</label>
        <input type="text" class="form-control" id="eye_color" name="eye_color" value="{{ $crew->eye_color }}">
    </div>
    <div class="col-md-3">
        <label for="nationality">Nationality</label>
        <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $crew->nationality }}">
    </div>
    <div class="col-md-3">
        <label for="religion">Religion</label>
        <input type="text" class="form-control" id="religion" name="religion" value="{{ $crew->religion }}">
    </div>
    <div class="col-md-3">
        <label for="foreign_language">Foreign Language</label>
        <input type="text" class="form-control" id="foreign_language" name="foreign_language" value="{{ $crew->foreign_language }}">
    </div>
    <div class="col-md-3">
        <label for="race">Race</label>
        <input type="text" class="form-control" id="race" name="race" value="{{ $crew->race }}">
    </div>
</div>
