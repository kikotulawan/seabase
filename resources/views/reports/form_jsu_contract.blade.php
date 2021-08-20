

<div class="modal fade" id="jsu_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_jsu" name="form_jsu" action="{{ route('jsu_contract') }}" formtarget="_blank" target="_blank" method="POST">
          @csrf
        <div class="modal-body">
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id}}">
              <div class="form-group">
                  <label for="jsu_signatory_id">Signatory</label>
                  <select id='jsu_signatory_id' name='jsu_signatory_id' class="form-control select2">

                  </select>
              </div>
              <div class="form-group col-md-12">
                <label for="accomplished_date">Date Accomplished</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control date " maxlength="10" id="accomplished_date" name="accomplished_date" >
                </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">View</button>
        </div>
      </form>
      </div>
    </div>
  </div>
