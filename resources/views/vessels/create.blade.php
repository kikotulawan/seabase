@extends('layouts.app')
@section('title', 'New Vessel')

@section('content')
{{-- @include('principals.form') --}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <form id="form" name="form" enctype="multipart/form-data">
                @csrf
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    @include('vessels.info')
                </div>
                <!-- /.col -->
              </div>
              <hr>
              <div class="row">
                <div class="col-12">
                    @include('vessels.technical_specs')
                </div>
                <!-- /.col -->
              </div>



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
        $(document).ready(function(){
            $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-M-yyyy',
            });

            $('.select2').select2({
                theme: 'bootstrap4'
            })
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
                url: "{{ route('vessels.store') }}",
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
                    $('.save').prop('disabled', false);
                    $('.save').html('Save');
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
                            $('.save').prop('disabled', false);
                            $('.save').html('Save');
                        }
                    }
                })
            })
        });
    </script>
@endsection
