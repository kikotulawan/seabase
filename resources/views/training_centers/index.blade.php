@extends('layouts.app')
@section('title', 'Training Centers')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Training Centers</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @include('training_centers.form')
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Center Name</th>
                <th>Code</th>
                <th>Telephone</th>
                <th>Contact Person</th>
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
        ajax: "{{ route('allTrainingCenters') }}",
        columns: [
            {data: 'center', name: 'center'},
            {data: 'code', name: 'code'},
            {data: 'telephone', name: 'telephone'},
            {data: 'contact_person', name: 'contact_person'},
            {data: 'options', name: 'options', orderable: false, searchable: false}
        ],
        @can('training-center-create')
        dom: "lBtipr",
            buttons: {
            buttons: [
                {
                text: "Create New",
                    action: function(e, dt, node, config) {
                        $('#modal .modal-title').html('New');
                        $('#form')[0].reset();
                        $('#form').find('input, select,small').removeClass('is-invalid').text('');
                        $('#modal').modal('show');
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
        },
        @endcan
        columnDefs: [
          { width: "40%", targets: 0 },
          { width: "5%", targets: 1 },
          { width: "10%", targets: 2 },
          { width: "15%", targets: 3 },
          { width: "10%", targets: 4 }
        ],
    });


    $('#form').submit(function (e) {
        e.preventDefault();

        $('#form').find('input,small').removeClass('is-invalid').text('');
        var url;
        if($('#id').val()===""){
          url="{{ route('training_centers.store') }}";
        }else{
          url="{{ route('training_centers.update') }}";
        }
        $.ajax({
          data: $('#form').serialize(),
          url: url,
          type: "POST",
          dataType: 'json',
          success: function (data) {
            $('#form').trigger("reset");
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
      $.get("{{ route('training_centers.index') }}" +'/' + id +'/edit', function (data) {
          $('form[name=form]')[0].reset();
          $('#modal .modal-title').html('Edit Training Center');
          $('#form').find('input,small').removeClass('is-invalid').text('');
          $('#modal').modal('show');
          $('#id').val(data.id);
          $('#code').val(data.code);
          $('#center').val(data.center);
          $('#code').val(data.code);
          $('#telephone').val(data.telephone);
          $('#contact_person').val(data.contact_person);
          $('#remarks').val(data.remarks);
          $('#address').val(data.address);

      });
    });
    //delete
    $('.data-table').on('click', '.delete', function () {

      var id = $(this).data("id");
      $confirm =confirm("Are You sure want to delete !");

      if($confirm == true ){
          $.ajax({
              type: "DELETE",
              url: "{{ route('training_centers.store') }}"+'/'+id,
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
