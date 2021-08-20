<div class="row-fluid">
    <table class="table table-bordered table-hover table-responsive data-table w-100" id="educ" name="educ">
        <thead>
        <tr>
          <th>Course/Degree</th>
          <th>Name of School</th>
          <th>Attendance Date</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>



  <!-- MODAL -->
  <div class="modal fade" id="education_modal" tabindex="-1" role="dialog" aria-labelledby="education_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_education" name="form_education">
          @csrf
        <div class="modal-body">
          <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
          <input type="hidden" name="id" id="id">

              <div class="form-group">
                <label for="course_degree" class="col-form-label">Course/Degree</label>
                <input type="text" class="form-control" id="course_degree" name="course_degree">
                <small id="course_degree_help" class="text-danger"></small>
              </div>

              <div class="form-group">
                <label for="school_name" class="col-form-label">Name of School</label>
                <input type="text" class="form-control" id="school_name" name="school_name">
                <small id="school_name_help" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label for="attendance_date" class="col-form-label">Attendance Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control date " id="attendance_date" name="attendance_date" >

                </div>
                <small id="attendance_date_help" class="text-danger"></small>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary save">Save</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- MODAL -->

  <script type="text/javascript">
     var education;
     function education(){

        education = $('#educ').DataTable({

                lengthChange:false,
                ajax: "{{ route('educations',$crew->id) }}",
                columns: [
                    {data: 'course_degree', name: 'course_degree'},
                    {data: 'school_name', name: 'school_name'},
                    {
                        data: 'attendance_date',
                        render: function (data) {
                            return moment(data).format("DD-MMM-YYYY");
                        }
                    },
                    {data: 'options', name: 'options', orderable: false, searchable: false}

                ],
                dom: "Bfrtip",
                    buttons: {
                      buttons: [
                        {
                          text: "Add New",
                          action: function(e, dt, node, config) {
                            clearForm('form[name=form_education]');
                            $('#education_modal').modal('show');
                          }
                        }
                      ],
                      dom: {
                        button: {
                          tag: "button",
                          className: "btn btn-default btn-group-vertical"
                        },
                        buttonLiner: {
                          tag: null
                        }
                      }
                    }
            });


            $('#form_education').submit(function(e){

                event.preventDefault(e);
                var form=$('#form_education')[0];
                var formData=new FormData(form);
                var url;

                if($('form[name=form_education] #id').val()===""){
                    url="{{ route('creweducations.store') }}";
                    // $('.save').prop("disabled", true);

                    // $('.save').html(
                    //     '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...'
                    // );
                }else{
                    url="{{ route('creweducations.update') }}";
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
                    education.ajax.reload();

                    $('#education_modal').modal('hide');
                },
                error:function(err)
                    {
                        if(err.status===422){
                            var errors =$.parseJSON(err.responseText);
                            $.each(errors.errors, function(key, value){
                            $('form[name=form_education] #' +key).addClass('is-invalid');
                            $('form[name=form_education] #' +key).focus();
                            $('form[name=form_education] #'+key+"_help").text(value[0]);
                            })
                        }
                    }
                })
            });

            $('#educ').on('click', '.edit', function () {
                var id = $(this).data("id");

                $.get("{{ route('creweducations.index') }}" +'/' + id +'/edit', function (data) {
                    clearForm('form[name=form_education]');
                    $('#education_modal .modal-title').html('Edit');
                    $('#education_modal').modal('show');
                    $('form[name=form_education] #id').val(data.id);
                    $('form[name=form_education] #course_degree').val(data.course_degree);
                    $('form[name=form_education] #school_name').val(data.school_name);
                    $('form[name=form_education] #attendance_date').val(moment(data.attendance_date).format("DD-MMM-YYYY"));
                });
            });
            $('#educ').on('click', '.delete', function () {
                var id = $(this).data("id");
                $confirm =confirm("Are You sure want to delete !");

                if($confirm == true ){
                    $.ajax({
                        data: {"_token": "{{ csrf_token() }}"},
                        type: "DELETE",
                        url: "{{ route('creweducations.store') }}"+'/'+id,
                        success: function (data) {
                            education.ajax.reload();
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
