<style>
    img {
      /* border: 0.5px solid #ddd; */
      /* border-radius: 4px; */
      padding: 1px;
      width: 140px;
      height: 140px;
      object-fit: contain;

}
</style>


<div class="container">
<div class="row flex-lg-nowrap">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="cardd">
          <div class="card-boddy">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      {{-- <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span> --}}
                      <img src="{{ asset('/storage/uploads/' .$crew->crew_no .'/' .$crew->image_path) }}" alt="" id="image_source" name="image_source">
                      <input type="file" name="image_path" id="image_path" accept="image/*" style="display: none" onchange="document.getElementById('image_source').src = window.URL.createObjectURL(this.files[0])">

                    </div>

                    <button type="button" class="btn btn-default btn-sm mt-1 btn-block" onclick="browse_image()">Browse</button>
                  </div>

                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">

                    <div class="container">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="application_date">Application Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    </div>
                                    <input type="text" class="form-control date " maxlength="10" id="application_date" name="application_date" value="{{ $crew->application_date ? date('d-M-Y', strtotime($crew->application_date))  : '' }}">
                                </div>
                                <small id="application_date_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-8">
                                <label for="rank_id">Rank</label>
                                <select id='rank_id' name='rank_id' class="form-control select2">
                                  <option value='0'>Select Rank</option>
                                  @foreach($rank['data'] as $rank)
                                    <option value="{{$rank->id}}"
                                      @if ($crew->rank_id == $rank->id)
                                        {{'selected="selected"'}}
                                      @endif
                                      >{{ $rank->rank }} </option>
                                  @endforeach
                                </select>
                                <small id="rank_id_help" class="text-danger"></small>
                            </div>

                            <!-- -->
                            <div class="form-group col-md-4">
                                <label for="first_name">Firstname</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $crew->first_name }}">
                                <small id="first_name_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-4">
                                <label for="middle_name">Middlename</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $crew->middle_name }}">
                            </div>
                            <div class="col-md-4">
                                <label for="last_name">Lastname</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $crew->last_name }}">
                                <small id="last_name_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-12">
                                <label for="contact_address">Contact Address</label>
                                <input type="text" name="contact_address" id="contact_address" class="form-control" value="{{ $crew->contact_address }}" >
                                <small id="contact_address_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $crew->email }}">
                                <small id="email_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $crew->telephone }}">
                            </div>
                          </div>


                        </div>
                      </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


    </div>

  </div>
</div>
<script>
    function browse_image(){
        $('#image_path').trigger('click');
    }

    function change_image(a){

        $('#image_source').attr("src", a.src);
    }

</script>
