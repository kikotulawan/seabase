
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
            <label for="seaport" class="col-form-label">Seaport</label>
            <input type="text" class="form-control" id="seaport" name="seaport">
            <small id="seaport_help" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="country" class="col-form-label">Country</label>
            <select id='country_id' name='country_id' class="form-control select2">
              <option value='0'>-- Select Country --</option>
              @foreach($country['data'] as $country)
                <option value='{{ $country->id }}'>{{ $country->country }}</option>
              @endforeach
            </select>
            <small id="country_id_help" class="text-danger"></small>
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
