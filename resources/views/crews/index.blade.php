@extends('layouts.app')
@section('title', 'Crew Management')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Crew Management</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Crew No</th>
                <th>Crew Name</th>
                <th>Position</th>
                <th>Status</th>
                <th>Application Date</th>
                <th width="80px"></th>
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
            destroy:true,
            processing: true,
            serverSide: true,
            lengthChange:false,
            pageLength: 5,
            "ajax":{
                     "url": "{{ url('allCrews') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "crew_no" },
                { "data": "crew_name" },
                { "data": "rank" },
                { "data": "status" },
                {
                    'data': 'application+date',
                    'render': function (data) {
                        return moment(data).format("DD-MMM-YYYY");
                    }
                },
                { "data": "options" }
            ]

        });


      //delete
      $('.data-table').on('click', '.delete', function () {
        var id = $(this).attr('data-id');
        $confirm = confirm("Are You sure want to delete !");
        if($confirm == true ){
            $.ajax({
                type: "DELETE",
                url: "{{ route('crews.store') }}"+'/'+id,
                success: function (data) {
                    table.ajax.reload();
                    toastr.error('Record successfully deleted');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
      });
   });
</script>
@endsection
