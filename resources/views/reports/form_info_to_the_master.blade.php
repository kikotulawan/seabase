

<div class="modal fade" id="info_to_the_master_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_info_to_the_master" name="form_info_to_the_master" action="{{ route('info_to_the_master') }}" formtarget="_blank" target="_blank" method="POST">
        @csrf
      <div class="modal-body">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id}}">
            <div class="form-group">
                <label for="allottee_id">Allottee</label>
                <select id='allottee_id' name='allottee_id' class="form-control select2">

                </select>
            </div>
            <div class="form-group">
                <label for="beneficiary_id">Beneficiary</label>
                <select id='beneficiary_id' name='beneficiary_id' class="form-control select2">

                </select>
            </div>
            <div class="form-group">
                <label for="visa_id">Visa</label>
                <select id='visa_id' name='visa_id' class="form-control select2">

                </select>
            </div>
            <div class="form-group">
                <label for="medical_id">Medical</label>
                <select id='medical_id' name='medical_id' class="form-control select2">

                </select>
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
