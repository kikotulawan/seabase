@extends('layouts.app')
@section('title', 'Agents')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Agents</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @include('agents.form')
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Agent</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Fax</th>
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
  $(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        lengthChange:false,
        pageLength: 5,
        ajax: "{{ route('allAgents') }}",
        columns: [
            {data: 'agent', name: 'agent'},
            {data: 'address', name: 'address'},
            {data: 'telephone', name: 'telephone'},
            {data: 'fax', name: 'fax'},
            {data: 'options', name: 'options', orderable: false, searchable: false},
        ],
        @can('agents-create')
        dom: "Bfrtip",
            buttons: {
            buttons: [
                {
                text: "Create New",
                    action: function(e, dt, node, config) {
                        $('#modal .modal-title').html('New');
                        clearForm('#form');
                        $('#modal').modal('show');
                    }
                }
            ],
            dom: {
                button: {
                tag: "button",
                className: "btn btn-default btn-group-vertical"
                },
                buttonLiner: {
                tag: null
                }
            }
        },
        @endcan
        columnDefs: [
          { width: "100px", targets: 0 },
          { width: "110px", targets: 1 },
          { width: "15px", targets: 2 },
          { width: "15px", targets: 3 },
          { width: "20px", targets: 4 }
        ],
    });



    $('#form').submit(function (e) {
        e.preventDefault();

        var url;
        if($('#id').val()===""){
          url="{{ route('agents.store') }}";
        }else{
          url="{{ route('agents.update') }}";
        }
        $.ajax({
          data: $('#form').serialize(),
          url: url,
          type: "POST",
          dataType: 'json',
          success: function (data) {

            $('#modal').modal('hide');
            table.draw();
            toastr.success(data.success);
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
      });
    });
    //edit
    $('.data-table').on('click', '.edit', function () {
      var id = $(this).data("id");
      $.get("{{ route('agents.index') }}" +'/' + id +'/edit', function (data) {
          clearForm('#form');
          $('#modal .modal-title').html('Edit');
          $('#modal').modal('show');
          $('#id').val(data.id);
          $('#agent').val(data.agent);
          $('#address').val(data.address);
          $('#fax').val(data.fax);
          $('#telephone').val(data.telephone);
      });
    });
    //delete
    $('.data-table').on('click', '.delete', function () {

      var id = $(this).data("id");
      $confirm =confirm("Are You sure want to delete !");

      if($confirm == true ){
          $.ajax({
              type: "DELETE",
              url: "{{ route('agents.store') }}"+'/'+id,
              success: function (data) {
                  table.draw();
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
