
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
            <label for="code" class="col-form-label">Code</label>
            <input type="text" class="form-control" id="code" name="code">
            <small id="code_help" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="license" class="col-form-label">License</label>
            <input type="text" class="form-control" id="license" name="license">
            <small id="license_help" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="notifydays" class="col-form-label">Days to Notify</label>
            <input type="text" class="form-control" id="notifydays" name="notifydays">
            <small id="notifydays_help" class="text-danger"></small>
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
