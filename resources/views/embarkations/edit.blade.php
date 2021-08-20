
@extends('layouts.app')
@section('title', 'Edit Embarkation')

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
                    <input type="hidden" id="id" name="id" value="{{$embarkation->id}}">
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
                                <select id='crew_list' name='crew_list' class="form-control select2 col-md-9 offset-1">
                                    <option value='0'>Select Crew</option>
                                </select>
                                &nbsp;
                                <button type="button" id="add_row" name="add_row" class="btn btn-default btn-block col-md-2">Add Crew</button>

                            </div>
                            <input name="crews[]" value="1" type="hidden">
                            <table class="table table-bordered table-hover data-table w-100" id="crew_table">
                                <thead>
                                <tr>
                                  <th>Crew Name</th>
                                  <th width="20px"></th>
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
        $(document).ready(function(){

            $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-M-yyyy',
            });
            $('#crews_help').hide();
            $('#code').attr('disabled',true);
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        //initialize table
        table = $('#crew_table').DataTable({

                searching:false,
                lengthChange:false,
                //   pageLength: 5,
                autoWidth:true,
                ajax: "{{ route('embarkations.crew',$embarkation->id) }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {
                data: "id",
                render: function (data) {
                    return '<button class="btn btn-danger js-delete" title="Delete" data-id="' + data + '"><i class="fa fa-trash"></i></button>';
                }
            }

                ],
        });
        //delete
        $("#crew_table").on("click", ".js-delete", function (e) {
            e.preventDefault();
            var button = $(this);
            var id=button.attr("data-id");
            $confirm =confirm("Are You sure want to delete !");
            //remove and update status and mark embarkation details
            if($confirm == true ){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('embarkationdetails.store') }}"+'/'+id,
                    success: function (data) {
                        table.ajax.reload();
                        toastr.error(data.success);
                        $('#vessel_id').trigger('change');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        //add crew
        $('#add_row').click(function(e){
            e.preventDefault();
            var formData=new FormData();
            formData.append( 'embarkation_id', {{$embarkation->id}});
            formData.append( 'crew_id', $('#crew_list').val());
            formData.append( 'rank_id', $('#crew_list :selected').attr('data-value'));
            formData.append( 'status_id', $('#status_id').val());
            $.ajax({
                url: "{{ route('embarkationdetails.store') }}",
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {
                    toastr.success(data.success);
                    table.ajax.reload();
                    $('#vessel_id').trigger('change');
                },

                error:function(err)
                    {
                        alert(err);
                    }
                })

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

                                $('#crew_list').append('<option value="'+value.id+'" data-value="'+ value.rank_id+'">'+value.full_name + '</option>');
                                });
                        }
                }
            });
        })
        $("#contract_duration").prop('disabled', false);

            //insert
            $('#form').submit(function(e){
                $('#form').find('input,small').removeClass('is-invalid').text('');
                event.preventDefault(e);
                var form=$('#form')[0];
                var formData=new FormData(form);

                $('.update').prop("disabled", true);

                $('.update').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...'
                );

                $.ajax({
                url: "{{ route('embarkations.update') }}",
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {
                    toastr.success(
                        'Embarkation Successfully Updated',
                        'Updated',
                        {
                            timeOut: 2000,
                            fadeOut: 2000,
                            onHidden: function () {
                                location.href='/embarkations';
                            }
                        }
                    );

                },
                complete:function(data){
                    $('.update').prop('disabled', false);
                    $('.update').html('Update');
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
                            $('.update').prop('disabled', false);
                            $('.update').html('Update');
                        }
                    }
                })
            })
        });

        window.onload = function () {

            $('#vessel_id').trigger('change');
        }
    </script>
@endsection
