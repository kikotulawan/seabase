<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="table-incident" name="table-incident">
        <thead>
        <tr>
          <th>Vessel</th>
          <th>Rank</th>
          <th>Date of Illness</th>
          <th>Date of Repatration</th>
          <th>Description</th>
          <th>Type of Illness/Injury</th>
          <th>Disability</th>
          <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
</div>
  <!-- MODAL -->
  <div class="modal fade" id="incident_modal" tabindex="-1" role="dialog" aria-labelledby="incident_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_incident" name="form_incident">
          @csrf
        <div class="modal-body">
          <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
          <input type="hidden" name="id" id="id">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="vessel_id" class="col-form-label">Vessel</label>
                    <select name="vessel_id" id="vessel_id" class="form-control select2"></select>
                    <small id="vessel_id_help" class="text-danger"></small>
                </div>
                <div class="form-group col-md-6">
                    <label for="incident_rank_id" class="col-form-label">Rank</label>
                    <select name="incident_rank_id" id="incident_rank_id" class="form-control select2"></select>
                    <small id="incident_rank_id_help" class="text-danger"></small>
                </div>
                <div class="col-md-6">
                    <label for="incident_date">Date of Illness/Injury</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control date " id="incident_date" name="incident_date">
                    </div>
                    <small id="incident_date_help" class="text-danger"></small>
                </div>
                <div class="col-md-6">
                    <label for="repatriation_date">Date of Repatriation</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control date " id="repatriation_date" name="repatriation_date">
                    </div>
                    <small id="repatriation_date_help" class="text-danger"></small>
                </div>
                <div class="form-group col-md-12">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea name="description" id="description" rows="2" class="form-control"></textarea>
                    <small id="description_help" class="text-danger"></small>
                </div>

                <div class="form-group col-md-6">
                    <label for="incident_type" class="col-form-label">Type of Illness/Injury</label>
                    <select name="incident_type" id="incident_type" class="form-control select2">
                        <option value="">Select</option>
                        <option value="Work">Work</option>
                        <option value="Non-Work">Non-Work</option>
                    </select>
                    <small id="incident_type_help" class="text-danger"></small>
                </div>
                <div class="form-group col-md-6">
                    <label for="disability" class="col-form-label">Disability</label>
                    <select name="disability" id="disability" class="form-control select2">
                        <option value="">Select</option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <small id="disability_help" class="text-danger"></small>
                </div>
                <div class="form-group col-md-12">
                    <label for="incident_clinic_id" class="col-form-label">Clinic</label>
                    <select name="incident_clinic_id" id="incident_clinic_id" class="form-control select2"></select>
                    <small id="incident_clinic_id_help" class="text-danger"></small>
                </div>
                <div class="col-md-6">
                    <label for="pronounced_date">Date Pronounced</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control date " id="pronounced_date" name="pronounced_date">
                    </div>
                    <small id="pronounced_date_help" class="text-danger"></small>
                </div>
                <div class="col-md-6">
                    <label for="settled_date">Date Settled</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control date " id="settled_date" name="settled_date">
                    </div>
                    <small id="settled_date_help" class="text-danger"></small>
                </div>
                <div class="form-group col-md-12">
                    <label for="status" class="col-form-label">Disability</label>
                    <select name="status" id="status" class="form-control select2">
                        <option value="">Select</option>
                        <option value="On-Going">On-Going</option>
                        <option value="Stop Treatment">Stop Treatment</option>
                        <option value="Disability Grading">Disability Grading</option>
                        <option value="Fit to Work">Fit to Work</option>
                    </select>
                    <small id="dstatus_help" class="text-danger"></small>
                </div>
                <div class="form-group col-md-12">
                    <label for="remarks" class="col-form-label">Remarks</label>
                    <textarea name="remarks" id="remarks" rows="2" class="form-control"></textarea>

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
    var crew_incident;
    function incidents(){
        $('form[name=form_incident] #remove').hide();
        crew_incident = $('#table-incident').DataTable({

                searching:false,
                lengthChange:false,
                responsive:true,
                ajax: "{{ route('crewincident',$crew->id) }}",
                columns: [
                    {data: 'vessel.vessel_name', name: 'vessel.vessel_name'},
                    {data: 'rank.rank', name: 'rank.rank'},
                    {
                        data: 'incident_date',
                        render: function (data) {
                            return moment(data).format("DD-MMM-YYYY");
                        }
                    },
                    {
                        data: 'repatriation_date',
                        render: function (data) {
                            return moment(data).format("DD-MMM-YYYY");
                        }
                    },
                    {data: 'description', name: 'description'},
                    {data: 'incident_type', name: 'incident_type'},
                    {data: 'disability', name: 'disability'},

                    {data: 'options', name: 'options', orderable: false, searchable: false}

                ],
            //   columnDefs: [
            //     { width: "30%", targets: 0 },
            //     { width: "20%", targets: 1 },
            //     { width: "10%", targets: 2 },
            //     { width: "10%", targets: 3 },
            //     { width: "20%", targets: 4 },
            //     { width: "10%", targets: 5 },
            //     { width: "20%", targets: 6 },

            //   ],
                dom: "lBtipr",
                    buttons: {
                    buttons: [
                        {
                        text: "Add New",
                        action: function(e, dt, node, config) {
                            $('#form_incident')[0].reset();
                            $('#formform_incident_document').find('input,small').removeClass('is-invalid').text('');
                            $('#incident_modal').modal('show');
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
                url:"{{ route('getVessel') }}",
                success:function(res)
                {
                        if(res)
                        {
                                $("form[name=form_incident] #vessel_id").empty();
                                $("form[name=form_incident] #vessel_id").append('<option value="">Select Vessel</option>');
                                $.each(res,function(key,value){
                                $('form[name=form_incident] #vessel_id').append('<option value="'+value.id+'">'+value.vessel_name+'</option>');
                                //console.log(key + ' ' + value)
                                });
                        }
                }
            });

            $.ajax({
                type:"get",
                url:"{{ route('getRank') }}",
                success:function(res)
                {
                        if(res)
                        {
                                $("form[name=form_incident] #incident_rank_id").empty();
                                $("form[name=form_incident] #incident_rank_id").append('<option value="">Select Rank</option>');
                                $.each(res,function(key,value){
                                $('form[name=form_incident] #incident_rank_id').append('<option value="'+value.id+'">'+value.rank+'</option>');
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
                                $("form[name=form_incident] #incident_clinic_id").empty();
                                $("form[name=form_incident] #incident_clinic_id").append('<option value="">Select Clinic</option>');
                                $.each(res,function(key,value){
                                $('form[name=form_incident] #incident_clinic_id').append('<option value="'+value.id+'">'+value.clinic+'</option>');
                                //console.log(key + ' ' + value)
                                });
                        }
                }
            });
            //save
            $('#form_incident').submit(function(e){
                  $('#form_incident').find('input,small').removeClass('is-invalid').text('');
                  event.preventDefault(e);
                  var form=$('#form_incident')[0];
                  var formData=new FormData(form);
                  var url;

                  if($('form[name=form_incident] #id').val()===""){
                      url="{{ route('crewincidents.store') }}";
                  }else{
                      url="{{ route('crewincidents.update') }}";
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
                      crew_incident.ajax.reload();
                      $('#form_incident')[0].reset();
                      $('#form_incident').find('input,small').removeClass('is-invalid').text('');
                      $('#incident_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                              $('form[name=form_incident] #' +key).addClass('is-invalid');
                              $('form[name=form_incident] #' +key).focus();
                              $('form[name=form_incident] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
            });
            //edit
            $('#table-incident').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#form_incident').find('input,small').removeClass('is-invalid').text('');
                  $.get("{{ route('crewincidents.index') }}" +'/' + id +'/edit', function (data) {
                        $('form[name=form_incident]')[0].reset();
                        $('#incident_modal .modal-title').html('Edit');
                        $('#incident_modal').modal('show');

                        $('form[name=form_incident] #id').val(data.id);
                        $('form[name=form_incident] #vessel_id').val(data.vessel_id).attr('selected','selected').trigger('change');
                        $('form[name=form_incident] #incident_rank_id').val(data.incident_rank_id).attr('selected','selected').trigger('change');
                        $('form[name=form_incident] #incident_date').val(moment(data.incident_date).format("DD-MMM-YYYY"));
                        $('form[name=form_incident] #repatriation_date').val(moment(data.repatriation_date).format("DD-MMM-YYYY"));
                        $('form[name=form_incident] #description').val(data.description);
                        $('form[name=form_incident] #incident_type').val(data.incident_type).attr('selected','selected').trigger('change');;
                        $('form[name=form_incident] #disability').val(data.disability).attr('selected','selected').trigger('change');;
                        $('form[name=form_incident] #incident_clinic_id').val(data.incident_clinic_id).attr('selected','selected').trigger('change');;
                        $('form[name=form_incident] #pronounced_date').val(moment(data.pronounced_date).format("DD-MMM-YYYY"));
                        $('form[name=form_incident] #settled_date').val(moment(data.settled_date).format("DD-MMM-YYYY"));
                        $('form[name=form_incident] #status').val(data.status).attr('selected','selected').trigger('change');;
                        $('form[name=form_incident] #remarks').val(data.remarks);

                  });
            });
            //delete
            $('#table-incident').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                        data: {"_token": "{{ csrf_token() }}"},
                          type: "DELETE",
                          url: "{{ route('crewincidents.store') }}"+'/'+id,
                          success: function (data) {
                                crew_incident.ajax.reload();
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
