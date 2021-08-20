
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" name="form">
        @csrf
      <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="row">
          <div class="form-group col-sm-12">
            <label for="center" class="col-form-label">Training Center</label>
            <input type="text" class="form-control" id="center" name="center">
            <small id="center_help" class="text-danger"></small>
          </div>
          <div class="form-group col-sm-4">
            <label for="code" class="col-form-label">Code</label>
            <input type="text" class="form-control" id="code" name="code">
            <small id="code_help" class="text-danger"></small>
          </div>

          <div class="form-group col-md-8">
            <label for="telephone" class="col-form-label">Telephone</label>
            <input type="text" class="form-control" id="telephone" name="telephone">
            <small id="telephone_help" class="text-danger"></small>
          </div>
          <div class="form-group col-sm-12">
            <label for="contact_person" class="col-form-label">Contact Person</label>
            <input type="text" class="form-control" id="contact_person" name="contact_person">
          </div>
          <div class="form-group col-sm-12">
            <label for="address" class="col-form-label">Address</label>
            <textarea class="form-control" id="address" name="address"></textarea>
          </div>
          <div class="form-group col-sm-12">
            <label for="remarks" class="col-form-label">Remarks</label>
            <textarea class="form-control" id="remarks" name="remarks"></textarea>
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
