@extends('layouts.app')
@section('title', 'Embarkation')
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
            <h3 class="card-title">Embarkation</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Status Code</th>
                <th>Principal Person</th>
                <th>Vessel</th>
                <th>Departure Date Manila</th>
                <th>Embarkation Date Manila</th>
                <th>Embarkation Place</th>
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


      table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            lengthChange:false,
            pageLength: 5,
            "order": [[ 0, "asc" ]],
            "ajax":{
                     "url": "{{ url('allEmbarkations') }}",
                     "dataType": "json",
                     "type": "GET",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "code" },
                { "data": "status.status" },
                { "data": "principal" },
                { "data": "vessel" },
                {
                    'data': 'departure_date',
                    'render': function (data) {
                        return moment(data).format("DD-MMM-YYYY");
                    }
                },
                {
                    'data': 'embarkation_date',
                    'render': function (data) {
                        return moment(data).format("DD-MMM-YYYY");
                    }
                },
                { "data": "embarkationplace" },
                { "data": "options" }
            ],
            "columnDefs": [

                {
                    "targets": [ 1,2,3,4,5,6,7],

                    "orderable": false
                },
                {
                    "targets":  0,
                    "visible": false
                }
            ],
            @can('embarkation-create')
            dom: "lBtipr",
                buttons: {
                buttons: [
                    {
                        text: "Create New",
                        action: function(e, dt, node, config) {
                            location.href='./embarkations/create';
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
            @endcan
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
                          url: "{{ route('embarkations.store') }}"+'/'+id,
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
