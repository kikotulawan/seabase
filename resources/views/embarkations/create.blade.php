@extends('layouts.app')
@section('title', 'New Embarkation')

@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <form id="form" name="form" enctype="multipart/form-data"  >
                @csrf
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    @include('embarkations.form')
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="w-100">

                    <div class="card-body">
                      <div class="tab-content">

                        <div class="active tab-pane">
                            <div id="crews_help" class="alert alert-danger"></div>
                            <div class="form-inline">
                                <select id='crew_list' name='crew_list' class="form-control select2 col-md-10">
                                    <option value='0'>Select Crew</option>
                                </select>
                                &nbsp;
                                <button type="button" id="add_row" name="add_row" class="btn btn-default pull-right">Add Crew</button>

                            </div>
                            <table class="table table-bordered table-hover data-table w-100" id="crew_table">
                                <thead>
                                <tr>
                                  <th>Crew Name</th>
                                  <th width="15px"></th>
                                </tr>
                                </thead>

                              </table>
                        </div>


                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary save">Save</button>
                </div>
            </form>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script type="text/javascript">
        var table;
        var counter = 1;
        $(document).ready(function(){
            table=$('#crew_table').DataTable({
                searching:false,
                lengthChange:false
            });

            $('.select2').select2({
                theme: 'bootstrap4'
            })
            $('#departure_date').datepicker({
                autoclose: true,
                todayHighlight: true,
                startDate: '-0d',
                format: 'dd-M-yyyy',
            });
            $('#embarkation_date').datepicker({
                autoclose: true,
                todayHighlight: true,
                startDate: '-0d',
                format: 'dd-M-yyyy',
            });

            $('#crews_help').hide();

            $('#add_row').click(function(){
                var id=$('#crew_list').val();
                var name=$('#crew_list option:selected').text();
            var rData = [
                '<input name="crews[]" value="'+ id +'" type="hidden">' + name,
                '<a href="#" data-href="' + id+ '" class="delete btn btn-danger">Delete</a>'
                ];
                table.row.add(rData).draw(false);
            });
            $('#crew_table').on('click', '.delete', function (e) {
                e.preventDefault();
                var tableRow = table.row($(this).parents('tr'));
                table.row( tableRow ).remove().draw();
            });
            $('#vessel_id').on('change',function(){


                $.ajax({
                    type:"get",
                    url:"/crews/getCrewByVessel/" +this.value,
                    success:function(res)
                    {
                            if(res)
                            {
                                    $('#crew_list').empty();
                                    $('#crew_list').append('<option value="">Select Crew</option>');
                                    $.each(res,function(key,value){

                                    $('#crew_list').append('<option value="'+value.id+'">'+value.full_name +'</option>');
                                    });
                            }
                    }
                });
            })


            $('#embarkation_date').change(function() {
                if (this.value == "") {
                    $("#contract_duration").prop('disabled', true);
                } else {
                    $("#contract_duration").prop('disabled', false);
                }
            });
            $('#contract_duration').change(function () {
                var d = new Date(addMonths(new Date($('#embarkation_date').val()), this.value));
                $('#disembarkation_date').val(moment(d).format('DD-MMM-YYYY'));

            });
            //insert
            $('#form').submit(function(e){
                $('#form').find('input,small').removeClass('is-invalid').text('');
                event.preventDefault(e);
                var form=$('#form')[0];
                var formData=new FormData(form);

                $('.save').prop("disabled", true);

                $('.save').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
                );

                $.ajax({
                url: "{{ route('embarkations.store') }}",
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {
                    toastr.success(
                        'embarkation',
                        'Success',
                        {
                            timeOut: 2000,
                            fadeOut: 2000,
                            onHidden: function () {
                                //location.href='/applicants';
                            }
                        }
                    );

                },
                complete:function(data){
                    $('.save').prop('disabled', false);
                    $('.save').html('Save');
                },
                error:function(err)
                    {
                        if(err.status===422){
                            var errors =$.parseJSON(err.responseText);
                            $('#crews_help').hide();
                            $.each(errors.errors, function(key, value){
                                $('#' +key).addClass('is-invalid');
                                $('#' +key).focus();
                                if(key=='crews'){
                                    $('#crews_help').show();
                                }
                                $('#'+key+"_help").text(value[0]);
                            })
                            $('.save').prop('disabled', false);
                            $('.save').html('Save');

                        }
                    }
                })
            })
        });
        function addMonths(date, months) {
            var d = date.getDate();
            date.setMonth(date.getMonth() + +months);
            if (date.getDate() != d) {
                date.setDate(0);
            }
            return date.toString("dd-MMM-yyyy");
        }
    </script>
@endsection
