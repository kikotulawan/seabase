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
                    <i class="fas fa-money-check"></i> {{ $salary_scale->salary_name .' - '. $salary_scale->principal->principal }}
                    <a class="btn btn-light" href="./"><i class="fa fa-arrow-left">d</i></a>
                    <button class="btn btn-primary float-right" onclick="history.back(-1)">Bddack</button>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              

              <!-- Table row -->
              <div class="row">
                <table class="table table-bordered table-hover data-table w-100 mt-5">
                    <thead>
                    <tr>
                      <th>Code</th>
                      <th>Principal Name</th>
                      <th>Accreditation Date</th>
                      <th>Expiry Date</th>
                      <th>Country</th>
                      <th width="80px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody> 
                  </table>
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
    </script>
@endsection