
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" name="form">
        @csrf
        <div class="modal-body">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="code" class="col-form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <small id="name_help" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email Address</label>
                <input type="text" class="form-control" id="email" name="email">
                <small id="email_help" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label for="position" class="col-form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position">
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small id="password_help" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label for="confirm-password" class="col-form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                <small id="confirm-password_help" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label for="roles" class="col-form-label">Roles</label>
                {!! Form::select('roles[]', $roles,[], array('class' => 'select2','multiple')) !!}
                <small id="roles_help" class="text-danger"></small>
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
