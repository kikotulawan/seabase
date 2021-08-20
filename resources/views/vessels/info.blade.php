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
                                <label for="vessel_name">Vessel Name</label>
                                <input type="text" class="form-control" id="vessel_name" name="vessel_name"  value="{{ $vessel->vessel_name ? $vessel->vessel_name : '' }}">
                                <small id="vessel_name_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="code">Vessel Code</label>
                                <input type="text" class="form-control" id="code" name="code"  value="{{ $vessel->code ? $vessel->code : '' }}">
                                <small id="code_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="call_sign">Call Sign</label>
                                <input type="text" class="form-control" id="call_sign" name="call_sign" value="{{ $vessel->call_sign ? $vessel->call_sign : '' }}">
                                <small id="call_sign_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="vessel_type_id">Vessel Type</label>
                                <select id='vessel_type_id' name='vessel_type_id' class="form-control select2">
                                  <option value='0'>Select Vessel Type</option>
                                  @foreach($vessel_type['data'] as $v)
                                    <option value="{{$v->id}}"
                                      @if ($vessel->vessel_type_id == $v->id)
                                        {{'selected="selected"'}}
                                      @endif
                                      >{{ $v->vessel_type }} </option>
                                  @endforeach
                                </select>
                                <small id="vessel_type_id_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="principal_id">Principal</label>
                                <select id='principal_id' name='principal_id' class="form-control select2">
                                  <option value='0'>Select Principal</option>
                                  @foreach($principal['data'] as $p)
                                    <option value="{{$p->id}}"
                                      @if ($vessel->principal_id == $p->id)
                                        {{'selected="selected"'}}
                                      @endif
                                      >{{ $p->principal }} </option>
                                  @endforeach
                                </select>
                                <small id="principal_id_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="flag_id">Flag Carrier</label>
                                <select id='flag_id' name='flag_id' class="form-control select2">
                                  <option value='0'>Select Flag</option>
                                  @foreach($flag['data'] as $f)
                                    <option value="{{$f->id}}"
                                      @if ($vessel->flag_id == $f->id)
                                        {{'selected="selected"'}}
                                      @endif
                                      >{{ $f->flag }} </option>
                                  @endforeach
                                </select>
                                <small id="flag_id_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="manager">Account Manager</label>
                                <input type="text" class="form-control" id="manager" name="manager" value="{{ $vessel->manager ? $vessel->manager : '' }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="trade_route_id">Trade Route/Area</label>
                                <select id='trade_route_id' name='trade_route_id' class="form-control select2">
                                  <option value='0'>Select Trade Route</option>
                                  @foreach($trade['data'] as $t)
                                    <option value="{{$t->id}}"
                                      @if ($vessel->trade_route_id == $t->id)
                                        {{'selected="selected"'}}
                                      @endif
                                      >{{ $t->route_name }} </option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="owner_name">Owner</label>
                                <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{ $vessel->owner_name }}">
                                <small id="owner_name_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="owner_address">Owner Address</label>
                                <input type="text" class="form-control" id="owner_address" name="owner_address" value="{{ $vessel->owner_address }}">
                                <small id="owner_address_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contact_person">Contact Person</label>
                                <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $vessel->contact_person }}">
                                <small id="contact_person_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contact_person_no">Telephone</label>
                                <input type="text" class="form-control" id="contact_person_no" name="contact_person_no" value="{{ $vessel->contact_person_no }}">
                                <small id="contact_person_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email_address">Email</label>
                                <input type="text" class="form-control" id="email_address" name="email_address" value="{{ $vessel->email_address }}">
                                <small id="contact_person_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cba">CBA</label>
                                <input type="text" class="form-control" id="cba" name="cba" value="{{ $vessel->cba }}">
                                <small id="contact_person_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="remarks">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $vessel->remarks }}">
                                <small id="contact_person_help" class="text-danger"></small>
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
