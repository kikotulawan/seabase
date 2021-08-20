@extends('layouts.app')
@section('title', 'Disembarkation')
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
            <h3 class="card-title">Disembarkation</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Code</th>
                <th>Status Code</th>
                <th>Principal Person</th>
                <th>Vessel</th>
                <th>Actual Disembarkation</th>
                <th>Embarkation Place</th>
                <th>Disembarkation Date</th>
                <th>Place</th>
                <th>Arrival Manila</th>
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
            "ajax":{
                     "url": "{{ url('allDisembarkations') }}",
                     "dataType": "json",
                     "type": "GET",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "code" },
                { "data": "status.status" },
                { "data": "principal" },
                { "data": "vessel" },
                {
                    'data': 'arrival_date',
                    'render': function (data) {
                        if(data!=null){
                            return moment(data).format("DD-MMM-YYYY");
                        }else{
                            return '';
                        }

                    }
                },
                { "data": "embarkationplace" },
                {
                    'data': 'disembarkation_date',
                    'render': function (data) {
                        if(data!=null){
                            return moment(data).format("DD-MMM-YYYY");
                        }else{
                            return '';
                        }
                    }
                },
                { "data": "embarkationplace" },
                {
                    'data': 'disembarkationplace.seaport',
                    'render': function (data) {
                        if(data!=null){
                            return data;
                        }else{
                            return '';
                        }
                    }
                },
                { "data": "options" }
            ],
            "columnDefs": [

                {
                    "targets": [ 1,2,3,4,5,6,7],

                    "orderable": false
                },
                // {
                //     "targets":  0,
                //     "visible": false
                // }
            ],
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
