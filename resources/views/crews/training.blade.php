<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="training" name="training">
        <thead>
        <tr>
          <th>Course</th>
          <th>Institution</th>
          <th>Certificate No.</th>
          <th>Issue Date</th>
          <th>Expiry Date</th>
          <th>Issued By</th>
          <th>Place Issued</th>
          <th>STCW Code</th>
          <th>MLC</th>
          <th>File</th>
          <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
</div>
  <!-- MODAL -->
  <div class="modal fade" id="training_modal" tabindex="-1" role="dialog" aria-labelledby="training_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_training" name="form_training">
          @csrf
        <div class="modal-body">
          <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
          <input type="hidden" name="crew_no" id="crew_no" value="{{ $crew->crew_no }}">
          <input type="hidden" name="id" id="id">
            <div class="row">
              <div class="form-group col-md-12">
                <label for="training_course_id" class="col-form-label">Training Course</label>
                <select name="training_course_id" id="training_course_id" class="form-control select2"></select>
                <small id="training_course_id_help" class="text-danger"></small>
              </div>
              <div class="form-group col-md-12">
                <label for="training_center_id" class="col-form-label">Training Centers</label>
                <select name="training_center_id" id="training_center_id" class="form-control select2"></select>
                <small id="training_center_id_help" class="text-danger"></small>
              </div>
              <div class="form-group col-md-12">
                <label for="certificate_number" class="col-form-label">Certificate Number</label>
                <input type="text" id="certificate_number" name="certificate_number" class="form-control">
                <small id="certificate_number_help" class="text-danger"></small>
              </div>
              <div class="form-group col-md-12">
                <label for="stcw_code" class="col-form-label">STCW Code</label>
                <input type="text" id="stcw_code" name="stcw_code" class="form-control">
                <small id="stcw_code_help" class="text-danger"></small>
              </div>
                <div class="col-md-6">
                    <label for="issue_date">Issue Date</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control date " id="issue_date" name="issue_date">
                    </div>
                    <small id="issue_date_help" class="text-danger"></small>
                </div>
                <div class="col-md-6">
                    <label for="expiry_date">Expiry Date</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control date " id="expiry_date" name="expiry_date">
                    </div>
                    <small id="expiry_date_help" class="text-danger"></small>
                </div>

                <div class="form-group col-md-12">
                    <label for="place_issued" class="col-form-label">Place Issued</label>
                    <input type="text" id="place_issued" name="place_issued" class="form-control">

                </div>
                <div class="form-group col-md-12">
                    <label for="file_path">File input</label>
                    <div class="input-group">
                      <button id="remove" name="remove" type="button" class="btn btn-danger btn-block" >Remove Attachment</button>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file_path" name="file_path">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                </div>
                <div class="form-check">
                    <label for="mlc" class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="mlc" name="mlc">MLC
                    </label>

                </div>

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
    var training;
    function training(){
        $('form[name=form_training] #remove').hide();
        training = $('#training').DataTable({

                  lengthChange:false,
                  ajax: "{{ route('trainings',$crew->id) }}",
                  columns: [
                      {data: 'trainingcourse.course', name: 'trainingcourse.course'},
                      {data: 'trainingcenter.center', name: 'trainingcenter.center'},
                      {data: 'certificate_number', name: 'certificate_number'},
                      {
                        data: 'issue_date',
                        render: function (data) {
                            return moment(data).format("DD-MMM-YYYY");
                        }
                      },
                      {
                        data: 'expiry_date',
                        render: function (data) {
                            return moment(data).format("DD-MMM-YYYY");
                        }
                     },
                      {data: 'issued_by', name: 'issued_by'},
                      {data: 'place_issued', name: 'place_issued'},
                      {data: 'stcw_code', name: 'stcw_code'},
                      {
                            'data': 'mlc',
                            'render': function (data) {
                                if(data===1){
                                    return 'Yes';
                                }else{
                                    return 'No';
                                }
                            }
                        },
                      {
                        data: 'file_path',
                        render: function (data) {
                        let action = '';

                            if(data!=null){
                                var file_path='/storage/uploads/' + $('#crew_no').val() +'/' +data;
                                //action += '<a href="' + data +'" target="_blank"> <i class="fas fa-paperclip"></i> </a>';
                                action += '<a href="' + file_path+'" target="_blank"> <i class="fas fa-paperclip"></i> </a>';
                            }
                            return action;
                        }
                      },
                      {data: 'options', name: 'options', orderable: false, searchable: false}

                  ],
                  columnDefs: [
                    { width: "30%", targets: 0 },
                    { width: "20%", targets: 1 },
                    { width: "10%", targets: 2 },
                    { width: "10%", targets: 3 },
                    { width: "20%", targets: 4 },
                    { width: "10%", targets: 5 },
                    { width: "20%", targets: 6 },

                  ],
                  dom: "lBtipr",
                      buttons: {
                        buttons: [
                          {
                            text: "Add New",
                            action: function(e, dt, node, config) {
                              $('#form_training')[0].reset();
                              $('#form_training').find('input,small').removeClass('is-invalid').text('');
                              $('#training_modal').modal('show');
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

                $.ajax({
                    type:"get",
                    url:"{{ route('getTrainingCourse') }}",
                    success:function(res)
                    {
                        if(res)
                        {
                                $("form[name=form_training] #training_course_id").empty();
                                $("form[name=form_training] #training_course_id").append('<option value="">Select License</option>');
                                $.each(res,function(key,value){
                                $('form[name=form_training] #training_course_id').append('<option value="'+key+'">'+value+'</option>');
                                //console.log(key + ' ' + value)
                                });
                        }
                    }
                });
                $.ajax({
                    type:"get",
                    url:"{{ route('getTrainingCenter') }}",
                    success:function(res)
                    {
                        if(res)
                        {
                                $("form[name=form_training] #training_center_id").empty();
                                $("form[name=form_training] #training_center_id").append('<option value="">Select License</option>');
                                $.each(res,function(key,value){
                                $('form[name=form_training] #training_center_id').append('<option value="'+key+'">'+value+'</option>');
                                //console.log(key + ' ' + value)
                                });
                        }
                    }
                });

              $('#form_training').submit(function(e){
                  $('#form_training').find('input,small').removeClass('is-invalid').text('');
                  event.preventDefault(e);
                  var form=$('#form_training')[0];
                  var formData=new FormData(form);
                  var url;

                  if($('form[name=form_training] #id').val()===""){
                      url="{{ route('crewtrainings.store') }}";
                  }else{
                      url="{{ route('crewtrainings.update') }}";
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
                      training.ajax.reload();
                      $('#form_training')[0].reset();
                      $('#form_training').find('input,small').removeClass('is-invalid').text('');
                      $('#training_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                              $('form[name=form_training] #' +key).addClass('is-invalid');
                              $('form[name=form_training] #' +key).focus();
                              $('form[name=form_training] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
              });

              $('#training').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#form_training').find('input,small').removeClass('is-invalid').text('');
                  $.get("{{ route('crewtrainings.index') }}" +'/' + id +'/edit', function (data) {
                      $('form[name=form_training]')[0].reset();
                      $('#training_modal .modal-title').html('Edit');
                      $('#training_modal').modal('show');

                      $('form[name=form_training] #id').val(data.id);
                      $('form[name=form_training] #training_center_id').val(data.training_center_id).attr('selected','selected').trigger('change');;
                      $('form[name=form_training] #training_course_id').val(data.training_course_id).attr('selected','selected').trigger('change');;
                      $('form[name=form_training] #certificate_number').val(data.certificate_number);
                      $('form[name=form_training] #stcw_code').val(data.stcw_code);
                      $('form[name=form_training] #mlc').val(data.mlc);
                      $('form[name=form_training] #issue_date').val(moment(data.issue_date).format("DD-MMM-YYYY"));
                      $('form[name=form_training] #expiry_date').val(moment(data.expiry_date).format("DD-MMM-YYYY"));
                      $('form[name=form_training] #issued_by').val(data.issued_by);
                      $('form[name=form_training] #place_issued').val(data.place_issued);
                      if(data.mlc==1){
                        $('form[name=form_training] #mlc').attr('checked','checked')
                      }
                      if(data.file_path!=null){
                        $('form[name=form_training] .custom-file').hide();
                        $('form[name=form_training] #remove').show();
                      }else{
                        $('form[name=form_training] #remove').hide();
                        $('form[name=form_training] .custom-file').show();
                      }


                  });
              });


              $('#training').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                        data: {"_token": "{{ csrf_token() }}"},
                          type: "DELETE",
                          url: "{{ route('crewtrainings.store') }}"+'/'+id,
                          success: function (data) {
                              training.ajax.reload();
                              toastr.error('Record successfully deleted');
                          },
                          error: function (data) {
                              console.log('Error:', data);
                          }
                      });
                  }
              });

              $('form[name=form_training] #remove').on('click',function(e){
                e.preventDefault();
                var id=$('form[name=form_training] #id').val();
                bootbox.confirm("Are you sure you want remove attached file?", function (result) {
                    if (result) {
                        $.ajax({
                            url: "{{ route('crewtrainings.update_attachment') }}",
                            data: {'id':id,'_token': '{{ csrf_token() }}'},
                            dataType: 'json',
                            type: 'POST',
                            success: function ( data ) {
                                toastr.success(data.success);
                                training.ajax.reload();
                                $('form[name=form_training] .custom-file').show();
                                $('form[name=form_training] #remove').hide();
                            }
                        });
                    }
                });
              })

    }
  </script>
