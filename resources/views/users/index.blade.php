@extends('layouts.app')
@section('title', 'User Accounts')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">User Accounts</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @include('users.form')
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Roles</th>
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
    $('.select2').select2()
    $('.select2').select2({
        theme: 'bootstrap4'
    })
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        lengthChange:false,
        pageLength: 5,
        ajax: "{{ route('allUsers') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'position', name: 'position'},
            {
                data: 'roles',
                render: function (data) {
                    return '<label class="badge badge-success">' + data + '</label>';
                }
            },
            {data: 'options', name: 'options', orderable: false, searchable: false}
        ],
        @can('user-accounts-create')
        dom: "lBtipr",
            buttons: {
            buttons: [
                {
                text: "Create New",
                    action: function(e, dt, node, config) {
                        $('#modal .modal-title').html('New');
                        $('#form')[0].reset();
                        $('#form').find('input,small').removeClass('is-invalid').text('');
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
          { width: "30%", targets: 0 },
          { width: "30%", targets: 1 },
          { width: "18%", targets: 2 },
          { width: "10%", targets: 3 },
          { width: "15%", targets: 4 },
        ]

    });

    $('#form').submit(function (e) {
        e.preventDefault();
        $('#form').find('input,small').removeClass('is-invalid').text('');
        var url;
        if($('#id').val()===""){
          url="{{ route('users.store') }}";
        }else{

        }
        $.ajax({
          data: $('#form').serialize(),
          url: url,
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#modal').modal('hide');
              table.ajax.reload();
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
        $.get("{{ route('users.index') }}" +'/' + id +'/edit', function (data) {

            $('#form').find('input,small').removeClass('is-invalid').text('');
            $('#modal .modal-title').html('Edit');
            $('#modal').modal('show');
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('roles').val(data.roles);
            $('.select2').select2(data.roles, null, false);
            // $.each(values.split(","), function(i,e){
            //     $("#strings option[value='" + e + "']").prop("selected", true);
            // });
            // var element = document.getElementsByName('roles');
            // for (var key in data.roles) {
            //     var obj = data.roles[key].name;
            //     element.options[i].selected = values.indexOf(element.options[i].value) >= 0;
            // }
        });
    });
    //delete
    $('.data-table').on('click', '.delete', function () {

      var id = $(this).data("id");
      $confirm =confirm("Are You sure want to delete !");

      if($confirm == true ){
          $.ajax({
              type: "DELETE",
              url: "{{ route('users.store') }}"+'/'+id,
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

  });
</script>
@endsection
