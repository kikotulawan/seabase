<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="vacc" name="vacc">
        <thead>
        <tr>
          <th>Vaccine</th>
          <th>Immunization Date</th>
          <th>Expiry Date</th>
          <th>File</th>
          <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
</div>




    <!-- MODAL -->
    <div class="modal fade" id="vaccine_modal" tabindex="-1" role="dialog" aria-labelledby="vaccine_modal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Add New</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form_vaccine" name="form_vaccine">
            @csrf
          <div class="modal-body">
            <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
            <input type="hidden" id="crew_no" name="crew_no" value="{{ $crew->crew_no}}">
            <input type="hidden" name="id" id="id">

                <div class="form-group">
                  <label for="vaccine_id" class="col-form-label">Vaccine</label>
                  <select name="vaccine_id" id="vaccine_id" class="form-control select2"></select>
                  <small id="vaccine_id_help" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="immunization_date" class="col-form-label">Immunization Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control date " id="immunization_date" name="immunization_date" >

                    </div>
                    <small id="immunization_date_help" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="expiry_date" class="col-form-label">Expiry Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control date " id="expiry_date" name="expiry_date" >

                    </div>
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
       var vaccine;
       function vaccine(){
        $('form[name=form_vaccine] #remove').hide();
        vaccine = $('#vacc').DataTable({

                  searching:false,
                  lengthChange:false,
                  pageLength: 2,
                  scrolly:true,
                  ajax: "{{ route('vaccines',$crew->id) }}",
                  columns: [
                      {data: 'vaccine.vaccine', name: 'vaccine.vaccine'},
                      {
                        data: 'immunization_date',
                        render: function (data) {
                            return moment(data).format("DD-MMM-YYYY");
                        }
                     },
                     {
                        data: 'expiry_date',
                        render: function (data) {
                            if(data!=null){
                                return moment(data).format("DD-MMM-YYYY");
                            }else{
                                return '';
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
                      { width: "25%", targets: 0 },
                      { width: "15%", targets: 1 },
                      { width: "15%", targets: 2 },
                      { width: "15%", targets: 3 },
                      { width: "15%", targets: 4 },
                  ],
                  dom: "lBtipr",
                      buttons: {
                        buttons: [
                          {
                            text: "Add New",
                            action: function(e, dt, node, config) {
                              $('#form_vaccine')[0].reset();
                              $('#form_vaccine').find('input,small').removeClass('is-invalid').text('');
                              $('#vaccine_modal').modal('show');
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
                    url:"{{ route('getVaccine') }}",
                    success:function(res)
                    {
                            if(res)
                            {
                                  $("form[name=form_vaccine] #vaccine_id").empty();
                                  $("form[name=form_vaccine] #vaccine_id").append('<option value="">Select Vaccine</option>');
                                  $.each(res,function(key,value){
                                    $('form[name=form_vaccine] #vaccine_id').append('<option value="'+key+'">'+value+'</option>');
                                    //console.log(key + ' ' + value)
                                  });
                            }
                    }
              });
              $('#form_vaccine').submit(function(e){

                  event.preventDefault(e);
                  var form=$('#form_vaccine')[0];
                  var formData=new FormData(form);
                  var url;

                  if($('form[name=form_vaccine] #id').val()===""){
                      url="{{ route('crewvaccines.store') }}";
                  }else{
                      url="{{ route('crewvaccines.update') }}";
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
                      vaccine.ajax.reload();

                      $('#vaccine_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                              $('form[name=form_vaccine] #' +key).addClass('is-invalid');
                              $('form[name=form_vaccine] #' +key).focus();
                              $('form[name=form_vaccine] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
              });

              $('#vacc').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#form_vaccine').find('input,small').removeClass('is-invalid').text('');
                  $.get("{{ route('crewvaccines.index') }}" +'/' + id +'/edit', function (data) {
                      $('form[name=form_vaccine]')[0].reset();
                      $('#vaccine_modal .modal-title').html('Edit');
                      $('#vaccine_modal').modal('show');

                      $('form[name=form_vaccine] #id').val(data.id);
                      $('form[name=form_vaccine] #vaccine_id').val(data.vaccine_id).attr('selected','selected').trigger('change');;
                      $('form[name=form_vaccine] #immunization_date').val(moment(data.immunization_date).format("DD-MMM-YYYY"));
                      if(data.expiry_date!=null){
                        $('form[name=form_vaccine] #expiry_date').val(moment(data.expiry_date).format("DD-MMM-YYYY"));
                      }
                      if(data.file_path!=null){
                        $('form[name=form_vaccine] .custom-file').hide();
                        $('form[name=form_vaccine] #remove').show();
                      }else{
                        $('form[name=form_vaccine] #remove').hide();
                        $('form[name=form_vaccine] .custom-file').show();
                      }

                  });
              });
              $('#vacc').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                        data: {"_token": "{{ csrf_token() }}"},
                          type: "DELETE",
                          url: "{{ route('crewvaccines.store') }}"+'/'+id,
                          success: function (data) {
                              vaccine.ajax.reload();
                              toastr.error(data.success);
                          },
                          error: function (data) {
                              console.log('Error:', data);
                          }
                      });
                  }
              });
              $('form[name=form_vaccine] #remove').on('click',function(e){
                e.preventDefault();
                var id=$('form[name=form_vaccine] #id').val();
                bootbox.confirm("Are you sure you want remove attached file?", function (result) {
                    if (result) {
                        $.ajax({
                            url: "{{ route('crewvaccines.update_attachment') }}",
                            data: {"_token": "{{ csrf_token() }}",'id':id},

                            dataType: 'json',
                            type: 'POST',
                            success: function ( data ) {
                                toastr.success(data.success);
                                vaccine.ajax.reload();
                                $('form[name=form_vaccine] .custom-file').show();
                                $('form[name=form_vaccine] #remove').hide();
                            }
                        });
                    }
                });
              })
       }

    </script>
