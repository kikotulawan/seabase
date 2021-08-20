<div class="row">
    <div class="col-md-12 form-inline">
        <label for="sss_no">Type of Individually Paying Member</label>
    </div>
    <div class="col-md-12 form-inline">
        <div class="pr-5"><input type="radio" id="member_type" name="member_type" value="1"> Self-Employed </div>
        <div class="pr-5"><input type="radio" id="member_type" name="member_type" value="2"> OFW </div>
        <div class="pr-5"><input type="radio" id="member_type" name="member_type" value="3"> Seperated from Employment </div>
        <div class="pr-5"><input type="radio" id="member_type" name="member_type" value="4"> Others (specify) <input type="text" class="form-control"></div>

    </div>
    <div class="col-md-12">
        <label for="remarks">Character Check/Recommendation/Remarks</label>
        <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $crew->remarks }}">
    </div>
    <div class="col-md-12">
        <label for="recommended_by">Recommended by</label>
        <input type="text" class="form-control" id="recommended_by" name="recommended_by" value="{{ $crew->recommended_by }}">
    </div>
    <div class="col-md-12">
        <label for="other_info">Other Info</label>
        <input type="text" class="form-control" id="other_info" name="other_info" value="{{ $crew->other_info }}">
    </div>
</div>
