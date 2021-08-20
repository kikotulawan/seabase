<table class="table table-bordered table-hover data-table w-100" id="principal_contact" name ="principal_contact">
    <thead>
    <tr>
      <th>Name</th>
      <th>Position</th>
      <th>Contact No</th>
      <th>Email Address</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    </tbody> 
</table>

<!-- MODAL -->
<div class="modal fade" id="principal_contact_modal" tabindex="-1" role="dialog" aria-labelledby="principal_contact_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_principal_contact" name="form_principal_contact">
          @csrf
        <div class="modal-body">
          <input type="hidden" name="principal_id" id="principal_id" value="{{ $principal->id }}">
          <input type="hidden" name="id" id="id">
            
            <div class="form-group">
              <label for="name" class="col-form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name">
              <small id="name_help" class="text-danger"></small>
            </div>
            <div class="form-group">
              <label for="position" class="col-form-label">Position</label>
              <input type="text" class="form-control" id="position" name="position">
              
            </div>
            <div class="form-group">
              <label for="contact_number" class="col-form-label">Contact No.</label>
              <input type="text" class="form-control" id="contact_number" name="contact_number">
              <small id="contact_number_help" class="text-danger"></small>
            </div>
            <div class="form-group">
              <label for="email_address" class="col-form-label">Email Address</label>
              <input type="text" class="form-control" id="email_address" name="email_address">
              <small id="email_address_help" class="text-danger"></small>
            </div>
            <div class="form-group pl-3">
              <input type="checkbox" class="form-check-input"  id="active" name="active">Main Contact
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
    var principal_contact;
    function principal_contact(){

      principal_contact = $('#principal_contact').DataTable({
                  searching:false,
                  lengthChange:false,
                  pageLength: 5,
                  autoWidth:true,
                  ajax: "{{ route('principalcontacts',$principal->id) }}",
                  columns: [
                      {data: 'name', name: 'name'},
                      {data: 'position', name: 'position'},
                      {data: 'contact_number', name: 'position'},
                      {data: 'email_address', name: 'position'},
                      {data: 'options', name: 'options', orderable: false, searchable: false}
                      
                  ],
                  columnDefs: [
                      { width: "80%", targets: 0 },                 
                  ],
                  dom: "lBtipr",
                      buttons: {
                        buttons: [
                          {
                            text: "Add New",
                            action: function(e, dt, node, config) {
                              $('#form_principal_contact')[0].reset();
                              $('#form_principal_contact').find('input,small').removeClass('is-invalid').text(''); 
                              $('#principal_contact_modal').modal('show');
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
              
            
              $('#form_principal_contact').submit(function(e){
                  $('form[name=form_principal_contact]').find('input,small').removeClass('is-invalid').text(''); 
                  e.preventDefault();
                  var form=$('#form_principal_contact')[0];
                  var formData=new FormData(form);
                  var url;
                  
                  if($('form[name=form_principal_contact] #id').val()===""){
                      url="{{ route('principalcontacts.store') }}";
                  }else{
                      url="{{ route('principalcontacts.update') }}";
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
                      principal_contact.ajax.reload();
                      $('#form_principal_contact')[0].reset();
                      $('#form_principal_contact').find('input,small').removeClass('is-invalid').text(''); 
                      $('#principal_contact_modal').modal('hide');
                  },
                  error:function(err)
                      {
                          if(err.status===422){
                              var errors =$.parseJSON(err.responseText);
                              $.each(errors.errors, function(key, value){
                              $('form[name=form_principal_contact] #' +key).addClass('is-invalid');
                              $('form[name=form_principal_contact] #' +key).focus();
                              $('form[name=form_principal_contact] #'+key+"_help").text(value[0]);
                              })
                          }
                      }
                  })
              });

              $('#principal_contact').on('click', '.edit', function () {
                  var id = $(this).data("id");
                  $('#form_principal_contact').find('input,small').removeClass('is-invalid').text(''); 
                  $.get("{{ route('principalcontacts.index') }}" +'/' + id +'/edit', function (data) {
                      $('form[name=form_principal_contact]')[0].reset();
                      $('#principal_contact_modal .modal-title').html('Edit');
                      $('#principal_contact_modal').modal('show');
  
                      $('form[name=form_principal_contact] #id').val(data.id);
                      $('form[name=form_principal_contact] #name').val(data.name);
                      $('form[name=form_principal_contact] #position').val(data.position);
                      $('form[name=form_principal_contact] #contact_number').val(data.contact_number);
                      $('form[name=form_principal_contact] #email_address').val(data.email_address);
                      
                   
                  });
              });
              $('#principal_contact').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");
  
                  if($confirm == true ){
                      $.ajax({
                          type: "DELETE",
                          url: "{{ route('principalcontacts.store') }}"+'/'+id,
                          success: function (data) {
                              principal_contact.ajax.reload();
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