<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="history_data_table" name="history_data_table">
        <thead>
        <tr>
          <th>Date</th>
          <th>Time</th>
          <th>Remarks</th>
          <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>



<!-- MODAL -->
<div class="modal fade" id="history_modal" tabindex="-1" role="dialog" aria-labelledby="history_modal" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="form_history" name="form_history">
        @csrf
    <div class="modal-body">
        <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
        <input type="hidden" name="id" id="id">

            <div class="form-group">
            <label for="remarks" class="col-form-label">Remarks</label>
            <textarea type="text" class="form-control" id="remarks" name="remarks" rows="2"></textarea>

            <small id="remarks_help" class="text-danger"></small>
            </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn_beneficiary">Save</button>
    </div>
    </form>
    </div>
</div>
</div>
<!-- MODAL -->

  <script type="text/javascript">
     var table_history;
     function office_history(){

        table_history = $('#history_data_table').DataTable({
                searching:false,
                lengthChange:false,
                pageLength: 2,
                ajax: "{{ route('officehistories',$crew->id) }}",
                columns: [
                    {data: 'created_date', name: 'created_date'},
                    {data: 'created_time', name: 'created_time'},
                    {data: 'remarks', name: 'remarks'},
                    {data: 'options', name: 'options', orderable: false, searchable: false}

                ],

                dom: "lBtipr",
                    buttons: {
                      buttons: [
                        {
                          text: "Add New",
                          action: function(e, dt, node, config) {
                            $('form[name=form_history]')[0].reset();
                            $('form[name=form_history]').find('textarea,small').removeClass('is-invalid').text('');
                            $('#history_modal').modal('show');
                          }
                        }
                      ],
                      dom: {
                        button: {
                          tag: "button",
                          className: "btn btn-default"
                        },
                        buttonLiner: {
                          tag: null
                        }
                      }
                    }
            });


            $('#form_history').submit(function(e){

                event.preventDefault(e);
                var form=$('#form_history')[0];
                var formData=new FormData(form);
                var url;

                if($('form[name=form_history] #id').val()===""){
                    url="{{ route('crewofficehistories.store') }}";
                }else{
                    url="{{ route('crewofficehistories.update') }}";
                }


                $.ajax({
                url: url,
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {
                    toastr.success(data.success);
                    table_history.ajax.reload();
                    $('form[name=form_history]')[0].reset();
                    $('#history_modal').modal('hide');
                },
                error:function(err)
                    {
                        if(err.status===422){
                            var errors =$.parseJSON(err.responseText);
                            $.each(errors.errors, function(key, value){
                            $('form[name=form_history] #' +key).addClass('is-invalid');
                            $('form[name=form_history] #' +key).focus();
                            $('form[name=form_history] #'+key+"_help").text(value[0]);
                            })
                        }
                    }
                })
            });

            $('#history_data_table').on('click', '.edit', function () {
                var id = $(this).data("id");
                $('#form_history').find('textarea,small').removeClass('is-invalid').text('');
                $.get("{{ route('crewofficehistories.index') }}" +'/' + id +'/edit', function (data) {
                    $('form[name=form_history]')[0].reset();
                    $('#history_modal .modal-title').html('Edit');
                    $('#history_modal').modal('show');

                    $('form[name=form_history] #id').val(data.id);
                    $('form[name=form_history] #remarks').val(data.remarks);

                });
            });
            $('#history_data_table').on('click', '.delete', function () {
                var id = $(this).data("id");
                $confirm =confirm("Are You sure want to delete !");

                if($confirm == true ){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('crewofficehistories.store') }}"+'/'+id,
                        success: function (data) {
                            table_history.ajax.reload();
                            toastr.error(data.success);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
     }

  </script>
