<table class="table table-bordered table-hover data-table w-100" id="salaryscale" name ="salaryscale">
    <thead>
    <tr>
      <th>Salary Scale Name</th>
      <th>Status</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- MODAL -->
<div class="modal fade" id="salary_scale_modal" tabindex="-1" role="dialog" aria-labelledby="salary_scale_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_salary_scale" name="form_salary_scale" >
          @csrf
        <div class="modal-body">
          <input type="hidden" name="principal_id" id="principal_id" value="{{ $principal->id }}">
          <input type="hidden" name="id" id="id">

            <div class="form-group">
                <label for="salary_name" class="col-form-label">Salary Scale Name</label>
                <input type="text" class="form-control" id="salary_name" name="salary_name">
                <small id="salary_name_help" class="text-danger"></small>
            </div>
            <div class="form-check">
                <label for="active" class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="active" name="active">Set Active
                </label>

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

<script>
    var salary_scale;
    function salary_scale(){

        salary_scale = $('#salaryscale').DataTable({

                  searching:false,
                  lengthChange:false,
                  pageLength: 5,
                  autoWidth:true,
                  ajax: "{{ route('salaryscales',$principal->id) }}",
                  columns: [
                        {data: 'salary_name', name: 'salary_name'},
                        {
                            'data': 'active',
                            'render': function (data) {
                                if(data===1){
                                    return '<label class="badge badge-success">Active</label>';
                                }else{
                                    return '';
                                }
                            }
                        },
                      {data: 'options', name: 'options', orderable: false, searchable: false}

                  ],
                  columnDefs: [
                      { width: "50%", targets: 0 },

                      { width: "20%", targets: 2 },


                  ],
                  dom: "lBtipr",
                      buttons: {
                        buttons: [
                          {
                            text: "Add New",
                            action: function(e, dt, node, config) {
                              $('#form_salary_scale')[0].reset();
                              $('#form_salary_scale').find('input,small').removeClass('is-invalid').text('');
                              $('#salary_scale_modal').modal('show');
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


              $('#form_salary_scale').submit(function(e){
                  $('#form_salary_scale').find('input,small').removeClass('is-invalid').text('');
                  event.preventDefault(e);
                  var form=$('#form_salary_scale')[0];
                  var formData=new FormData(form);
                  var url;

                  if($('form[name=form_salary_scale] #id').val()===""){
                      url="{{ route('salaryscales.store') }}";
                  }else{
                      url="{{ route('salaryscales.update') }}";
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
                      salary_scale.ajax.reload();
                      $('#form_salary_scale')[0].reset();
                      $('#form_salary_scale').find('input,small').removeClass('is-invalid').text('');
                      $('#salary_scale_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                              $('form[name=form_salary_scale] #' +key).addClass('is-invalid');
                              $('form[name=form_salary_scale] #' +key).focus();
                              $('form[name=form_salary_scale] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
              });

              $('#salaryscale').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#salaryscale').find('input,small').removeClass('is-invalid').text('');
                  $.get("{{ route('salaryscales.index') }}" +'/' + id +'/edit', function (data) {
                      $('form[name=form_salary_scale]')[0].reset();
                      $('#salary_scale_modal .modal-title').html('Edit');
                      $('#salary_scale_modal').modal('show');

                      $('form[name=form_salary_scale] #id').val(data.id);
                      $('form[name=form_salary_scale] #salary_name').val(data.salary_name);
                      if(data.active==1){
                        $('form[name=form_salary_scale] #active').attr('checked','checked')
                      }

                  });
              });
              $('#salaryscale').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                          type: "DELETE",
                          url: "{{ route('salaryscales.store') }}"+'/'+id,
                          success: function (data) {
                              salary_scale.ajax.reload();
                              toastr.error('Record successfully deleted');
                          },
                          error: function (data) {
                              console.log('Error:', data);
                          }
                      });
                  }
              });
    }
  </script>
