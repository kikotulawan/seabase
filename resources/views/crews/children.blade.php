<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="children" name="children">
        <thead>
        <tr>
          <th>Children Name</th>
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
<div class="modal fade" id="children_modal" tabindex="-1" role="dialog" aria-labelledby="children_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_children" name="form_children">
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
            <div class="form-group col-md-8">
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
            <div class="form-group col-md-4">
              <label for="relationship" class="col-form-label">Relationship</label>
              <select name="relationship" id="relationship" class="form-control">
                <option value=""></option>
                <option value="Son">Son</option>
                <option value="Daughter">Daughter</option>
              </select>
              <small id="relationship_fb_help" class="text-danger"></small>
            </div>

            <input type="hidden" id="gender" name="gender">

            <div class="form-group col-md-12">
              <label for="address" class="col-form-label">Address</label>
              <textarea name="address" id="address" rows="2" class="form-control"></textarea>
            </div>


            <input type="hidden" id="type" value="C" name="type">
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
  var children;
  function children(){
    children = $('#children').DataTable({

                searching:false,
                lengthChange:false,
                pageLength: 2,
                ajax: "{{ route('children',$crew->id) }}",
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
                            $('#form_children')[0].reset();
                            $('#form_children').find('input,small').removeClass('is-invalid').text('');
                            $('#children_modal').modal('show');
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
            $('form[name=form_children] #relationship').change(function(){

                switch (this.value) {
                  case 'Son':
                    $('form[name=form_children] #gender').val('Male');
                    break;
                  case 'Daughter':
                    $('form[name=form_children] #gender').val('Female');
                    break;

                  default:
                    $('form[name=form_children] #gender').val('');
                    break;
                }

            })
            //CHILDREN SAVE
            $('#form_children').submit(function(e){
                $('#form_children').find('input,small').removeClass('is-invalid').text('');
                event.preventDefault(e);
                var form=$('#form_children')[0];
                var formData=new FormData(form);
                var url;

                if($('form[name=form_children] #id').val()===""){
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
                    toastr.success('Successfully added.');
                    children.ajax.reload();
                    $('#form_children')[0].reset();
                    $('#form_children').find('input,small').removeClass('is-invalid').text('');
                    $('#children_modal').modal('hide');
                },
                error:function(err)
                    {
                        if(err.status===422){
                            var errors =$.parseJSON(err.responseText);
                            $.each(errors.errors, function(key, value){
                            $('form[name=form_children] #' +key).addClass('is-invalid');
                            $('form[name=form_children] #' +key).focus();
                            $('form[name=form_children] #'+key+"_fb_help").text(value[0]);
                            })
                        }
                    }
                })
            });
            //CHILDREN EDIT
            $('#children').on('click', '.edit', function () {
                var id = $(this).data("id");
                //$('#form_children').find('input,small').removeClass('is-invalid').text('');
                $.get("{{ route('crewschildrenbenificiary.index') }}" +'/' + id +'/edit', function (data) {
                    $('form[name=form_children]')[0].reset();
                    $('#children_modal .modal-title').html('Edit');
                    $('#children_modal').modal('show');

                    $('form[name=form_children] #id').val(data.id);
                    $('form[name=form_children] #first_name').val(data.first_name);
                    $('form[name=form_children] #last_name').val(data.last_name);
                    $('form[name=form_children] #middle_name').val(data.middle_name);
                    $('form[name=form_children] #relationship').val(data.relationship);
                    $('form[name=form_children] #address').val(data.address);
                    $('form[name=form_children] #gender').val(data.gender);
                    $('form[name=form_children] #birth_date').val(moment(data.birth_date).format("DD-MMM-YYYY"));


                });
            });
            $('#children').on('click', '.delete', function () {
                var id = $(this).data("id");
                $confirm =confirm("Are You sure want to delete !");

                if($confirm == true ){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('crewschildrenbenificiary.store') }}"+'/'+id,
                        success: function (data) {
                            children.ajax.reload();
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
