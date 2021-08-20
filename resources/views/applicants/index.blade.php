@extends('layouts.app')
@section('title', 'Applicants')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Applicants</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>E-Registration</th>
                <th>Applicant Name</th>
                <th>Position Applied</th>
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
                     "url": "{{ url('allApplicants') }}",
                     "dataType": "json",
                     "type": "GET",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "crew_no" },
                { "data": "crew_name" },
                { "data": "rank" },
                { "data": "status" },
                {
                    'data': 'application_date',
                    'render': function (data) {
                        return moment(data).format("DD-MMM-YYYY");
                    }
                },
                { "data": "options" }
            ]	,
            @can('applicant-can-create')
            dom: "lBtipr",
                buttons: {
                  buttons: [
                    {
                      text: "New Applicant",
                      action: function(e, dt, node, config) {
                          location.href='./applicants/create';
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
