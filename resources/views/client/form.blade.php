<div>
    <h4>Company Details</h4>
    <section>
        <div class="row">
            <div class="col-lg-12 mb-4 form-style">
                <div class="form-group train-deet">
                    <label class="text-label">Company Name*</label>
                    {{-- <input type="text" name="firstName" class="form-control" placeholder="" required> --}}
                    <input class="form-control" id="company_name" type="text" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}" aria-describedby="login-company_name" autofocus="" tabindex="1" required />
                    @error('company_name')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Address Line 1</label>
                    <input class="form-control" id="address_one" type="text" name="address_one" placeholder="Address.." value="{{ old('address_one') }}" aria-describedby="login-address_one" autofocus="" tabindex="1" required />
                    @error('address_one')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Address Line 2</label>
                    <input class="form-control" id="address_tow" type="text" name="address_tow" placeholder="Address.." value="{{ old('address_tow') }}" aria-describedby="login-address_tow" autofocus="" tabindex="1" required />
                    @error('address_tow')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Town</label>
                    <input class="form-control" id="town" type="text" name="town" placeholder="Town" value="{{ old('town') }}" aria-describedby="login-town" autofocus="" tabindex="1" required />
                    @error('town')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Country</label>
                    <input class="form-control" id="country" type="text" name="country" placeholder="Country" value="{{ old('country') }}" aria-describedby="login-country" autofocus="" tabindex="1" required />
                    @error('country')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Post Code</label>
                    <input class="form-control" id="post_code" type="text" name="post_code" placeholder="Post Code" value="{{ old('post_code') }}" aria-describedby="login-post_code" autofocus="" tabindex="1" required />
                    @error('post_code')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group train-deet">
                    <label class="text-label">Notes</label>
                    <input class="form-control" id="notes" type="text" name="notes" placeholder="Notes" value="{{ old('notes') }}" aria-describedby="login-notes" autofocus="" tabindex="1" required />
                    @error('notes')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </section>
    <div id="contact_div">
        <h4>Contact Details</h4>
        <div id="contact_form">
            <section>
                <div class="row">
                    <div class="col-lg-12 mb-4 form-style">
                        <div class="form-group train-deet">
                            <label class="text-label">First Name*</label>
                            <input class="form-control" id="first_name" type="text" name="first_name[]" placeholder="First Name" value="{{ old('first_name') }}" aria-describedby="login-first_name" autofocus="" tabindex="1" required />
                            @error('first_name')
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                    
                        <div class="form-group train-deet">
                            <label class="text-label">Last Name*</label>
                            <input class="form-control" id="last_name" type="text" name="last_name[]" placeholder="Last Name" value="{{ old('last_name') }}" aria-describedby="login-last_name" autofocus="" tabindex="1" required />
                            @error('last_name')
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                   
                   
                    
                        <div class="form-group train-deet">
                            <label class="text-label">Phone Number*</label>
                            <div class="input-group">
                                <input class="form-control" id="phone_number" type="text" name="phone_number[]" placeholder="Phone Number" value="{{ old('phone_number') }}" aria-describedby="login-phone_number" autofocus="" tabindex="1" required />
                                @error('phone_number')
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                    
                        <div class="form-group train-deet">
                            <label class="text-label">Mobile Number*</label>
                            <div class="input-group">
                                <input class="form-control" id="mobile_number" type="text" name="mobile_number[]" placeholder="Mobile Number" value="{{ old('mobile_number') }}" aria-describedby="login-mobile_number" autofocus="" tabindex="1" required />
                                @error('mobile_number')
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group train-deet">
                            <label class="text-label">Email Address*</label>
                            <div class="input-group">
                                <input class="form-control" id="email" type="text" name="email[]" placeholder="email Address" value="{{ old('email') }}" aria-describedby="login-email" autofocus="" tabindex="1" required />
                                @error('email')
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group train-deet">
                            <label class="text-label">Job Title*</label>
                            <input class="form-control" id="job_title" type="text" name="job_title[]" placeholder="Job Title" value="{{ old('job_title') }}" aria-describedby="login-job_title" autofocus="" tabindex="1" required />
                            @error('job_title')
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>