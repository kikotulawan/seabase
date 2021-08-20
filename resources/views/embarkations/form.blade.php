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
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">

                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">

                    <div class="container">
                        <div class="row">

                            <div class="form-group col-md-2">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ $embarkation->code ? $embarkation->code : '' }}">
                                <small id="code_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="vessel_id">Vessel</label>
                                <select id='vessel_id' name='vessel_id' class="form-control select2">
                                  <option value='0'>Select Vessel</option>
                                  @foreach($vessel as $v)
                                    <option value="{{$v->id}}"
                                      @if ($embarkation->vessel_id == $v->id)
                                        {{'selected="selected"'}}
                                      @endif
                                      >{{ $v->vessel_name }} </option>
                                  @endforeach
                                </select>
                                <small id="vessel_id_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-4">
                                <label for="rank_id">Departure Airport</label>
                                <select id='departure_id' name='departure_id' class="form-control select2">
                                  <option value='0'>Select Airport</option>
                                  @foreach($airport as $a)
                                    <option value="{{$a->id}}"
                                      @if ($embarkation->departure_id == $a->id)
                                        {{'selected="selected"'}}
                                      @endif
                                      >{{ $a->airport }} </option>
                                  @endforeach
                                </select>
                                <small id="departure_id_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="departure_date">Departure Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    </div>
                                    <input type="text" class="form-control date " maxlength="10" id="departure_date" name="departure_date" value="{{ $embarkation->departure_date ? date('d-M-Y', strtotime($embarkation->departure_date))  : '' }}">
                                </div>
                                <small id="departure_date_help" class="text-danger"></small>
                            </div>

                            <div class="col-md-4">
                                <label for="embarkation_id">Port of Embarkation</label>
                                <select id='embarkation_id' name='embarkation_id' class="form-control select2">
                                  <option value='0'>Select Port</option>
                                  @foreach($seaport as $s)
                                    <option value="{{$s->id}}"
                                      @if ($embarkation->embarkation_id == $s->id)
                                        {{'selected="selected"'}}
                                      @endif
                                      >{{ $s->seaport }} </option>
                                  @endforeach
                                </select>
                                <small id="embarkation_id_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="embarkation_date">Embarkation Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    </div>
                                    <input type="text" class="form-control date " maxlength="10" id="embarkation_date" name="embarkation_date" value="{{ $embarkation->embarkation_date ? date('d-M-Y', strtotime($embarkation->embarkation_date))  : '' }}">
                                </div>
                                <small id="embarkation_date_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="disembarkation_date">Disembarkation Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    </div>
                                    <input type="text" class="form-control " maxlength="10" id="disembarkation_date" name="disembarkation_date" value="{{ $embarkation->disembarkation_date ? date('d-M-Y', strtotime($embarkation->disembarkation_date))  : '' }}" readonly>
                                </div>
                                <small id="disembarkation_date_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="contract_duration">Contract Duration</label>
                                <input type="text" class="form-control" id="contract_duration" name="contract_duration" value="{{ $embarkation->contract_duration ? $embarkation->contract_duration : '' }}" disabled>
                                <small id="contract_duration_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-4">
                                <label for="status_id">Status</label>
                                <select id='status_id' name='status_id' class="form-control select2">
                                  <option value='0'>Select Status</option>
                                  @foreach($status as $stat)
                                    <option value="{{$stat->id}}"
                                      @if ($embarkation->status_id == $stat->id)
                                        {{'selected="selected"'}}
                                      @endif
                                      >{{ $stat->status }} </option>
                                  @endforeach
                                </select>
                                <small id="status_id_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="point_of_hire">Point of Hire</label>
                                <input type="text" class="form-control" id="point_of_hire" name="point_of_hire" value="{{ $embarkation->point_of_hire ? $embarkation->point_of_hire : '' }}">
                                <small id="point_of_hire_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="point_of_hire">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $embarkation->remarks ? $embarkation->remarks : '' }}">
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
