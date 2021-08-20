
<div class="modal fade" id="modal_hire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Hire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_hire" name="form_hire">
        @csrf
      <div class="modal-body">
        <table class="table table-bordered table-hover w-100" id="vessels" name ="vessels">
            <thead>
            <tr>
              <th>Vessel Name</th>
              <th>Principal</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
    var vessel;

function vessel(){

  vessel = $('#vessels').DataTable({

              searching:false,
              lengthChange:false,
              pageLength: 5,
              autoWidth:true,
              ajax: "{{ route('allVessels') }}",
              columns: [
                {data: 'vessel_name', name: 'vessel_name'},
                {data: 'principal.principal', name: 'principal.principal'},
                {
                    data: "id",
                    render: function (data) {
                        return '<button type="button" class="btn btn-default" title="Edit"  onclick="Edit(\'' + data + '\')">Assign</button> ';

                    }
                }
              ]
          });



}

function Edit(id){
    bootbox.confirm("Are you sure you want hire '<strong>{{$crew->first_name . ' ' . $crew->last_name }}</strong>'?", function (result) {
                if (result) {
                    //$('#vessel_id').val(id);

                    $.ajax({
                        url: "{{ route('crewvessels.store') }}",
                        data: {'vessel_id': id,'crew_id': {{$crew->id}}},
                        dataType: 'json',
                        type: 'POST',
                        success: function ( data ) {
                            $('#modal').modal('hide');
                            toastr.success(
                                'Applicant has been moved to Crew',
                                'Status',
                                {
                                    timeOut: 800,
                                    fadeOut: 800,
                                    onHidden: function () {
                                        location.reload();
                                    }
                                }
                            );
                        }
                    });
                }
            });
}
  </script>

