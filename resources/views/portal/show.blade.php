@extends('layouts.portal')
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
                    <a class="btn btn-primary float-right edit" href="{{ route('portal.edit',$crew->id) }}">Edit</a>
                    <button type="button" class="btn btn-warning pool float-right mr-2" data-dismiss="modal">Change Password</button>
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
                    Email: {{ $crew->email_address }}
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
                        {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                        <li class="nav-item"><a class="nav-link active" href="#education" data-toggle="tab">Education</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="#paystructure" data-toggle="tab">Pay Structure</a></li>
                        <li class="nav-item"><a class="nav-link" href="#traveldocumentreports" data-toggle="tab">Travel Document Reports</a></li>
                    </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">



                        <div class="active tab-pane" id="education">
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
                format: 'yyyy-mm-dd',
            })

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
            travel_document_report();




        });
        $(window).on('load', function () {
            $('#preloader')
            .delay(700)
            .fadeOut('fast', function () {
                $(this).remove();
            });
        });
    </script>
@endsection
