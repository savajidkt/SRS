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
                            placeholder="Company Name" value="{{(isset($model->company_name))?$model->company_name:''}}" aria-describedby="login-company_name"
                            autofocus="" tabindex="1"  />
                      
                        @error('company_name')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Address Line 1</label>
                    <div class="input-error">
                        <input class="form-control" id="address_one" type="text" name="address_one"
                            placeholder="Address.." value="{{(isset($model->address_one))?$model->address_one:''}}" aria-describedby="login-address_one"
                            autofocus="" tabindex="2"  />
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
                            placeholder="Address.." value="{{(isset($model->address_tow))?$model->company_name:''}}" aria-describedby="login-address_tow"
                            autofocus="" tabindex="3"  />
                        @error('address_tow')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Town</label>
                    <div class="input-error">
                        <input class="form-control" id="town" type="text" name="town" placeholder="Town"
                            value="{{(isset($model->town))?$model->town:''}}" aria-describedby="login-town" autofocus="" tabindex="4"
                             />
                        @error('town')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Country</label>
                    <div class="input-error">
                        <input class="form-control" id="country" type="text" name="country" placeholder="Country"
                            value="{{(isset($model->country))?$model->country:''}}" aria-describedby="login-country" autofocus="" tabindex="5"
                             />
                        @error('country')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Post Code</label>
                    <div class="input-error">
                        <input class="form-control" id="post_code" type="text" name="post_code" placeholder="Post Code"
                            value="{{(isset($model->post_code))?$model->post_code:''}}" aria-describedby="login-post_code" autofocus="" tabindex="6"
                             />
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
                        value="{{(isset($model->notes))?$model->notes:''}}" aria-describedby="login-notes" autofocus="" tabindex="1"
                         /> -->
                        <div class="input-error">
                            <textarea class="form-control" id="notes" type="text" name="notes" rows="3" cols="50" tabindex="7" placeholder="Describe yourself here..." >{{(isset($model->notes))?$model->notes:''}} </textarea>

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
                        <label class="itemcost">First Name</label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="first_name"
                            value="{{$contact->first_name}}" tabindex="8" />
                        </div>
                    </div>
                    <div class="form-group train-deet">
                        <label class="itemcost">Last Name</label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="last_name"
                            value="{{$contact->last_name}}" tabindex="9" />
                        </div>
                    </div>

                    <div class="form-group train-deet">
                        <label class="itemcost">Phone Number</label>
                        <div class="input-error">
                            <input type="number" class="form-control" name="phone_number"
                            value="{{$contact->phone_number}}" tabindex="10"/>
                        </div>
                    </div>


                    <div class="form-group train-deet">
                        <label class="itemcost">Mobile Number</label>
                        <div class="input-error">
                            <input type="number" class="form-control" name="mobile_number"
                            value="{{$contact->mobile_number}}" tabindex="11"/>
                        </div>
                    </div>
                    <div class="form-group train-deet">
                        <label class="itemcost">Email Address</label>
                        <div class="input-error">
                            <input type="email" class="form-control" name="email" value="{{$contact->email}}" tabindex="12"/>
                        </div>
                    </div>

                    <div class="form-group train-deet">
                        <label class="itemcost">Job Title </label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="job_title" value="{{$contact->job_title}}" tabindex="13"/>
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
                        <label class="text-label">First Name</label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="first_name" value="" tabindex="8"/>
                        </div>
                    </div>
                    <div class="form-group train-deet">
                        <label class="text-label">Last Name</label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="last_name" value="" tabindex="9" />
                        </div>
                    </div>

                    <div class="form-group train-deet">
                        <label class="text-label">Phone Number</label>
                        <div class="input-error">
                            <input type="number" class="form-control" name="phone_number"
                            value="" tabindex="10" />
                        </div>
                    </div>


                    <div class="form-group train-deet">
                        <label class="text-label">Mobile Number</label>
                        <div class="input-error">
                            <input type="number" class="form-control" name="mobile_number"
                            value="" tabindex="11" />
                        </div>
                    </div>
                    <div class="form-group train-deet">
                        <label class="text-label">Email Address</label>
                        <div class="input-error">
                            <input type="email" class="form-control" name="email" value="" tabindex="12" />
                        </div>
                    </div>

                    <div class="form-group train-deet">
                        <label class="text-label">Job Title </label>
                        <div class="input-error">
                            <input type="text" class="form-control" name="job_title" value="" tabindex="13"/> 
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
