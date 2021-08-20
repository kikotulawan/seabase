

<div class="modal fade" id="letter_of_guarantee_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_letter_of_guarantee" name="form_letter_of_guarantee" action="{{ route('letter_of_guarantee') }}"  formtarget="_blank" target="_blank" method="POST">
          @csrf
        <div class="modal-body">
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id}}">
              <div class="form-group">
                  <label for="signatory_id">Signatory</label>
                  <select id='signatory_id' name='signatory_id' class="form-control select2">

                  </select>
              </div>
              <div class="form-group">
                  <label for="agent_id">Agent</label>
                  <select id='agent_id' name='agent_id' class="form-control select2">

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
