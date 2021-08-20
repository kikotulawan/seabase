<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="document" name="document">
        <thead>
        <tr>
          <th>Document</th>
          <th>Document No.</th>
          <th>Issue Date</th>
          <th>Expiry Date</th>
          <th>Issued By</th>
          <th>Place Issued</th>
          <th>File</th>
          <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
</div>
  <!-- MODAL -->
  <div class="modal fade" id="document_modal" tabindex="-1" role="dialog" aria-labelledby="document_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_document" name="form_document">
          @csrf
        <div class="modal-body">
          <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
          <input type="hidden" name="crew_no" id="crew_no" value="{{ $crew->crew_no }}">
          <input type="hidden" name="id" id="id">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="document_id" class="col-form-label">Document</label>
                <select name="document_id" id="document_id" class="form-control select2"></select>
                <small id="document_id_help" class="text-danger"></small>
              </div>

              <div class="form-group col-md-6">
                <label for="document_number" class="col-form-label">Document Number</label>
                <input type="text" id="document_number" name="document_number" class="form-control">
                <small id="document_number_help" class="text-danger"></small>
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
                    <label for="place_issued" class="col-form-label">Place Issued</label>
                    <textarea name="place_issued" id="place_issued" rows="2" class="form-control"></textarea>

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
    var crew_document;
    function crew_document(){
        $('form[name=form_document] #remove').hide();
        crew_document = $('#document').DataTable({

                  searching:false,
                  lengthChange:false,

                  ajax: "{{ route('documents',$crew->id) }}",
                  columns: [
                      {data: 'document.document', name: 'document.document'},
                      {data: 'document_number', name: 'document_number'},
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
                              $('#form_document')[0].reset();
                              $('#form_document').find('input,small').removeClass('is-invalid').text('');
                              $('#document_modal').modal('show');
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
                    url:"{{ route('getDocument') }}",
                    success:function(res)
                    {
                            if(res)
                            {
                                  $("form[name=form_document] #document_id").empty();
                                  $("form[name=form_document] #document_id").append('<option value="">Select Document</option>');
                                  $.each(res,function(key,value){
                                    $('form[name=form_document] #document_id').append('<option value="'+key+'">'+value+'</option>');
                                    //console.log(key + ' ' + value)
                                  });
                            }
                    }
              });


              $('#form_document').submit(function(e){
                  $('#form_document').find('input,small').removeClass('is-invalid').text('');
                  event.preventDefault(e);
                  var form=$('#form_document')[0];
                  var formData=new FormData(form);
                  var url;

                  if($('form[name=form_document] #id').val()===""){
                      url="{{ route('crewdocuments.store') }}";
                  }else{
                      url="{{ route('crewdocuments.update') }}";
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
                      crew_document.ajax.reload();
                      $('#form_document')[0].reset();
                      $('#form_document').find('input,small').removeClass('is-invalid').text('');
                      $('#document_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                              $('form[name=form_document] #' +key).addClass('is-invalid');
                              $('form[name=form_document] #' +key).focus();
                              $('form[name=form_document] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
              });

              $('#document').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#form_document').find('input,small').removeClass('is-invalid').text('');
                  $.get("{{ route('crewdocuments.index') }}" +'/' + id +'/edit', function (data) {
                      $('form[name=form_document]')[0].reset();
                      $('#document_modal .modal-title').html('Edit');
                      $('#document_modal').modal('show');

                      $('form[name=form_document] #id').val(data.id);
                      $('form[name=form_document] #document_id').val(data.document_id).attr('selected','selected').trigger('change');;
                      $('form[name=form_document] #document_number').val(data.document_number);
                      $('form[name=form_document] #issue_date').val(moment(data.issue_date).format("DD-MMM-YYYY"));
                      $('form[name=form_document] #expiry_date').val(moment(data.expiry_date).format("DD-MMM-YYYY"));
                      $('form[name=form_document] #issued_by').val(data.issued_by);
                      $('form[name=form_document] #place_issued').val(data.place_issued);
                      if(data.file_path!=null){
                        $('form[name=form_document] .custom-file').hide();
                        $('form[name=form_document] #remove').show();
                      }else{
                        $('form[name=form_document] #remove').hide();
                        $('form[name=form_document] .custom-file').show();
                      }


                  });
              });


              $('#document').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                        data: {"_token": "{{ csrf_token() }}"},
                          type: "DELETE",
                          url: "{{ route('crewdocuments.store') }}"+'/'+id,
                          success: function (data) {
                            crew_document.ajax.reload();
                              toastr.error('Record successfully deleted');
                          },
                          error: function (data) {
                              console.log('Error:', data);
                          }
                      });
                  }
              });

              $('form[name=form_document] #remove').on('click',function(e){
                e.preventDefault();
                var id=$('form[name=form_document] #id').val();
                bootbox.confirm("Are you sure you want remove attached file?", function (result) {
                    if (result) {
                        $.ajax({
                            url: "{{ route('crewdocuments.update_attachment') }}",
                            data: {'id':id,'_token':'{{ csrf_token() }}'},
                            dataType: 'json',
                            type: 'POST',
                            success: function ( data ) {
                                toastr.success(data.success);
                                crew_document.ajax.reload();
                                $('form[name=form_document] .custom-file').show();
                                $('form[name=form_document] #remove').hide();
                            }
                        });
                    }
                });
              })

    }
  </script>
