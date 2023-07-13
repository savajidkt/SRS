@php
$mycountphp = 1;
    if(count($model->trainerDetail) > 0){
        $mycountphp = count($model->trainerDetail);
    }   
    
@endphp

<script>
    var myCount = {{ $mycountphp }};   
</script>
<div>
    <hr>
    <h4><strong>Course Details</strong></h4>
    <hr>
    <section>
        <div class="row">
            <div class="col-lg-12 mb-4 form-style">
                <div class="form-group">
                    <label class="text-label">Name of Course<span class="filedrequired">*</span></label>
                    <div class="input-error">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="course_category_id" name="course_category_id" >
                            {{-- <option value="">Select Course</option> --}}
                            @if(count($courseCategory) > 0)
                                @foreach ($courseCategory as $key=> $category)
                                    <option value="{{ $category->id }}" {{ ($model->course_category_id == $category->id) ? 'selected' : '' }}>{{ $category->course_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group dat-o-c">
                    <label class="text-label headi-doc">Date of Course<span class="filedrequired">*</span></label>
                    <div class="input-error">
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{(isset($model->start_date))?$model->start_date:''}}" onchange="Func_a(this)" placeholder="" required>
                    </div>
                </div>
                <div class="form-group dat-o-c">
                    <label class="text-label headi-doc">Questionnaire End Date<span class="filedrequired"> *</span></label>
                    <div class="input-error">
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{(isset($model->end_date))?$model->end_date:''}}" placeholder="" required>
                    </div>
                </div>
                
                    <div class="form-group">
                        <label class="text-label">Course Duration<span class="filedrequired">*</span></label>
                        <div class="input-error">
                            <select class="form-select form-select-sm select2" aria-label=".form-select-sm example" id="duration" name="duration">
                                <option value="">Select Duration</option>
                                <option value="0.5 Days" {{ isset($model->duration) && $model->duration == '0.5 Days' ? 'selected' : '' }}>0.5 Days</option>
                                <option value="1 Days" {{ isset($model->duration) && $model->duration == '1 Days' ? 'selected' : '' }}>1 Days</option>
                                <option value="1.5 Days" {{ isset($model->duration) && $model->duration == '1.5 Days' ? 'selected' : '' }}>1.5 Days</option>
                                <option value="2 Days" {{ isset($model->duration) && $model->duration == '2 Days' ? 'selected' : '' }}>2 Days</option>
                                <option value="2.5 Days" {{ isset($model->duration) && $model->duration == '2.5 Days' ? 'selected' : '' }}>2.5 Days</option>
                                <option value="3 Days" {{ isset($model->duration) && $model->duration == '3 Days' ? 'selected' : '' }}>3 Days</option>
                                <option value="3.5 Days" {{ isset($model->duration) && $model->duration == '3.5 Days' ? 'selected' : '' }}>3.5 Days</option>
                                <option value="4 Days" {{ isset($model->duration) && $model->duration == '4 Days' ? 'selected' : '' }}>4 Days</option>
                                <option value="4.5 Days" {{ isset($model->duration) && $model->duration == '4.5 Days' ? 'selected' : '' }}>4.5 Days</option>
                                <option value="5 Days" {{ isset($model->duration) && $model->duration == '5 Days' ? 'selected' : '' }}>5 Days</option>
                                <option value="5.5 Days" {{ isset($model->duration) && $model->duration == '5.5 Days' ? 'selected' : '' }}>5.5 Days</option>
                                <option value="6 Days" {{ isset($model->duration) && $model->duration == '6 Days' ? 'selected' : '' }}>6 Days</option>
                                <option value="6.5 Days" {{ isset($model->duration) && $model->duration == '6.5 Days' ? 'selected' : '' }}>6.5 Days</option>
                                <option value="7 Days" {{ isset($model->duration) && $model->duration == '7 Days' ? 'selected' : '' }}>7 Days</option>
                                <option value="7.5 Days" {{ isset($model->duration) && $model->duration == '7.5 Days' ? 'selected' : '' }}>7.5 Days</option>
                                <option value="8 Days" {{ isset($model->duration) && $model->duration == '8 Days' ? 'selected' : '' }}>8 Days</option>
                                <option value="8.5 Days" {{ isset($model->duration) && $model->duration == '8.5 Days' ? 'selected' : '' }}>8.5 Days</option>
                                <option value="9 Days" {{ isset($model->duration) && $model->duration == '9 Days' ? 'selected' : '' }}>9 Days</option>
                                <option value="9.5 Days" {{ isset($model->duration) && $model->duration == '9.5 Days' ? 'selected' : '' }}>9.5 Days</option>
                                <option value="10 Days" {{ isset($model->duration) && $model->duration == '10 Days' ? 'selected' : '' }}>10 Days</option>
                                <option value="10.5 Days" {{ isset($model->duration) && $model->duration == '10.5 Days' ? 'selected' : '' }}>10.5 Days</option>
                                <option value="11 Days" {{ isset($model->duration) && $model->duration == '11 Days' ? 'selected' : '' }}>11 Days</option>
                                <option value="11.5 Days" {{ isset($model->duration) && $model->duration == '11.5 Days' ? 'selected' : '' }}>11.5 Days</option>
                                <option value="12 Days" {{ isset($model->duration) && $model->duration == '12 Days' ? 'selected' : '' }}>12 Days</option>
                                <option value="12.5 Days" {{ isset($model->duration) && $model->duration == '12.5 Days' ? 'selected' : '' }}>12.5 Days</option>
                                <option value="13 Days" {{ isset($model->duration) && $model->duration == '13 Days' ? 'selected' : '' }}>13 Days</option>
                                <option value="13.5 Days" {{ isset($model->duration) && $model->duration == '13.5 Days' ? 'selected' : '' }}>13.5 Days</option>
                                <option value="14 Days" {{ isset($model->duration) && $model->duration == '14 Days' ? 'selected' : '' }}>14 Days</option>
                            </select>
                            <div class="duration-error"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-label">Client<span class="filedrequired">*</span></label>
                        <div class="input-error">
                            <select class="form-select form-select-sm select2" aria-label=".form-select-sm example" id="client_id" name="client_id">
                                <option value="">Please Select</option>
                                @if(count($clientList) > 0)
                                    @foreach ($clientList as $key=> $client)
                                        <option value="{{ $client->id }}" {{ ($model->client_id == $client->id) ? 'selected' : '' }}>{{ $client->company_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="client_id-error"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-label">Path<span class="filedrequired">*</span></label>
                        <div class="input-error">
                            <select class="form-select form-select-sm " aria-label=".form-select-sm example" id="path" name="path" >
                                {{-- <option value="">Please Select</option> --}}
                                <option value="1" {{ isset($model->path) && $model->path == 1 ? 'selected' : '' }}>Automated email</option>
                                {{-- <option value="2" {{ isset($model->path) && $model->path == 2 ? 'selected' : '' }}>PDF download</option> --}}
                            </select>
                            <div class="path-error"></div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <hr>
    <h4><strong>Trainer Details</strong></h4>
    <!-- <section> -->
    <hr>
    <div data-repeater-list="invoice">
        @if(count($model->trainerDetail) > 0)
            @foreach ($model->trainerDetail as $key=> $trainer)
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="col-lg-12 mb-4 form-style">
                            <div class="form-group train-deet">
                                <label class="itemcost">First Name<span class="filedrequired">*</span></label>
                                <div class="input-error">
                                    <input type="text" class="form-control" name="first_name"
                                    value="{{$trainer->first_name}}" />
                                </div>
                            </div>
                            <div class="form-group train-deet">
                                <label class="itemcost">Last Name<span class="filedrequired">*</span></label>
                                <div class="input-error">
                                    <input type="text" class="form-control" name="last_name"
                                    value="{{$trainer->last_name}}" />
                                </div>
                            </div>
                            <div class="form-group train-deet">
                                <label class="itemcost">Email Address<span class="filedrequired">*</span></label>
                                <div class="input-error">
                                    <input type="email" class="form-control" name="email" value="{{$trainer->email}}" id="email_{{ $key }}" />
                                </div>
                            </div>
                            <div class="form-group train-deet">
                                <label class="itemcost">Confirm Email Address<span class="filedrequired">*</span></label>
                                <div class="input-error">
                                    <input type="email" class="form-control" name="email_confirm"  value="{{$trainer->email}}" />
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
                            <label class="itemcost">First Name<span class="filedrequired">*</span></label>
                            <div class="input-error">
                                <input type="text" class="form-control" name="first_name"
                                value="" />
                            </div>
                        </div>
                        <div class="form-group train-deet">
                            <label class="itemcost">Last Name<span class="filedrequired">*</span></label>
                            <div class="input-error">
                                <input type="text" class="form-control" name="last_name"
                                value="" />
                            </div>
                        </div>
                        <div class="form-group train-deet">
                            <label class="itemcost">Email Address<span class="filedrequired">*</span></label>
                            <div class="input-error">
                                <input type="email" class="form-control" name="email" value="" id="email_0" email-id="email"  />
                            </div>
                        </div>
                        <div class="form-group train-deet">
                            <label class="itemcost">Confirm Email Address<span class="filedrequired">*</span></label>
                            <div class="input-error">
                                <input type="email" class="form-control" name="email_confirm"  value="" id="confirm_email_0" confirm-email-id="confirm_email" />
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
                                       
    <!-- </section> -->

</div>