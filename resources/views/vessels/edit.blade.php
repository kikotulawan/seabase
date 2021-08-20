@extends('layouts.app')
@section('title', 'Edit Vessel')

@section('content')
{{-- @include('principals.form') --}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <form id="form" name="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id" value="{{ $vessel->id }}">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    @include('vessels.info')
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="card w-100">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#specs" data-toggle="tab">Technical Specs</a></li>
                        <li class="nav-item"><a class="nav-link " href="#salary" data-toggle="tab">Salary Scale</a></li>

                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">



                        <div class="active tab-pane" id="specs">
                            @include('vessels.technical_specs')
                        </div>
                    </form>
                         <!-- salary -->
                         <div class="tab-pane" id="salary">
                            @include('vessels.salary_scale')
                        </div>
                        <!-- salary -->

                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                <!-- /.col -->
              </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary update">Update</button>
                </div>


          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            details();
            $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-M-yyyy',
            });

            $('.select2').select2({
                theme: 'bootstrap4'
            })
            $('#monthly').change(function() {
                if({{$vessel->flag_id}}==9 || {{$vessel->flag_id}} ==10){
                    var daily = this.value *(12/365);
                    $('#daily').val(daily.toFixed(2));
                }else{
                    var daily = this.value *(12/360);
                    $('#daily').val(daily.toFixed(2));
                }

                });
            //insert
            $('.update').on('click',function(e){
                $('#form').find('input,small').removeClass('is-invalid').text('');
                event.preventDefault(e);
                var form=$('#form')[0];
                var formData=new FormData(form);

                $('.update').prop("disabled", true);

                $('.update').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...'
                );

                $.ajax({
                url: "{{ route('vessels.update') }}",
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {
                    toastr.success(
                        data.success,
                        'Success',
                        {
                            timeOut: 2000,
                            fadeOut: 2000,
                            onHidden: function () {

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
                            $.each(errors.errors, function(key, value){
                                $('#' +key).addClass('is-invalid');
                                $('#' +key).focus();
                                $('#'+key+"_help").text(value[0]);
                            })
                            $('.update').prop('disabled', false);
                            $('.update').html('Update');
                        }
                    }
                })
            })
        });
    </script>
@endsection
