
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" name="form">
        @csrf
      <div class="modal-body text-sm">
          <input type="hidden" name="id" id="id">
          <div class="row">

            <div class="form-group col-md-6">
              <label for="principal" class="col-form-label">Principal Name</label>
              <input type="text" class="form-control" id="principal" name="principal">
              <small id="principal_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-2">
              <label for="code" class="col-form-label">Code</label>
              <input type="text" class="form-control" id="code" name="code">
              <small id="code_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-4">
              <label for="country" class="col-form-label">Country</label>
              <select id='country_id' name='country_id' class="form-control select2">
                <option value='0'>-- Select Country --</option>
                @foreach($country['data'] as $country)
                  <option value='{{ $country->id }}'>{{ $country->country }}</option>
                @endforeach
              </select>
              <small id="country_id_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-12">
              <label for="code" class="col-form-label">Address</label>
              <textarea name="address" id="address"  rows="2" class="form-control"></textarea>
            </div>
            <div class="form-group col-md-3">
              <label for="telephone" class="col-form-label">Telephone</label>
              <input type="text" class="form-control" id="telephone" name="telephone">
            </div>
            <div class="form-group col-md-3">
              <label for="fax" class="col-form-label">Fax</label>
              <input type="text" class="form-control" id="fax" name="fax">
            </div>
            <div class="form-group col-md-6">
              <label for="email" class="col-form-label">Email Address</label>
              <input type="text" class="form-control" id="email" name="email">
              <small id="email_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-6">
              <label for="accreditation_number" class="col-form-label">Accreditation Number</label>
              <input type="text" class="form-control" id="accreditation_number" name="accreditation_number">
              <small id="accreditation_number_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-3">
              <label for="issue_date" class="col-form-label">Date of Issue</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="text" class="form-control date " id="issue_date" name="issue_date" >
                <small id="issue_date_help" class="text-danger"></small>
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="expiry_date" class="col-form-label">Expiry Date</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="text" class="form-control date " id="expiry_date" name="expiry_date" >
                <small id="expiry_date_help" class="text-danger"></small>
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="license_expiry_date" class="col-form-label">License Expiry Date</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="text" class="form-control date " id="license_expiry_date" name="license_expiry_date" >
                <small id="license_expiry_date_help" class="text-danger"></small>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="cba" class="col-form-label">CBA</label>
              <input type="text" class="form-control" id="cba" name="cba">
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
