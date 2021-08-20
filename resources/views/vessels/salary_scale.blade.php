<div class="row-fluid">
    <section>
        <table class="table table-condensed table-bordered w-100" id="details" name ="details">
          <thead>
          <tr>
            <th>Rank</th>
            <th>Description</th>
            <th>Monthly</th>
            <th>Daily</th>
            <th>Percentage</th>
            <th>Days</th>
            <th>Remarks</th>
            <th>Add to total</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          </tbody>
      </table>
      </section>

</div>

  <!-- MODAL -->
  <div class="modal fade" id="details_modal" tabindex="-1" role="dialog" aria-labelledby="details_modal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Add New</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form_vessel_salary_edit" name="form_vessel_salary_edit" >
            @csrf
          <div class="modal-body">
            <input type="hidden" name="id" id="id">
            <div class="row">
              <div class="form-group col-md-12">
                <label for="rank_id" class="col-form-label">Rank</label>
                <select name="rank_id" id="rank_id" class="form-control select2"></select>
                <small id="rank_id_help" class="text-danger"></small>
              </div>
                <div class="form-group col-md-12">
                  <label for="description" class="col-form-label">Description</label>
                  <input type="text" class="form-control" id="description" name="description">
                  <small id="description_help" class="text-danger"></small>
                </div>
                <div class="form-group col-md-3">
                  <label for="monthly" class="col-form-label">Monthly</label>
                  <input type="text" class="form-control" id="monthly" name="monthly">
                  <small id="monthly_help" class="text-danger"></small>
                </div>
                <div class="form-group col-md-3">
                  <label for="daily" class="col-form-label">Daily</label>
                  <input type="text" class="form-control" id="daily" name="daily">
                  <small id="daily_help" class="text-danger"></small>
                </div>
                <div class="form-group col-md-3">
                  <label for="percentage" class="col-form-label">Percentage</label>
                  <input type="text" class="form-control" id="percentage" name="percentage">

                </div>
                <div class="form-group col-md-3">
                  <label for="days" class="col-form-label">Days</label>
                  <input type="text" class="form-control" id="days" name="days">
                </div>
                <div class="form-group col-md-12">
                  <label for="days" class="col-form-label">Remarks</label>
                  <textarea name="remarks" id="remarks" rows="2" class="form-control"></textarea>

                </div>
                <div class="form-check">
                  <label for="add_to_total" class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="add_to_total" name="add_to_total">Add to total
                  </label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn_beneficiary">Save</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- MODAL -->

  <script>
      var details;
      function details(){
        $('.select2').select2({
            theme: 'bootstrap4'
        })
        details = $('#details').DataTable({
                    order: [[0, 'asc'], [7, 'desc']],
                    searching:false,
                    lengthChange:false,
                  //   pageLength: 5,
                    autoWidth:true,
                    ajax: "{{ route('vesselsalaryscale',$vessel->id) }}",
                    columns: [
                      {data: 'rank.rank', name: 'rank.rank'},
                      {data: 'description', name: 'description'},
                      {
                          data: 'monthly',
                          render: $.fn.dataTable.render.number( ',', '.', 2 )
                      },
                      {
                          data: 'daily',
                          render: $.fn.dataTable.render.number( ',', '.', 2 )
                      },
                      // {data: 'monthly', name: 'monthly'},
                      // {data: 'daily', name: 'daily'},
                      {data: 'percentage', name: 'percentage'},
                      {data: 'days', name: 'days'},
                      {data: 'remarks', name: 'remarks'},
                      {data: 'add_to_total', name: 'add_to_total'},
                      {data: 'options', name: 'options', orderable: false, searchable: false}

                    ],

                rowGroup:
                    {
                          dataSrc: "rank.rank"
                    },
                columnDefs: [
                      {
                           targets: [0,7],
                           visible: false
                      },
                      {
                          "orderable": false,
                          "targets": [0,1,2,3,4,5,6]
                      },
                      { width: "10%", targets: 0 },
                      { width: "15%", targets: 1 },
                      { width: "10%", targets: 2 },
                      { width: "10%", targets: 3 },
                      { width: "10%", targets: 4 },
                      { width: "10%", targets: 5 },
                      { width: "20%", targets: 6 },
                      { width: "12%", targets: 8 },
                  ]
                });

                $.ajax({
                      type:"get",
                      url:"{{ route('getRank') }}",
                      success:function(res)
                      {
                          console.log(res);
                              if(res)
                              {

                                    $("form[name=form] #rank_id").empty();
                                    $("form[name=form] #rank_id").append('<option value="">Select Rank</option>');
                                    $.each(res,function(key,value){
                                      $('form[name=form] #rank_id').append('<option value="'+value.id+'">'+value.rank+'</option>');
                                    });
                              }
                      }
                });
                $('#form_vessel_salary_edit').submit(function(e){
                    $('#form_vessel_salary_edit').find('input,small').removeClass('is-invalid').text('');
                    event.preventDefault(e);
                    var form=$('#form_vessel_salary_edit')[0];
                    var formData=new FormData(form);
                    var url;



                    $.ajax({
                    url: url="{{ route('vesselsalaryscales.update') }}",
                    type: 'POST',
                    data:formData,
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        toastr.success(data.success);
                        details.ajax.reload();
                        $('#form_vessel_salary_edit')[0].reset();
                        $('#form_vessel_salary_edit').find('input,small').removeClass('is-invalid').text('');
                        $('#details_modal').modal('hide');
                    },
                    error:function(err)
                        {
                            if(err.status===422){
                                var errors =$.parseJSON(err.responseText);
                                $.each(errors.errors, function(key, value){
                                $('form[name=form_vessel_salary_edit] #' +key).addClass('is-invalid');
                                $('form[name=form_vessel_salary_edit] #' +key).focus();
                                $('form[name=form_vessel_salary_edit] #'+key+"_help").text(value[0]);
                                })
                            }
                        }
                    })
                });

                $('#details').on('click', '.edit', function () {
                    var id = $(this).data("id");
                    $('#form_vessel_salary_edit').find('input,small').removeClass('is-invalid').text('');
                    $.get("{{ route('vesselsalaryscales.index') }}" +'/' + id +'/edit', function (data) {

                        $('#details_modal .modal-title').html('Edit');
                        $('#details_modal').modal('show');

                        $('form[name=form_vessel_salary_edit] #rank_id').val(data.rank_id).attr('selected','selected').trigger('change');

                        $('form[name=form_vessel_salary_edit] #id').val(data.id);
                        $('form[name=form_vessel_salary_edit] #description').val(data.description);
                        $('form[name=form_vessel_salary_edit] #monthly').val(data.monthly);
                        $('form[name=form_vessel_salary_edit] #daily').val(data.daily);
                        $('form[name=form_vessel_salary_edit] #percentage').val(data.percentage);
                        $('form[name=form_vessel_salary_edit] #days').val(data.days);
                        $('form[name=form_vessel_salary_edit] #remarks').val(data.remarks);

                        if(data.add_to_total==1){
                        $('form[name=form_vessel_salary_edit] #add_to_total').attr('checked','checked')
                      }

                    });
                });
                $('#details').on('click', '.delete', function () {
                    var id = $(this).data("id");
                    $confirm =confirm("Are You sure want to delete !");

                    if($confirm == true ){
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('vesselsalaryscales.store') }}"+'/'+id,
                            success: function (data) {
                                details.ajax.reload();
                                toastr.error('Record successfully deleted');
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
      }
    </script>
