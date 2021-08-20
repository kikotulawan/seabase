@extends('layouts.app')
@section('title', 'Crew Information')
@section('styles')
<style>
    /*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
h1 {
  text-align: center;
  margin-top: 20px;
}

/*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/
#preloader {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 99999;
  overflow: hidden;
  background: #fff;
}

#preloader:before {
  content: '';
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #50ACE4;
  border-top-color: #fff;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  -webkit-animation: animate-preloader 1s linear infinite;
  animation: animate-preloader 1s linear infinite;
}

@-webkit-keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


</style>

@endsection
@section('content')
<div id="preloader"></div>
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
                    <button class="btn btn-light " onclick="history.back(-1)"><i class="fas fa-arrow-left"></i></button>
                    <i class="fas fa-info-circle"></i> {{ $crew->first_name . ' '. $crew->middle_name . ' ' . $crew->last_name }} ({{$crew->crew_no}})

                    @can('crew-management-edit')

                    <a class="btn btn-primary float-right edit" href="{{ route('crews.edit',$crew->id) }}">Edit</a>

                    @endcan
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">

                  <address>
                    <strong>{{ $crew->contact_address }}</strong><br>
                    Phone: {{ $crew->telephone }}<br>
                    Mobile No: {{ $crew->mobile_no }}<br>
                    Email: {{ $crew->email  }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>Rank : </strong> {{ $crew->rank }}<br>
                        <strong>Status : </strong> {{ $crew->status }}<br>
                        <strong>Last Office History : </strong> {{ $crew->office_datetime }}<br>
                        {{ $crew->office_history }}
                      </address>
                </div>

              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="card w-100">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#beneficiary-children" data-toggle="tab">Benefiary/Children</a></li>
                        <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">Education</a></li>
                        <li class="nav-item"><a class="nav-link" href="#licenses" data-toggle="tab">Licenses</a></li>
                        <li class="nav-item"><a class="nav-link" href="#flagstatedocuments" data-toggle="tab">Flag State Documents</a></li>
                        <li class="nav-item"><a class="nav-link" href="#traveldocuments" data-toggle="tab">Travel Documents</a></li>
                        <li class="nav-item"><a class="nav-link" href="#trainings" data-toggle="tab">Trainings & Other Certificates</a></li>
                        <li class="nav-item"><a class="nav-link" href="#documentlibrary" data-toggle="tab">Document Library</a></li>
                        <li class="nav-item"><a class="nav-link" href="#medical" data-toggle="tab">Medical</a></li>
                        <li class="nav-item"><a class="nav-link" href="#vaccine" data-toggle="tab">Vaccine</a></li>
                        <li class="nav-item"><a class="nav-link" href="#officeremarks" data-toggle="tab">Office Remarks</a></li>
                        <li class="nav-item"><a class="nav-link" href="#seaservice" data-toggle="tab">Sea Service</a></li>
                        <li class="nav-item"><a class="nav-link" href="#allottee" data-toggle="tab">Allottee</a></li>
                        <li class="nav-item"><a class="nav-link" href="#incident" data-toggle="tab">Crew Incidents</a></li>
                        <li class="nav-item"><a class="nav-link" href="#paystructure" data-toggle="tab">Pay Structure</a></li>
                        <li class="nav-item"><a class="nav-link" href="#traveldocumentreports" data-toggle="tab">Travel Document Reports</a></li>
                    </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">


                        <div class="active tab-pane" id="beneficiary-children">
                            @include('crews.beneficiary')
                            @include('crews.children')
                        </div>
                        <div class="tab-pane" id="education">
                            @include('crews.education')
                        </div>


                        <div class="tab-pane" id="licenses">
                            @include('crews.license')
                        </div>
                        <div class="tab-pane" id="flagstatedocuments">
                            @include('crews.flagstatedocument')
                        </div>
                        <div class="tab-pane" id="traveldocuments">
                            @include('crews.document')
                        </div>
                        <div class="tab-pane" id="trainings">
                            @include('crews.training')
                        </div>
                        <div class="tab-pane" id="documentlibrary">
                            @include('crews.documentlibrary')
                        </div>
                        <div class="tab-pane" id="medical">
                            @include('crews.medical')
                        </div>
                        <div class="tab-pane" id="vaccine">
                            @include('crews.vaccine')
                        </div>

                        <div class="tab-pane" id="allottee">
                            @include('crews.allottee')
                        </div>
                        <div class="tab-pane" id="incident">
                            @include('crews.incident')
                        </div>
                        <div class="tab-pane" id="paystructure">
                            @include('crews.pay_structure')
                        </div>
                        <div class="tab-pane" id="officeremarks">
                            @include('crews.officehistory')
                        </div>
                        <div class="tab-pane" id="traveldocumentreports">
                            @include('crews.reports')
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
            bsCustomFileInput.init();
            $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-M-yyyy',
            });

            $('.select2').select2({
                theme: 'bootstrap4'
            })
            // beneficiary();
            // children();
            education();
            license();
            flagstatedocument();
            crew_document();
            training();
            document_library();
            medical();
            vaccine();
            office_history();
            //SEA SERVICE
            allottee();
            incidents();
            travel_document_report();
            beneficiary();
            children();
            pay_structure();

        });
        $('#d').on('click', '.preview', function () {
                var id = $(this).data("id");
                switch(id) {
                case 1:
                    window.open("{{ route('cv_standard',$crew->id) }}");
                    break;
                case 2:
                    window.open("{{ route('seafarer_employment_contract',$crew->id) }}");
                    break;
                case 3:
                    window.open("{{ route('dutch_contract',$crew->id) }}");
                    break;
                case 4:

                    $('#letter_of_guarantee_modal').modal('show');
                    populateSignatory('form[name=form_letter_of_guarantee] #signatory_id');
                    populateAgent();

                    break;
                case 5:
                    $('#info_to_the_master_modal').modal('show');
                    populateAllottee();
                    populateBeneficiary();
                    populateVisa();
                    populateMedical();
                    break;
                case 6:
                    $('#info_to_the_master_modal').modal('show');
                    populateAllottee();
                    populateBeneficiary();
                    populateVisa();
                    populateMedical();
                    break;
                case 7:
                    $('#jsu_modal').modal('show');
                    populateSignatory('form[name=form_jsu] #jsu_signatory_id');
                    break;
                    break;
                case 8:
                    $('#coe_modal').modal('show');
                    populateSignatory('form[name=form_coe] #coe_signatory_id');
                    break;
                case 9:
                    window.open("{{ route('poea_info_sheet',$crew->id) }}");
                    break;
                    case 10:
                    window.open("{{ route('poea_seafarer_info_sheet',$crew->id) }}");
                    break;
                default:
                    // code block
                }


        });
        // $('#form_info_to_the_master').submit(function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         data: $('#form_info_to_the_master').serialize(),
        //         url: "{{ route('info_to_the_master')}}",
        //         type: "POST",
        //         dataType: 'json',
        //         success: function (data) {

        //             toastr.success(data.success);
        //         },
        //     error:function(err)
        //         {
        //             alert('error');
        //             if(err.status===422){
        //             var errors =$.parseJSON(err.responseText);
        //             $.each(errors.errors, function(key, value){
        //                 $('#' +key).addClass('is-invalid');
        //                 $('#' +key).focus();
        //                 $('#'+key+"_help").text(value[0]);
        //             })
        //             }
        //         }
        //     })
        // });
        $(window).on('load', function () {
            $('#preloader')
            .delay(700)
            .fadeOut('fast', function () {
                $(this).remove();
            });
        });

        function populateAllottee(){
            $.ajax({
                type:"get",
                url:"{{ route('crewAllottees',$crew->id) }}",
                success:function(res)
                {
                        if(res)
                        {
                            $('#allottee_id').empty();
                            $("#allottee_id").append('<option>Select Allottee</option>');
                            $.each(res,function(key,value){
                                $("#allottee_id").append('<option value="'+value.id+'">'+value.account_name+'</option>');
                            });
                        }
                }

            });
        }

        function populateBeneficiary(){
            $.ajax({
                type:"get",
                url:"{{ route('beneficiaries',$crew->id) }}",
                success:function(res)
                {
                        if(res)
                        {
                            $('#beneficiary_id').empty();
                            $("#beneficiary_id").append('<option>Select Beneficiary</option>');
                            $.each(res,function(key,value){
                                $("#beneficiary_id").append('<option value="'+value.id+'">'+value.last_name + ', ' +value.first_name+ ' (' + value.relationship + ')</option>');
                            });
                        }
                }

            });
        }

        function populateVisa(){
            $.ajax({
                type:"get",
                url:"{{ route('visa',$crew->id) }}",
                success:function(res)
                {
                        if(res)
                        {
                            $('#visa_id').empty();
                            $("#visa_id").append('<option>Select Visa</option>');
                            $.each(res,function(key,value){
                                $("#visa_id").append('<option value="'+value.id+'">'+value.document + '</option>');
                            });
                        }
                }

            });
        }

        function populateMedical(){
            $.ajax({
                type:"get",
                url:"{{ route('getMedical',$crew->id) }}",
                success:function(res)
                {
                        if(res)
                        {
                            $('#medical_id').empty();
                            $("#medical_id").append('<option>Select Medical</option>');
                            $.each(res,function(key,value){
                                $("#medical_id").append('<option value="'+value.id+'">'+value.document + '</option>');
                            });
                        }
                }

            });
        }

        function populateSignatory(formname){
            $.ajax({
                type:"get",
                url:"{{ route('getSignatories') }}",
                success:function(res)
                {
                        if(res)
                        {
                            $(formname).empty();
                            $(formname).append('<option>Select Signatory</option>');
                            $.each(res,function(key,value){
                                $(formname).append('<option value="'+value.id+'">'+value.name + '</option>');
                            });
                        }
                }

            });
        }

        function populateAgent(){
            $.ajax({
                type:"get",
                url:"{{ route('getAgent') }}",
                success:function(res)
                {
                        if(res)
                        {
                            $('#agent_id').empty();
                            $("#agent_id").append('<option>Select Agent</option>');
                            $.each(res,function(key,value){
                                $("#agent_id").append('<option value="'+value.id+'">'+value.agent + '</option>');
                            });
                        }
                }

            });
        }

    </script>
@endsection
