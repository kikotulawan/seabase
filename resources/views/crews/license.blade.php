
<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="license" name="license">
        <thead>
        <tr>
            <th>Type</th>
            <th>License No.</th>
            <th>Issue Date</th>
            <th>Expiry Date</th>
            <th>Issued By</th>
            <th>File</th>
            <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
</div>



  <!-- MODAL -->
  <div class="modal fade" id="license_modal" tabindex="-1" role="dialog" aria-labelledby="license_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_license" name="form_license">
          @csrf
        <div class="modal-body">
          <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
          <input type="hidden" name="id" id="id">
          <input type="hidden" id="crew_no" name="crew_no" value="{{ $crew->crew_no}}">
            <div class="row">

              <div class="form-group col-md-12">
                <label for="license_id" class="col-form-label">License Type</label>
                <select name="license_id" id="license_id" class="form-control select2"></select>
                <small id="license_id_help" class="text-danger"></small>
              </div>
              <div class="form-group col-md-12">
                <label for="license_number" class="col-form-label">License Number</label>
                <input type="text" id="license_number" name="license_number" class="form-control">
                <small id="license_number_help" class="text-danger"></small>
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
                    <label for="issued_by" class="col-form-label">Issued By</label>
                    <input type="text" id="issued_by" name="issued_by" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label for="remarks" class="col-form-label">Remarks</label>
                    <textarea id="remarks" name="remarks" class="form-control" rows="2"></textarea>

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
    var licensse;

    function license(){
        $('#remove').hide();
        license = $('#license').DataTable({

                  searching:false,
                  lengthChange:false,
                  pageLength: 2,
                  ajax: "{{ route('licenses',$crew->id) }}",
                  columns: [
                      {data: 'license.license', name: 'license.license'},
                      {data: 'license_number', name: 'license_number'},
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
                      {
                        data: 'file_path',
                        render: function (data) {
                        let action = '';

                            if(data!=null){
                                var file_path='/storage/uploads/' + $('#crew_no').val() +'/' +data;

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
                    { width: "20%", targets: 6},

                  ],
                  dom: "lBtipr",
                      buttons: {
                        buttons: [
                          {
                            text: "Add New",
                            action: function(e, dt, node, config) {
                              $('#form_license')[0].reset();
                              $('#form_license').find('input,small').removeClass('is-invalid').text('');
                              $('#license_modal').modal('show');
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
              })

                $.ajax({
                    type:"get",
                    url:"{{ route('getLicense') }}",
                    success:function(res)
                    {
                            if(res)
                            {
                                 $('form[name=form_license] #license_id').empty();
                                 $('form[name=form_license] #license_id').append('<option value="">Select License</option>');
                                 $.each(res,function(key,value){
                                    $('form[name=form_license] #license_id').append('<option value="'+key+'">'+value+'</option>');
                                 });
                            }
                    }
                });

              $('#form_license').submit(function(e){
                  $('#form_license').find('input,small').removeClass('is-invalid').text('');
                  event.preventDefault(e);
                  var form=$('#form_license')[0];
                  var formData=new FormData(form);
                  var url;

                  if($('form[name=form_license] #id').val()===""){
                      url="{{ route('crewlicenses.store') }}";
                  }else{
                      url="{{ route('crewlicenses.update') }}";
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
                      license.ajax.reload();
                      //$('#form_license')[0].reset();
                      $('#form_license').find('input,small').removeClass('is-invalid').text('');
                      $('#license_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                              $('form[name=form_license] #' +key).addClass('is-invalid');
                              $('form[name=form_license] #' +key).focus();
                              $('form[name=form_license] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
              })

              $('#license').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#form_license').find('input,small').removeClass('is-invalid').text('');
                  $.get("{{ route('crewlicenses.index') }}" +'/' + id +'/edit', function (data) {
                      $('form[name=form_license]')[0].reset();
                      $('#license_modal .modal-title').html('Edit');
                      $('#license_modal').modal('show');

                      $('form[name=form_license] #id').val(data.id);
                      $('form[name=form_license] #license_id').val(data.license_id).attr('selected','selected').trigger('change');
                      $('form[name=form_license] #license_number').val(data.license_number);
                      $('form[name=form_license] #issue_date').val(moment(data.issue_date).format("DD-MMM-YYYY"));
                      $('form[name=form_license] #expiry_date').val(moment(data.expiry_date).format("DD-MMM-YYYY"));
                      $('form[name=form_license] #issued_by').val(data.issued_by);
                      $('form[name=form_license] #remarks').val(data.remarks);
                      if(data.file_path!=null){
                        $('form[name=form_license] .custom-file').hide();
                        $('form[name=form_license] #remove').show();
                      }else{
                        $('form[name=form_license] #remove').hide();
                        $('form[name=form_license] .custom-file').show();
                      }


                  });
              })


              $('#license').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                          data: {"_token": "{{ csrf_token() }}"},
                          type: "DELETE",
                          url: "{{ route('crewlicenses.store') }}"+'/'+id,
                          success: function (data) {
                              license.ajax.reload();
                              toastr.error('Record successfully deleted');
                          },
                          error: function (data) {
                              console.log('Error:', data);
                          }
                      });
                  }
              })
              $('form[name=form_license] #remove').on('click',function(e){
                e.preventDefault();
                var id=$('form[name=form_license] #id').val();
                bootbox.confirm("Are you sure you want remove attached file?", function (result) {
                    if (result) {
                        $.ajax({
                            url: "{{ route('crewlicenses.update_attachment') }}",
                            data: {'id':id,'_token': '{{ csrf_token() }}'},
                            dataType: 'json',
                            type: 'POST',
                            success: function ( data ) {
                                toastr.success(data.success);
                                license.ajax.reload();
                                $('form[name=form_license] .custom-file').show();
                                $('form[name=form_license] #remove').hide();
                            }
                        });
                    }
                });
              })

    }
  </script>
