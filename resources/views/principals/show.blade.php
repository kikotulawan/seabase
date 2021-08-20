@extends('layouts.app')
@section('title', 'Principal Management')

@section('content')
@include('principals.form')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">



            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-ship"></i> {{ $principal->principal }}
                    <button class="btn btn-primary float-right edit">Edit Principal</button>

                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">

                  <address>
                    <strong>{{ $principal->principal }}</strong><br>
                    {{ $principal->address }} <br>
                    Phone: {{ $principal->telephone }}<br>
                    Fax: {{ $principal->fax }}<br>
                    Email: {{ $principal->email_address }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                  <address>
                    <strong>{{ $principal->contact_person }}</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                {{-- <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div> --}}
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="card w-100">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                        <li class="nav-item"><a class="nav-link active" href="#salary" data-toggle="tab">Salary Scale</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contacts</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <!-- activity -->
                        <div class=" tab-pane" id="activity">
                        </div>
                        <!-- activity -->
                        <!-- salary -->
                        <div class="active tab-pane" id="salary">
                            @include('salaryscales.index')
                        </div>
                        <!-- salary -->


                        <div class="tab-pane" id="contact">
                          @include('principalcontacts.index')
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
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            salary_scale();
            principal_contact();
            $('.edit').on('click', function () {
              var id="{{ $principal->id }}";
              $.get("{{ route('principals.index') }}" +'/' + id +'/edit', function (data) {
                  $('form[name=form]')[0].reset();
                  $('#form').find('input,small').removeClass('is-invalid').text('');
                  $('#modal .modal-title').html('Edit');
                  $('#modal').modal('show');
                  $('#id').val(data.id);
                  $('#code').val(data.code);
                  $('#principal').val(data.principal);
                  $('#address').val(data.address);
                  $('#telephone').val(data.telephone);
                  $('#fax').val(data.fax);
                  $('#email_address').val(data.email_address);
                  $('#accreditation_number').val(data.accreditation_number);
                  $('#issue_date').val(data.issue_date);
                  $('#expiry_date').val(data.expiry_date);
                  $('#license_expiry_date').val(data.license_expiry_date);
                  $('form[name=form] #country_id').val(data.country_id).attr('selected','selected').trigger('change');
                  $('#cba').val(data.cba);

              });

            });

            $('form[name=form]').submit(function(e){
              e.preventDefault();


          var form=$('form[name=form]')[0];
          var formData=new FormData(form);
          var url;
          if($('#id').val()===""){
            url="{{ route('principals.store') }}";
          }else{
            url ="{{ route('principals.update') }}";
          }
          $.ajax({
            url: url,
            type: 'POST',
            data:formData,
            contentType:false,
            processData:false,
            success:function(data)
            {
                $('#modal').modal('hide');
                form.reset();

                if($('#id').val()===""){
                  toastr.success('Successfully saved.');
                }else{
                  toastr.success('Successfully updated.');
                }
                location.reload();
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
          })
            })

        });
    </script>
@endsection
