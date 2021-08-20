<div class="row">
    <div class="col-md-4">
        <label for="sss_no">SSS No.</label>
        <input type="text" class="form-control" id="sss_no" name="sss_no"value="{{ $crew->sss_no }}" >
    </div>
    <div class="col-md-4">
        <label for="philhealth_no">Philhealth No.</label>
        <input type="text" class="form-control" id="philhealth_no" name="philhealth_no" value="{{ $crew->philhealth_no }}">
    </div>
    <div class="col-md-4">
        <label for="pagibigid_no">Pagibig Id No.</label>
        <input type="text" class="form-control" id="pagibigid_no" name="pagibigid_no" value="{{ $crew->pagibigid_no }}">
    </div>

    <div class="col-md-3">
        <label for="psu_no">PSU Id No.</label>
        <input type="text" class="form-control" id="psu_no" name="psu_no" value="{{ $crew->psu_no }}">
    </div>
    <div class="col-md-2">
        <label for="psu_issuance_date">PSU Issuance Date</label>
        <input type="text" class="form-control date" id="psu_issuance_date" name="psu_issuance_date" value="{{ $crew->psu_issuance_date ? date('d-M-Y', strtotime($crew->psu_issuance_date))  : '' }}">
    </div>
    <div class="col-md-3">
        <label for="nbi_no">NBI No.</label>
        <input type="text" class="form-control" id="nbi_no" name="nbi_no" value="{{ $crew->nbi_no }}">
    </div>
    <div class="col-md-2">
        <label for="nbi_validity">NBI Validity</label>
        <input type="text" class="form-control date" id="nbi_validity" name="nbi_validity" value="{{ $crew->nbi_validity ? date('d-M-Y', strtotime($crew->nbi_validity))  : '' }}">
    </div>
</div>
