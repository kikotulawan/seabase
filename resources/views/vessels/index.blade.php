@extends('layouts.app')
@section('title', 'Vessels')

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Vessel</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover w-100" id="vessels" name ="vessels">
                    <thead>
                    <tr>
                      <th>Vessel Name</th>
                      <th>Code</th>
                      <th>Vessel Type</th>
                      <th>Principal</th>
                      <th>Contact Person</th>
                      <th>Manager</th>
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
    var vessel;
    $(document).ready(function(){


      $('.select2').select2({
          theme: 'bootstrap4'
      })
      vessel = $('#vessels').DataTable({

                  searching:false,
                  lengthChange:false,
                  pageLength: 5,
                  autoWidth:true,
                  ajax: "{{ route('allVessels') }}",
                  columns: [
                      {data: 'vessel_name', name: 'vessel_name'},
                      {data: 'code', name: 'code'},
                      {data: 'vesseltype.vessel_type', name: 'vesseltype.vessel_type'},
                      {data: 'principal.principal', name: 'principal.principal'},
                      {data: 'contact_person', name: 'contact_person'},
                      {data: 'manager', name: 'manager'},
                      {data: 'options', name: 'options', orderable: false, searchable: false}

                  ],
                  columnDefs: [
                      { width: "20%", targets: 0 },
                      { width: "5%", targets: 2 },
                      { width: "20%", targets: 3 },
                      { width: "15%", targets: 4 },
                      { width: "15%", targets: 5 },

                  ],
                  dom: "lBtipr",
                      buttons: {
                        buttons: [
                          {
                            text: "Add New",
                            action: function(e, dt, node, config) {
                              location.href='./vessels/create';
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




              $('#vessels').on('click', '.delete', function () {
                  var id = $(this).data("id");
                  $confirm =confirm("Are You sure want to delete !");

                  if($confirm == true ){
                      $.ajax({
                          type: "DELETE",
                          url: "{{ route('vessels.store') }}"+'/'+id,
                          success: function (data) {
                              vessel.ajax.reload();
                              toastr.error('Record successfully deleted');
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
