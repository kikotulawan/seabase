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
                {{-- <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <img src="{{ asset('/storage/uploads/' .$crew->crew_no .'/' .$crew->image_path) }}" alt="" id="image_source" name="image_source">
                      <input type="file" name="image_path" id="image_path" accept="image/*" style="display: none" onchange="document.getElementById('image_source').src = window.URL.createObjectURL(this.files[0])">

                    </div>

                    <button type="button" class="btn btn-default btn-sm mt-1 btn-block" onclick="browse_image()">Browse</button>
                  </div>

                </div> --}}
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">

                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="ex_flag">Ex Flag</label>
                                <input type="text" class="form-control" id="ex_flag" name="ex_flag" value="{{ $vessel->ex_flag }}" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="port_of_registry">Port of Registry</label>
                                <input type="text" class="form-control" id="port_of_registry" name="port_of_registry" value="{{ $vessel->port_of_registry }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="year_built">Year Built</label>
                                <input type="text" class="form-control" id="year_built" name="year_built" value="{{ $vessel->year_built }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="official_number">Official Number</label>
                                <input type="text" class="form-control" id="official_number" name="official_number" value="{{ $vessel->official_number }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="imo_number">IMO Number</label>
                                <input type="text" class="form-control" id="imo_number" name="imo_number" value="{{ $vessel->imo_number }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="main_engine">Main Engine</label>
                                <input type="text" class="form-control" id="main_engine" name="main_engine" value="{{ $vessel->main_engine }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="capacity">Capacity</label>
                                <input type="text" class="form-control" id="capacity" name="capacity" value="{{ $vessel->capacity ? $vessel->capacity : 0}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="propulsion_power">Propulsion Power</label>
                                <input type="text" class="form-control" id="propulsion_power" name="propulsion_power" value="{{ $vessel->propulsion_power ? $vessel->propulsion_power : 0 }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="grt">GRT</label>
                                <input type="text" class="form-control" id="grt" name="grt" value="{{ $vessel->grt }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dwt">DWT</label>
                                <input type="text" class="form-control" id="dwt" name="dwt" value="{{ $vessel->dwt }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="classification_society">Classification Society</label>
                                <input type="text" class="form-control" id="classification_society" name="classification_society" value="{{ $vessel->classification_society }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nrt">NRT</label>
                                <input type="text" class="form-control" id="nrt" name="nrt" value="{{ $vessel->nrt }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="particulars">Particulars</label>
                                <input type="text" class="form-control" id="particulars" name="particulars" value="{{ $vessel->particulars }}">
                            </div>


                            <!-- -->
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
