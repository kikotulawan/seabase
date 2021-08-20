@extends('layouts.app')
@section('title', 'Edit Embarkation')

@section('content')
{{-- @include('principals.form') --}}
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
                            <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                            <table class="table table-bordered table-hover data-table w-100" id="crew_table">
                                <thead>
                                <tr>
                                  <th>Crew Name</th>
                                  <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach (old('crews', ['']) as $index => $oldCrew)
                                        <tr id="crew0">
                                            <td>
                                                <select name="crews[]" class="form-control">
                                                    <option value="">Select Crew</option>
                                                    @foreach ($list as $c)
                                                        <option value="{{ $c->id }}"{{ $oldCrew == $c->id ? ' selected' : '' }}>
                                                            {{ $c->first_name  }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>


                                        </tr>
                                    @endforeach
                                    <tr id="crew{{ count(old('crews', [''])) }}"></tr>
                                </tbody>
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
        $(document).ready(function(){
            $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-M-yyyy',
            });

            $('.select2').select2({
                theme: 'bootstrap4'
            })

            let row_number = {{ count(old('products', [''])) }};
            $("#add_row").click(function(e){

            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#crew' + row_number).html($('#crew' + new_row_number).html()).find('td:first-child');
            $('#crew_table').append('<tr id="crew' + (row_number + 1) + '"></tr>');
            row_number++;
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
