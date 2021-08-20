@extends('layouts.app')
@section('title', 'Disembarkation')
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
                    <i class="fas fa-info-circle"></i> {{ $embarkation->vessel->vessel_name . '- Disembarkation'}}


                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">

                  <address>
                    <strong>Code: </strong>{{ $embarkation->code }}<br>
                    <strong>Departure Airport: </strong>{{ $embarkation->departureplace->airport }}<br>
                    <strong>Departure Date: </strong>{{ $embarkation->departure_date ? date('d-M-Y', strtotime($embarkation->departure_date))  : '' }}<br>
                    <strong>Port of Embarkation: </strong>{{ $embarkation->embarkationplace->seaport }}<br>

                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>Embarkation Date: </strong>{{ $embarkation->embarkation_date ? date('d-M-Y', strtotime($embarkation->embarkation_date))  : '' }}<br>
                        <strong>Disembarkation Date: </strong>{{ $embarkation->disembarkation_date ? date('d-M-Y', strtotime($embarkation->disembarkation_date))  : '' }}<br>
                        <strong>Contract Duration: </strong>{{ $embarkation->contract_duration . ' mos' }}<br>
                        <strong>Point of Hire: </strong>{{ $embarkation->point_of_hire}}<br>

                      </address>
                </div>

              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="card w-100">

                    <div class="card-body">
                      <div class="tab-content">


                        <div class="active tab-pane" id="beneficiary-children">
                            {{-- @include('crews.beneficiary')
                            @include('crews.children') --}}
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
