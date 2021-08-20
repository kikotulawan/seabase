
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
            <label for="rank" class="col-form-label">Rank</label>
            <input type="text" class="form-control" id="rank" name="rank">
            <small id="rank_help" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="department_id" class="col-form-label">Department</label>
            <select id='department_id' name='department_id' class="select2">
              <option value='0'>Select Department</option>
              @foreach($department['data'] as $department)
                <option value='{{ $department->id }}'>{{ $department->department }}</option>
              @endforeach
            </select>
            <small id="department_id_help" class="text-danger"></small>
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
