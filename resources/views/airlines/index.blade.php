@extends('layouts.app')
@section('title', 'Airlines')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Airlines</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @include('airlines.form')
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Code</th>
                <th>Airline</th>
                <th width="20px"></th>
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
    var url;
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        lengthChange:false,
        pageLength: 5,
        ajax: "{{ route('allAirlines') }}",
        columns: [
            {data: 'code', name: 'agent_name'},
            {data: 'airline', name: 'airline'},
            {data: 'options', name: 'options', orderable: false, searchable: false}
        ],
        @can('airlines-create')
        dom: "lBftipr",
            buttons: {
            buttons: [
                {
                text: "Create New",
                    action: function(e, dt, node, config) {
                        url="{{ route('airlines.store') }}";
                        $('#modal .modal-title').html('New');
                        $('#form').trigger('reset');
                        $('#form').find('input, select,small').removeClass('is-invalid').text('');
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
          { width: "10%", targets: 0 },
          { width: "77%", targets: 1 }
        ],
    });

    $('#modal').on('hidden.bs.modal', function () {
        $('#form').find('input, select,small').val('');
    });
    $('#form').submit(function (e) {
        e.preventDefault();

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
      url="{{ route('airlines.update') }}";
      $.get("{{ route('airlines.index') }}" +'/' + id +'/edit', function (data) {
          $('#form').trigger('reset');
          $('#form').find('input, select,small').removeClass('is-invalid').text('');
          $('#modal .modal-title').html('Edit Airline');
          $('#modal').modal('show');
          $('#id').val(data.id);
          $('#code').val(data.code);
          $('#airline').val(data.airline);

      });
    });
    //delete
    $('.data-table').on('click', '.delete', function () {

      var id = $(this).data("id");
      $confirm =confirm("Are You sure want to delete !");

      if($confirm == true ){
          $.ajax({
              type: "DELETE",
              url: "{{ route('airlines.store') }}"+'/'+id,
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
