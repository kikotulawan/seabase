@extends('layouts.app')
@section('title', 'Principals')
@push('styles')
<style>

</style>
@endpush
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Principals</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @include('principals.form')
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Principal Name</th>
                <th>Principal Code</th>
                <th>Contact Person</th>
                <th>Country</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

@endsection
@section('scripts')

<script type="text/javascript">

    var table;
    $(document).ready(function(e){

      $('.date').datepicker({
          autoclose: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd',
      });

      $('.select2').select2({
          theme: 'bootstrap4'
      })
      table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            lengthChange:false,
            pageLength: 5,
            "ajax":{
                     "url": "{{ url('allPrincipals') }}",
                     "dataType": "json",
                     "type": "GET",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "principal" },
                { "data": "code" },
                { "data": "code" },
                { "data": "country.country" },
                { "data": "options" }
            ],
            dom: "lBtipr",
                buttons: {
                buttons: [
                    {
                    text: "New Principal",
                    action: function(e, dt, node, config) {
                        $('#form')[0].reset();
                        $('#form').find('input,small').removeClass('is-invalid').text('');
                        $('#modalTitle').text('Add New');
                        $('#modal').modal('show');
                    }
                    }
                ],
                dom: {
                    button: {
                    tag: "button",
                    className: "btn btn-primary"
                    },
                    buttonLiner: {
                    tag: null
                    }
                }
            }

        });


      //insert
      $('#form').submit(function(event){
          $('#form').find('input,small').removeClass('is-invalid').text('');
          $('#form').find('select,small').removeClass('is-invalid');
          event.preventDefault();
          var form=$('#form')[0];
          var formData=new FormData(form);
          var url;
          if($('#id').val()===""){
            url="{{ route('principals.store') }}";
          }else{
            url ="{{ route('principals.update') }}";
          }
          $.ajax({
            url: url,
            type: 'POST',
            data:formData,
            contentType:false,
            processData:false,
            success:function(data)
            {
                $('#modal').modal('hide');
                form.reset();
                table.ajax.reload();
                if($('#id').val()===""){
                  toastr.success('Successfully saved.');
                }else{
                  toastr.success('Successfully updated.');
                }

            },
            error:function(err)
            {
                if(err.status===422){
                  var errors =$.parseJSON(err.responseText);
                  $.each(errors.errors, function(key, value){
                    $('#' +key).addClass('is-invalid');
                    $('#' +key).focus();
                    $('#'+key+"_help").text(value[0]);
                  })
                }
            }
          })
        })
        $('.data-table').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                          type: "DELETE",
                          url: "{{ route('principals.store') }}"+'/'+id,
                          success: function (data) {
                              table.ajax.reload();
                              toastr.error(data.success);
                          },
                          error: function (data) {
                              console.log('Error:', data);
                          }
                      });
                  }
              });
      })


</script>
@endsection
