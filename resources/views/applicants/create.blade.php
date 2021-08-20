@extends('layouts.app')
@section('title', 'New Applicant')

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
                    @include('crews.personal')
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="card w-100">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                        <li class="nav-item"><a class="nav-link active" href="#permanent-address" data-toggle="tab">Permanent Address</a></li>
                        <li class="nav-item"><a class="nav-link" href="#next-of-kin" data-toggle="tab">Next of Kin</a></li>
                        <li class="nav-item"><a class="nav-link" href="#uniforms" data-toggle="tab">Uniforms</a></li>
                        <li class="nav-item"><a class="nav-link" href="#govt-info" data-toggle="tab">Government Info</a></li>
                        <li class="nav-item"><a class="nav-link" href="#ph-info" data-toggle="tab">For Philhealth Info</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">

                        <div class=" tab-pane" id="activity">
                        </div>

                        <div class="active tab-pane" id="permanent-address">
                            @include('crews.permanent_address')
                        </div>

                        <div class="tab-pane" id="next-of-kin">
                            @include('crews.next_of_kin')
                        </div>
                        <div class="tab-pane" id="uniforms">
                            @include('crews.uniforms')
                        </div>
                        <div class="tab-pane" id="govt-info">
                            @include('crews.government_info')
                        </div>
                        <div class="tab-pane" id="ph-info">
                            @include('crews.philhealth_info')
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
                url: "{{ route('crews.store') }}",
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {
                    toastr.success(
                        'New Applicant has been saved successfully',
                        'Success',
                        {
                            timeOut: 2000,
                            fadeOut: 2000,
                            onHidden: function () {
                                location.href='/applicants';
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
