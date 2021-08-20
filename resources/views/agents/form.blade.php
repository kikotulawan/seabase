
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
          <div class="form-group">
            <label for="agent" class="col-form-label">Agent:</label>
            <input type="text" class="form-control" id="agent" name="agent">
            <small id="agent_help" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="address" class="col-form-label">Address</label>
            <textarea class="form-control" id="address" name="address"></textarea>
          </div>
          <div class="form-group">
            <label for="fax" class="col-form-label">Fax</label>
            <input type="text" class="form-control" id="fax" name="fax" />
          </div>
          <div class="form-group">
            <label for="telephone" class="col-form-label">Telephone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" />
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
