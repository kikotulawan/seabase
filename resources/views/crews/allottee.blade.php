<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="all" name="all">
        <thead>
        <tr>
          <th>Name</th>
          <th>Relationship</th>
          <th>Allotment ($)</th>
          <th>Bank</th>
          <th>Branch</th>
          <th>Account No.</th>
          <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
</div>
  <!-- MODAL -->
  <div class="modal fade" id="allottee_modal" tabindex="-1" role="dialog" aria-labelledby="allottee_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_allottee" name="form_allottee">
          @csrf
        <div class="modal-body">
          <input type="hidden" name="crew_id" id="crew_id" value="{{ $crew->id }}">
          <input type="hidden" name="id" id="id">
            <div class="row">

            <div class="form-group col-md-8">
                <label for="account_name" class="col-form-label">Account Name</label>
                <input type="text" id="account_name" name="account_name" class="form-control">
                <small id="account_name_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-4">
                <label for="relationship" class="col-form-label">Relationship</label>
                <input type="text" id="relationship" name="relationship" class="form-control">
                <small id="relationship_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-6">
                <label for="bank_id" class="col-form-label">Bank</label>
                <select name="bank_id" id="bank_id" class="form-control select2"></select>
                <small id="bank_id_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-6">
                <label for="branch_id" class="col-form-label">Branch</label>
                <select name="branch_id" id="branch_id" class="form-control select2"></select>
                <small id="branch_id_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-8">
                <label for="account_number" class="col-form-label">Account Number</label>
                <input type="text" id="account_number" name="account_number" class="form-control">
                <small id="account_number_help" class="text-danger"></small>
            </div>
            <div class="form-group col-md-4">
                <label for="allotment" class="col-form-label">Allotment</label>
                <input type="text" id="allotment" name="allotment" class="form-control">
                <small id="allotment_help" class="text-danger"></small>
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
    var allottee;
    function allottee(){

        allottee = $('#all').DataTable({

                  searching:false,
                  lengthChange:false,
                  pageLength: 2,
                  ajax: "{{ route('allottees',$crew->id) }}",
                  columns: [
                      {data: 'account_name', name: 'account_name'},
                      {data: 'relationship', name: 'relationship'},
                      {data: 'allotment', name: 'allotment'},
                      {data: 'bank.bank', name: 'bank.bank'},
                      {data: 'branch.branch', name: 'branch.branch'},
                      {data: 'account_number', name: 'account_number'},
                      {data: 'options', name: 'options', orderable: false, searchable: false}

                  ],
                  columnDefs: [
                    { width: "40%", targets: 0 },
                    { width: "5%", targets: 1 },
                    { width: "5%", targets: 2 },
                    { width: "15%", targets: 3 },
                    { width: "15%", targets: 4 },
                    { width: "10%", targets: 5 },
                    { width: "10%", targets: 6 },


                  ],
                  dom: "lBtipr",
                      buttons: {
                        buttons: [
                          {
                            text: "Add New",
                            action: function(e, dt, node, config) {
                              $('form[name=form_allottee]')[0].reset();
                              $('form[name=form_allottee]').find('input,small').removeClass('is-invalid').text('');
                              $('#allottee_modal').modal('show');
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
                    url:"{{ route('getBank') }}",
                    success:function(res)
                    {
                            if(res)
                            {
                                  $("form[name=form_allottee] #bank_id").empty();
                                  $("form[name=form_allottee] #bank_id").append('<option value="">Select Bank</option>');
                                  $.each(res,function(key,value){
                                    $('form[name=form_allottee] #bank_id').append('<option value="'+key+'">'+value+'</option>');
                                  });
                            }
                    }
              });

              $.ajax({
                  type:"get",
                  url:"{{ route('getBranch') }}",
                  success:function(res)
                  {
                          if(res)
                          {
                                $("form[name=form_allottee] #branch_id").empty();
                                $("form[name=form_allottee] #branch_id").append('<option value="">Select Branch</option>');
                                $.each(res,function(key,value){
                                  $('form[name=form_allottee] #branch_id').append('<option value="'+key+'">'+value+'</option>');
                                  //console.log(key + ' ' + value)
                                });
                          }
                  }
              });

              $('form[name=form_allottee]').submit(function(e){
                  $('form[name=form_allottee]').find('input,small').removeClass('is-invalid').text('');
                  $('form[name=form_allottee]').find('select').removeClass('is-invalid');
                  event.preventDefault(e);
                  var form=$('#form_allottee')[0];
                  var formData=new FormData(form);
                  var url;

                  if($('form[name=form_allottee] #id').val()===""){
                      url="{{ route('crewallottees.store') }}";
                  }else{
                      url="{{ route('crewallottees.update') }}";
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
                      allottee.ajax.reload();
                      $('form[name=form_allottee]').find('select').removeClass('is-invalid');
                      $('form[name=form_allottee]')[0].reset();
                      $('form[name=form_allottee]').find('input,small').removeClass('is-invalid').text('');
                      $('#allottee_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                                $('form[name=form_allottee] #' +key).addClass('is-invalid');
                                $('form[name=form_allottee] #' +key).focus();
                                $('form[name=form_allottee] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
              });

              $('#all').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#form_allottee').find('input,small').removeClass('is-invalid').text('');
                  $.get("{{ route('crewallottees.index') }}" +'/' + id +'/edit', function (data) {
                      $('form[name=form_allottee]')[0].reset();
                      $('#allottee_modal .modal-title').html('Edit');
                      $('#allottee_modal').modal('show');

                      $('form[name=form_allottee] #id').val(data.id);
                      $('form[name=form_allottee] #bank_id').val(data.bank_id).attr('selected','selected').trigger('change');;
                      $('form[name=form_allottee] #branch_id').val(data.branch_id).attr('selected','selected').trigger('change');;
                      $('form[name=form_allottee] #account_name').val(data.account_name);
                      $('form[name=form_allottee] #account_number').val(data.account_number);
                      $('form[name=form_allottee] #relationship').val(data.relationship);
                      $('form[name=form_allottee] #allotment').val(data.allotment);
                  });
              });


              $('#all').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                        data: {"_token": "{{ csrf_token() }}"},
                          type: "DELETE",
                          url: "{{ route('crewallottees.store') }}"+'/'+id,
                          success: function (data) {
                              allottee.ajax.reload();
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
