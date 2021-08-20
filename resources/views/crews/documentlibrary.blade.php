<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="document_library" name="document_library">
        <thead>
        <tr>
          <th>Document Name</th>
          <th>File</th>
          <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
</div>


    <!-- MODAL -->
    <div class="modal fade" id="documentlibrary_modal" tabindex="-1" role="dialog" aria-labelledby="documentlibrary_modal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Add New</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form_document_library" name="form_document_library">
            @csrf
          <div class="modal-body">
            <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="crew_no" id="crew_no" value="{{ $crew->crew_no }}">
                <div class="form-group">
                  <label for="document_name" class="col-form-label">Document Name</label>
                  <input type="text" class="form-control" id="document_name" name="document_name">
                  <small id="document_name_help" class="text-danger"></small>
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
       var document_library;
       function document_library(){
        $('form[name=form_document_library] #remove').hide();
        document_library = $('#document_library').DataTable({

                  searching:false,
                  lengthChange:false,
                  pageLength: 2,

                  ajax: "{{ route('documentlibraries',$crew->id) }}",
                  columns: [
                      {data: 'document_name', name: 'document_name'},
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
                      { width: "38%", targets: 0 },
                      { width: "35%", targets: 1 },
                      { width: "15%", targets: 2 }
                  ],
                  dom: "lBtipr",
                      buttons: {
                        buttons: [
                          {
                            text: "Add New",
                            action: function(e, dt, node, config) {
                              $('#form_document_library')[0].reset();
                              $('#form_document_library').find('input,small').removeClass('is-invalid').text('');
                              $('#documentlibrary_modal').modal('show');
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


              $('#form_document_library').submit(function(e){

                  event.preventDefault(e);
                  var form=$('#form_document_library')[0];
                  var formData=new FormData(form);
                  var url;

                  if($('form[name=form_document_library] #id').val()===""){
                      url="{{ route('crewdocumentlibraries.store') }}";
                  }else{
                      url="{{ route('crewdocumentlibraries.update') }}";
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
                      document_library.ajax.reload();

                      $('#documentlibrary_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                              $('form[name=form_document_library] #' +key).addClass('is-invalid');
                              $('form[name=form_document_library] #' +key).focus();
                              $('form[name=form_document_library] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
              });

              $('#document_library').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#form_document_library').find('input,small').removeClass('is-invalid').text('');
                  $.get("{{ route('crewdocumentlibraries.index') }}" +'/' + id +'/edit', function (data) {
                      $('form[name=form_document_library]')[0].reset();
                      $('#documentlibrary_modal .modal-title').html('Edit');
                      $('#documentlibrary_modal').modal('show');

                      $('form[name=form_document_library] #id').val(data.id);
                      $('form[name=form_document_library] #document_name').val(data.document_name);
                      if(data.file_path!=null){
                        $('form[name=form_document_library] .custom-file').hide();
                        $('form[name=form_document_library] #remove').show();
                      }else{
                        $('form[name=form_document_library] #remove').hide();
                        $('form[name=form_document_library] .custom-file').show();
                      }

                  });
              });
              $('#document_library').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                        data: {"_token": "{{ csrf_token() }}"},
                          type: "DELETE",
                          url: "{{ route('crewdocumentlibraries.store') }}"+'/'+id,
                          success: function (data) {
                              document_library.ajax.reload();
                              toastr.error(data.success);
                          },
                          error: function (data) {
                              console.log('Error:', data);
                          }
                      });
                  }
              });

              $('form[name=form_document_library] #remove').on('click',function(e){
                e.preventDefault();
                var id=$('form[name=form_document_library] #id').val();
                bootbox.confirm("Are you sure you want remove attached file?", function (result) {
                    if (result) {
                        $.ajax({
                            url: "{{ route('crewdocumentlibraries.update_attachment') }}",
                            data: {'id':id,'_token': '{{ csrf_token() }}'},
                            dataType: 'json',
                            type: 'POST',
                            success: function ( data ) {
                                toastr.success(data.success);
                                document_library.ajax.reload();
                                $('form[name=form_document_library] .custom-file').show();
                                $('form[name=form_document_library] #remove').hide();
                            }
                        });
                    }
                });
              })

       }

    </script>
