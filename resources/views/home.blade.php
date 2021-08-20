@extends('layouts.app')
@section('styles')

<style>
    tr.odd td:first-child,
tr.even td:first-child {
    padding-left: 4em;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in!') }}
                    <!--
                    <table id="example" class="table table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Description</th>
                                <th>Monthly</th>
                                <th>Daily</th>
                                <th>Add to Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Able Seamen</td>
                                <td>Bonus</td>
                                <td>1000</td>
                                <td>22</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>AB/QM</td>
                                <td>Bonus</td>
                                <td>1000</td>
                                <td>250.30</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Able Seamen</td>
                                <td>Basic Salary</td>
                                <td>1000</td>
                                <td>12.50</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Able Seamen</td>
                                <td>Overtime Salary</td>
                                <td>500</td>
                                <td>44</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Able Seamen</td>
                                <td>Overtime Salary</td>
                                <td>500</td>
                                <td>44</td>
                                <td>1</td>
                            </tr>

                            {{-- officer --}}
                            <tr>
                                <td>Officer</td>
                                <td>Basic Salary</td>
                                <td>1000</td>
                                <td>201</td>
                                <td>1</td>
                            </tr>

                            <tr>
                                <td>Officer</td>
                                <td>Overtime Salary</td>
                                <td>500</td>
                                <td>22</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Officer</td>
                                <td>Bonus</td>
                                <td>1000</td>
                                <td>23</td>
                                <td>0</td>
                            </tr>

                            <tr>
                                <td>Officer</td>
                                <td>Rejoining</td>
                                <td>1000</td>
                                <td>23</td>
                                <td>1</td>
                            </tr>
                        </tbody>

                    </table>
                -->
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    {{-- <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js" /> --}}
    <script type="text/javascript">
    $(document).ready(function(e){

        $('#example').DataTable( {
            order: [[0, 'asc'], [4, 'desc']],
            rowGroup: {

            dataSrc: [0]
            },
            columnDefs: [
                {
                    targets: [0,4],
                    visible: false
                }
            ],
        //     "drawCallback": function ( settings ) {
        //     var api = this.api();
        //     var rows = api.rows( {page:'current'} ).nodes();
        //     var last=null;
        //     var subTotal = new Array();
        //     var groupID = -1;
        //     var aData = new Array();
        //     var index = 0;

        //     api.column(0, {page:'current'} ).data().each( function ( group, i ) {

        //       // console.log(group+">>>"+i);

        //       var vals = api.row(api.row($(rows).eq(i)).index()).data();
        //       var salary = vals[3] ? parseFloat(vals[3]) : 0;

        //       if (typeof aData[group] == 'undefined') {
        //          aData[group] = new Array();
        //          aData[group].rows = [];
        //          aData[group].salary = [];
        //       }

        //    		aData[group].rows.push(i);
        // 			aData[group].salary.push(salary);

        //     } );


        //     var idx= 0;


        //   	for(var office in aData){

		// 							 idx =  Math.max.apply(Math,aData[office].rows);

        //            var sum = 0;

        //             $.each(aData[office].salary,function(k,v){

        //                     sum = sum + v;
        //             });

        //            $(rows).eq( idx-1 ).after(
        //                 '<tr class="group"><td colspan="1">Total</td>'+
        //                 '<td>'+sum+'</td></tr>'
        //             );

        //     };

        // }


        });
    });
    </script>
@endsection
