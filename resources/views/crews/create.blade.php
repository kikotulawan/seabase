@extends('layouts.app')
@section('title', 'Applicant Information') 
@section('styles')
<style scoped>
    img {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px;
      width: 180px;
      height: 235px;
      object-fit: contain;
}
</style>
@endsection
@section('content')

<div class="container">
    <form id="form" name="form" enctype="multipart/form-data">
        @csrf
        @include('crews.personal')
        @include('crews.permanent_address')
        @include('crews.next_of_kin')
        @include('crews.uniforms')
        @include('crews.government_info')
        @include('crews.philhealth_info')
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" id="Save">Save</button>
        </div>
    </form>
</div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });
            
            $('.select2').select2({
                theme: 'bootstrap4'
            })
            //insert
            $('#form').submit(function(e){
                $('#form').find('input,small').removeClass('is-invalid').text(''); 
                event.preventDefault(e);
                var form=$('#form')[0];
                var formData=new FormData(form);
                
                
                $.ajax({
                url: "{{ route('crews.store') }}",
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {                 
                    form.reset();
                    toastr.success('Successfully saved.');  
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