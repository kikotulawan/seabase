@extends('layouts.app')
@section('title', 'Salary Scale Table') 

@section('content')
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
                    <i class="fas fa-money-check"></i> {{ $salary_scale->salary_name .' - '. $salary_scale->principal->principal }}
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <hr>

              <!-- Table row -->
              <div class="row-fluid">
                @include('salaryscaledetails.index')
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
            
          details();
            
        });
    </script>
@endsection