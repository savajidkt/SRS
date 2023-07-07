@php
$mycountphp = 1;
    if(count($model->contacts) > 0){
        $mycountphp = count($model->contacts);
    }   
    
@endphp

<script>
    var myCount = {{ $mycountphp }}; 
    var route = "{{ route('check-name') }}";  
</script>
<div>
    <hr>
    <h4 class="card-title">Company Details</h4>
    <hr>
    <section>
        <div class="row">
            <div class="col-lg-12 mb-4 form-style">
                <div class="form-group train-deet">
                    <label class="text-label">Company Name<span class="filedrequired"> *</span></label>
                    {{-- <input type="text" name="firstName" class="form-control" placeholder="" > --}}
                    <div class="input-error">
                        <input class="form-control " id="company_name" type="text" name="company_name"
                            placeholder="Company Name" data-id="{{(isset($model->id))?$model->id:''}}" value="{{(isset($model->company_name))?$model->company_name:''}}" aria-describedby="login-company_name"
                            autofocus=""  />
                      
                        @error('company_name')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="error-msg help-block-error">

                        </div>
                    </div>
                    
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Address Line 1<span class="filedrequired"> *</span></label>
                    <div class="input-error">
                        <input class="form-control" id="address_one" type="text" name="address_one"
                            placeholder="Address" value="{{(isset($model->address_one))?$model->address_one:''}}" aria-describedby="login-address_one"
                            autofocus=""  />
                        @error('address_one')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Address Line 2</label>
                    <div class="input-error">
                        <input class="form-control" id="address_tow" type="text" name="address_tow"
                            placeholder="Address" value="{{(isset($model->address_tow))?$model->company_name:''}}" aria-describedby="login-address_tow"
                            autofocus=""  />
                        @error('address_tow')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Town<span class="filedrequired"> *</span></label>
                    <div class="input-error">
                        <input class="form-control" id="town" type="text" name="town" placeholder="Town"
                            value="{{(isset($model->town))?$model->town:''}}" aria-describedby="login-town" autofocus=""                              />
                        @error('town')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Country<span class="filedrequired"> *</span></label>
                    <div class="input-error">
    
                             <select class="form-select form-select-sm select2" aria-label=".form-select-sm example" id="country" name="country" >
                                <option>Select Country</option>
                                @if(count($countries) > 0)
                                    @foreach ($countries as $key=> $country)
                                    @if ($action =='add')
                                    <option value="{{ $country->id }}" {{ ($country->id == '230') ? 'selected' : '' }} >{{ $country->name}}</option>
                                    @else
                                    <option value="{{ $country->id }}" {{ ($country->id == $model->country) ? 'selected' : '' }} >{{ $country->name}}</option>
                                    @endif
                                        
                                    @endforeach
                                @endif
                            </select>
                        @error('country')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Post Code<span class="filedrequired"> *</span></label>
                    <div class="input-error">
                        <input class="form-control" id="post_code" type="text" name="post_code" placeholder="Post Code"
                            value="{{(isset($model->post_code))?$model->post_code:''}}" aria-describedby="login-post_code" autofocus=""                              />
                        @error('post_code')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Notes</label>
                    <!-- <input class="form-control" id="notes" type="text" name="notes" placeholder="Notes"
                        value="{{(isset($model->notes))?$model->notes:''}}" aria-describedby="login-notes" autofocus=""                          /> -->
                        <div class="input-error">
                            <textarea class="form-control" id="notes" type="text" name="notes" rows="3" cols="50" placeholder="Describe yourself here..." >{{(isset($model->notes))?$model->notes:''}} </textarea>

                            <!-- @error('notes')
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror -->
                        </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <h4 class="card-title">Contact Details</h4>
    <hr>
    <div data-repeater-list="invoice">
        @if(count($model->contacts) > 0)
    @foreach ($model->contacts as $key=> $contact )
    
        <div data-repeater-item>
            <div class="row d-flex align-items-end">

                <div class="col-lg-12 mb-4 form-style">
                    <div class="form-group train-deet">
                        <label class="itemcost">First Name<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="first_name"
                            value="{{$contact->first_name}}" />
                        </div>
                    </div>
                    <div class="form-group train-deet">
                        <label class="itemcost">Last Name<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="last_name"
                            value="{{$contact->last_name}}" />
                        </div>
                    </div>

                    <div class="form-group train-deet">
                        <label class="itemcost">Phone Number<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="phone_number"
                            value="{{$contact->phone_number}}" onkeyup="this.value = this.value.replace(/^\.|[^\d\.]/g, '')" />
                        </div>
                    </div>


                    <div class="form-group train-deet">
                        <label class="itemcost">Mobile Number<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="mobile_number"
                            value="{{$contact->mobile_number}}" onkeyup="this.value = this.value.replace(/^\.|[^\d\.]/g, '')" />
                        </div>
                    </div>
                    <div class="form-group train-deet">
                        <label class="itemcost">Email Address<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="email" class="form-control" name="email" value="{{$contact->email}}" />
                        </div>
                    </div>

                    <div class="form-group train-deet">
                        <label class="itemcost">Job Title </label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="job_title" value="{{$contact->job_title}}" />
                        </div>                       
                    </div>
                </div>

                <div class="col-md-2 col-12 mb-50">
                    <div class="form-group">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                            <i data-feather="x" class="mr-25"></i>
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
            <hr />
        </div>
    
    @endforeach
    @else
    <div data-repeater-item>
            <div class="row d-flex align-items-end">

                <div class="col-lg-12 mb-4 form-style">
                    <div class="form-group train-deet">
                        <label class="text-label">First Name<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="first_name" value="" >
                        </div>
                    </div>
                    <div class="form-group train-deet">
                        <label class="text-label">Last Name<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="last_name" value="" />
                        </div>
                    </div>

                    <div class="form-group train-deet">
                        <label class="text-label">Phone Number<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="phone_number"
                            value="" onkeyup="this.value = this.value.replace(/^\.|[^\d\.]/g, '')" />
                        </div>
                    </div>


                    <div class="form-group train-deet">
                        <label class="text-label">Mobile Number<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="mobile_number"
                            value="" onkeyup="this.value = this.value.replace(/^\.|[^\d\.]/g, '')"  />
                        </div>
                    </div>
                    <div class="form-group train-deet">
                        <label class="text-label">Email Address<span class="filedrequired"> *</span></label>
                        <div class="input-error">
                            <input type="email" class="form-control" name="email" value=""  />
                        </div>
                    </div>

                    <div class="form-group train-deet">
                        <label class="text-label">Job Title </label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="job_title" value="" /> 
                        </div>                      
                    </div>
                </div>

                <div class="col-md-2 col-12 mb-50">
                    <div class="form-group">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                            <i data-feather="x" class="mr-25"></i>
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
            <hr />
        </div>
    @endif
    </div>
</div>
<script type="text/javascript">
    var moduleConfig = {
        checkName: "{!! route('check-name') !!}"
    };
    
</script>