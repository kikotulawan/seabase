<div class="row">
    <div class="col-md-8">
        <label for="kin_fullname">Fullname</label>
        <input type="text" class="form-control" id="kin_fullname" name="kin_fullname" value="{{ $crew->kin_fullname }}">
    </div>
    <div class="col-md-2">
        <label for="kin_birth_date">Date of Birth</label>
        <input type="text" class="form-control date" id="kin_birth_date" name="kin_birth_date" value="{{ $crew->kin_birth_date ? date('d-M-Y', strtotime($crew->kin_birth_date))  : '' }}">
    </div>
    <div class="col-md-2">
        <label for="kin_relationship">Relationship</label>
        <input type="text" class="form-control" id="kin_relationship" name="kin_relationship" value="{{ $crew->kin_relationship }}">
    </div>
    <div class="col-md-8">
        <label for="kin_address">Address</label>
        <input type="text" class="form-control" id="kin_address" name="kin_address" value="{{ $crew->kin_address }}">
    </div>
    <div class="col-md-2">
        <label for="kin_telephone">Telephone</label>
        <input type="text" class="form-control" id="kin_telephone" name="kin_telephone" value="{{ $crew->kin_telephone }}">
    </div>
    <div class="col-md-2">
        <label for="kin_hp_no">H/PNo.</label>
        <input type="text" class="form-control" id="kin_hp_no" name="kin_hp_no" value="{{ $crew->kin_hp_no }}">
    </div>
</div>
