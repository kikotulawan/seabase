<div class="row-fluid">
    <table class="table table-bordered table-hover data-table w-100" id="d" name="d">
        <thead>
        <tr>
            <th>Id</th>
            <th>Report Name</th>
            <th width="80px"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
</div>

@include('reports.form_info_to_the_master')
@include('reports.form_letter_of_guarantee')
@include('reports.form_contract_of_employment')
@include('reports.form_jsu_contract')

<script type="text/javascript">
    var rpt;

    function travel_document_report(){

        rpt = $('#d').DataTable({
                pageLength: 50,
                lengthChange:false,
                ajax: "{{ route('allTravelDocumentReports') }}",
                    columns: [
                    {data: 'id', name: 'id'},
                        {data: 'report_name', name: 'report_name'},
                        {data: 'options', name: 'options', orderable: false, searchable: false}
                    ],
                    columnDefs: [
                        {
                            targets: 0,
                            visible: false
                        },
                        { width: "18%", targets: 2 },
                    ]
              })


    }


  </script>
