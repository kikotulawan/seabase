<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="med" name="med">
        <thead>
        <tr>
          <th>Certificate</th>
          <th>Clinic</th>
          <th>Certificate No.</th>
          <th>Issue Date</th>
          <th>Expiry Date</th>
          <th>Remarks</th>
          <th>File</th>
          <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
</div>

  <!-- MODAL -->
  <div class="modal fade" id="medical_modal" tabindex="-1" role="dialog" aria-labelledby="medical_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_medical" name="form_medical">
          @csrf
        <div class="modal-body">
          <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
          <input type="hidden" id="crew_no" name="crew_no" value="{{ $crew->crew_no}}">
          <input type="hidden" name="id" id="id">
            <div class="row">
              <div class="form-group col-md-12">
                <label for="medical_certificate_id" class="col-form-label">Medical Certificate</label>
                <select name="medical_certificate_id" id="medical_certificate_id" class="form-control select2"></select>
                <small id="medical_certificate_id_help" class="text-danger"></small>
              </div>
              <div class="form-group col-md-12">
                <label for="clinic_id" class="col-form-label">Medical Clinic</label>
                <select name="clinic_id" id="clinic_id" class="form-control select2"></select>
                <small id="clinic_id_help" class="text-danger"></small>
              </div>
              <div class="form-group col-md-12">
                <label for="certificate_number" class="col-form-label">Certificate Number</label>
                <input type="text" id="certificate_number" name="certificate_number" class="form-control">
                <small id="certificate_number_help" class="text-danger"></small>
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
                    <label for="remarks" class="col-form-label">Remarks</label>
                    <input type="text" id="remarks" name="remarks" class="form-control">
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
    var medical;
    function medical(){
        $('form[name=form_medical] #remove').hide();
        medical = $('#med').DataTable({

                  searching:false,
                  lengthChange:false,
                  pageLength: 2,
                  ajax: "{{ route('medicals',$crew->id) }}",
                  columns: [
                      {data: 'medicalcertificate.medicalcertificate', name: 'medicalcertificate.medicalcertificate'},
                      {data: 'clinic.clinic', name: 'clinic.clinic'},
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
                      {data: 'remarks', name: 'remarks'},
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
                              $('#form_medical')[0].reset();
                              $('#form_medical').find('input,small').removeClass('is-invalid').text('');
                              $('#medical_modal').modal('show');
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
                    url:"{{ route('getMedicalCertificate') }}",
                    success:function(res)
                    {
                        if(res)
                        {
                                $("form[name=form_medical] #medical_certificate_id").empty();
                                $("form[name=form_medical] #medical_certificate_id").append('<option value="">Select Medical Certificate</option>');
                                $.each(res,function(key,value){
                                $('form[name=form_medical] #medical_certificate_id').append('<option value="'+key+'">'+value+'</option>');
                                //console.log(key + ' ' + value)
                                });
                        }
                    }
                });
                $.ajax({
                    type:"get",
                    url:"{{ route('getClinic') }}",
                    success:function(res)
                    {
                        if(res)
                        {
                                $("form[name=form_medical] #clinic_id").empty();
                                $("form[name=form_medical] #clinic_id").append('<option value="">Select Clinic</option>');
                                $.each(res,function(key,value){
                                $('form[name=form_medical] #clinic_id').append('<option value="'+value.id+'">'+value.clinic+'</option>');
                                //console.log(key + ' ' + value)
                                });
                        }
                    }
                });

              $('#form_medical').submit(function(e){
                  $('#form_medical').find('input,small').removeClass('is-invalid').text('');
                  event.preventDefault(e);
                  var form=$('#form_medical')[0];
                  var formData=new FormData(form);
                  var url;

                  if($('form[name=form_medical] #id').val()===""){
                      url="{{ route('crewmedicals.store') }}";
                  }else{
                      url="{{ route('crewmedicals.update') }}";
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
                      medical.ajax.reload();
                      $('#form_medical')[0].reset();
                      $('#form_medical').find('input,small').removeClass('is-invalid').text('');
                      $('#medical_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                              $('form[name=form_medical] #' +key).addClass('is-invalid');
                              $('form[name=form_medical] #' +key).focus();
                              $('form[name=form_medical] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
              });

              $('#med').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#form_medical').find('input,small').removeClass('is-invalid').text('');
                  $.get("{{ route('crewmedicals.index') }}" +'/' + id +'/edit', function (data) {
                      $('form[name=form_medical]')[0].reset();
                      $('#medical_modal .modal-title').html('Edit');
                      $('#medical_modal').modal('show');
                      $('form[name=form_medical] #id').val(data.id);
                      $('form[name=form_medical] #medical_certificate_id').val(data.medical_certificate_id).attr('selected','selected').trigger('change');;
                      $('form[name=form_medical] #clinic_id').val(data.clinic_id).attr('selected','selected').trigger('change');;
                      $('form[name=form_medical] #certificate_number').val(data.certificate_number);
                      $('form[name=form_medical] #issue_date').val(moment(data.issue_date).format("DD-MMM-YYYY"));
                      $('form[name=form_medical] #expiry_date').val(moment(data.expiry_date).format("DD-MMM-YYYY"));
                      $('form[name=form_medical] #remarks').val(data.remarks);
                      if(data.file_path!=null){
                        $('form[name=form_medical] .custom-file').hide();
                        $('form[name=form_medical] #remove').show();
                      }else{
                        $('form[name=form_medical] #remove').hide();
                        $('form[name=form_medical] .custom-file').show();
                      }


                  });
              });


              $('#med').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                        data: {"_token": "{{ csrf_token() }}"},
                          type: "DELETE",
                          url: "{{ route('crewmedicals.store') }}"+'/'+id,
                          success: function (data) {
                              medical.ajax.reload();
                              toastr.error(data.success);
                          },
                          error: function (data) {
                              console.log('Error:', data);
                          }
                      });
                  }
              });

              $('form[name=form_medical] #remove').on('click',function(e){
                e.preventDefault();
                var id=$('form[name=form_medical] #id').val();
                bootbox.confirm("Are you sure you want remove attached file?", function (result) {
                    if (result) {
                        $.ajax({
                            url: "{{ route('crewmedicals.update_attachment') }}",
                            data: {'id':id,'_token': '{{ csrf_token() }}'},
                            dataType: 'json',
                            type: 'POST',
                            success: function ( data ) {
                                toastr.success(data.success);
                                medical.ajax.reload();
                                $('form[name=form_medical] .custom-file').show();
                                $('form[name=form_medical] #remove').hide();
                            }
                        });
                    }
                });
              })

    }
  </script>
