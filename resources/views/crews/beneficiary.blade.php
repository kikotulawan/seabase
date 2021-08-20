<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="beneficiary" name="beneficiary">
        <thead>
        <tr>
          <th>Beneficiary Name</th>
          <th>Gender</th>
          <th>Relationship</th>
          <th>Birthdate</th>
          <th>Age</th>
          <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- MODAL -->
<div class="modal fade" id="beneficiary_modal" tabindex="-1" role="dialog" aria-labelledby="beneficiary_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_beneficiary" name="form_beneficiary">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
        <input type="hidden" name="id" id="id">
          <div class="row">
            <div class="form-group col-md-4">
              <label for="first_name" class="col-form-label">Firstname</label>
              <input type="text" class="form-control" id="first_name" name="first_name">
              <small id="first_name_fb_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-4">
              <label for="middle_name" class="col-form-label">Middlename</label>
              <input type="text" class="form-control" id="middle_name" name="middle_name">
            </div>
            <div class="form-group col-md-4">
              <label for="last_name" class="col-form-label">Lastname</label>
              <input type="text" class="form-control" id="last_name" name="last_name">
              <small id="last_name_fb_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-4">
            <label for="relationship" class="col-form-label">Relationship</label>
                <input type="text" class="form-control" id="relationship" name="relationship">
                <small id="relationship_fb_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-3">
                <label for="gender" class="col-form-label">Gender</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <small id="gender_fb_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-5">
              <label for="birth_date" class="col-form-label">Birth Date</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="text" class="form-control date " id="birth_date" name="birth_date" >
                <small id="birth_date_fb_help" class="text-danger"></small>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label for="birth_place" class="col-form-label">Place of Birth</label>
              <input type="text" class="form-control" id="birth_place" name="birth_place">
            </div>
            <div class="form-group col-md-12">
              <label for="address" class="col-form-label">Address</label>
              <input name="address" id="address" type="text" class="form-control">
            </div>
            <input type="hidden" id="type" value="B" name="type">
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
  var beneficiary;
  function beneficiary(){


    beneficiary = $('#beneficiary').DataTable({

                searching:false,
                lengthChange:false,
                pageLength: 2,
                ajax: "{{ route('beneficiary',$crew->id) }}",
                columns: [
                    {data: 'first_name', name: 'first_name'},
                    {data: 'gender', name: 'gender'},
                    {data: 'relationship', name: 'relationship'},
                    {
                        data: 'birth_date',
                        render: function (data) {
                            return moment(data).format("DD-MMM-YYYY");
                        }
                    },
                    {data: 'age', name: 'age'},
                    {data: 'options', name: 'options', orderable: false, searchable: false}

                ],
                columnDefs: [
                  { width: "80%", targets: 0 },
                  { width: "20%", targets: 5 },

                ],
                dom: "lBtipr",
                    buttons: {
                      buttons: [
                        {
                          text: "Add New",
                          action: function(e, dt, node, config) {
                            clearForm('form[name=form_beneficiary]');
                            $('#beneficiary_modal').modal('show');
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

            //BENEFICIARY SAVE
            $('#form_beneficiary').submit(function(e){

                event.preventDefault(e);
                var form=$('#form_beneficiary')[0];
                var formData=new FormData(form);
                var url;

                if($('form[name=form_beneficiary] #id').val()===""){
                    url="{{ route('crewschildrenbenificiary.store') }}";
                }else{
                    url="{{ route('crewschildrenbenificiary.update') }}";
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
                    beneficiary.ajax.reload();
                    $('#beneficiary_modal').modal('hide');
                },
                error:function(err)
                    {
                        if(err.status===422){
                            var errors =$.parseJSON(err.responseText);
                            $.each(errors.errors, function(key, value){
                            $('form[name=form_beneficiary] #' +key).addClass('is-invalid');
                            $('form[name=form_beneficiary] #' +key).focus();
                            $('form[name=form_beneficiary] #'+key+"_fb_help").text(value[0]);
                            })
                        }
                    }
                })
            });
            //BENEFICIARY EDIT
            $('#beneficiary').on('click', '.edit', function () {
                var id = $(this).data("id");
                $('#form_beneficiary').find('input,small').removeClass('is-invalid').text('');
                $.get("{{ route('crewschildrenbenificiary.index') }}" +'/' + id +'/edit', function (data) {
                    clearForm('#form_beneficiary');
                    $('#beneficiary_modal .modal-title').html('Edit Beneficiary');
                    $('#beneficiary_modal').modal('show');

                    $('form[name=form_beneficiary] #id').val(data.id);
                    $('form[name=form_beneficiary] #first_name').val(data.first_name);
                    $('form[name=form_beneficiary] #middle_name').val(data.middle_name);
                    $('form[name=form_beneficiary] #last_name').val(data.last_name);
                    $('form[name=form_beneficiary] #relationship').val(data.relationship);
                    $('form[name=form_beneficiary] #address').val(data.address);
                    $('form[name=form_beneficiary] #gender').val(data.gender);
                    $('form[name=form_beneficiary] #birth_date').val(moment(data.birth_date).format("DD-MMM-YYYY"));
                    $('form[name=form_beneficiary] #birth_place').val(data.birth_place);


                });
            });

            //BENEFICIARY DELETE
            $('#beneficiary').on('click', '.delete', function () {
                var id = $(this).data("id");
                $confirm =confirm("Are You sure want to delete !");

                if($confirm == true ){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('crewschildrenbenificiary.store') }}"+'/'+id,
                        success: function (data) {
                            beneficiary.ajax.reload();
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
