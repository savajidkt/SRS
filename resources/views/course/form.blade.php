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

                <input type="hidden" name="course_category_id" id="course_category_id" class="form-control"
                value="{{ $courseCategory->id }}">
            <input type="hidden" name="path" id="path" class="form-control" value="1">
                
                <div class="form-group dat-o-c">
                    <label class="text-label headi-doc">Date of Course<span class="filedrequired">*</span></label>
                    <div class="input-error">
                        <input type="text" name="start_date" id="start_date" class="form-control" value="{{(isset($model->start_date))?$model->start_date:''}}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group dat-o-c">
                    <label class="text-label">Questionnaire End Date<span class="filedrequired">*</span></label>
                    <div class="input-error">
                        <input type="text" name="end_date" id="end_date" class="form-control" value="{{(isset($model->end_date))?$model->end_date:''}}" placeholder="" required>
                    </div>
                </div>
                
                    <div class="form-group">
                        <label class="text-label">Course Duration<span class="filedrequired">*</span></label>
                        <div class="input-error">
                            <select class="form-select form-select-sm select2" aria-label=".form-select-sm example" id="duration" name="duration">
                                <option value="">Select Duration</option>
                                <option value="0.5" {{ isset($model->duration) && $model->duration == '0.5' ? 'selected' : '' }}>0.5 Days</option>
                                <option value="1" {{ isset($model->duration) && $model->duration == '1' ? 'selected' : '' }}>1 Days</option>
                                <option value="1.5" {{ isset($model->duration) && $model->duration == '1.5' ? 'selected' : '' }}>1.5 Days</option>
                                <option value="2" {{ isset($model->duration) && $model->duration == '2' ? 'selected' : '' }}>2 Days</option>
                                <option value="2.5" {{ isset($model->duration) && $model->duration == '2.5' ? 'selected' : '' }}>2.5 Days</option>
                                <option value="3" {{ isset($model->duration) && $model->duration == '3' ? 'selected' : '' }}>3 Days</option>
                                <option value="3.5" {{ isset($model->duration) && $model->duration == '3.5' ? 'selected' : '' }}>3.5 Days</option>
                                <option value="4" {{ isset($model->duration) && $model->duration == '4' ? 'selected' : '' }}>4 Days</option>
                                <option value="4.5" {{ isset($model->duration) && $model->duration == '4.5' ? 'selected' : '' }}>4.5 Days</option>
                                <option value="5" {{ isset($model->duration) && $model->duration == '5' ? 'selected' : '' }}>5 Days</option>
                                <option value="5.5" {{ isset($model->duration) && $model->duration == '5.5' ? 'selected' : '' }}>5.5 Days</option>
                                <option value="6" {{ isset($model->duration) && $model->duration == '6' ? 'selected' : '' }}>6 Days</option>
                                <option value="6.5" {{ isset($model->duration) && $model->duration == '6.5' ? 'selected' : '' }}>6.5 Days</option>
                                <option value="7" {{ isset($model->duration) && $model->duration == '7' ? 'selected' : '' }}>7 Days</option>
                                <option value="7.5" {{ isset($model->duration) && $model->duration == '7.5' ? 'selected' : '' }}>7.5 Days</option>
                                <option value="8" {{ isset($model->duration) && $model->duration == '8' ? 'selected' : '' }}>8 Days</option>
                                <option value="8.5" {{ isset($model->duration) && $model->duration == '8.5' ? 'selected' : '' }}>8.5 Days</option>
                                <option value="9" {{ isset($model->duration) && $model->duration == '9' ? 'selected' : '' }}>9 Days</option>
                                <option value="9.5" {{ isset($model->duration) && $model->duration == '9.5' ? 'selected' : '' }}>9.5 Days</option>
                                <option value="10" {{ isset($model->duration) && $model->duration == '10' ? 'selected' : '' }}>10 Days</option>
                                <option value="10.5" {{ isset($model->duration) && $model->duration == '10.5' ? 'selected' : '' }}>10.5 Days</option>
                                <option value="11" {{ isset($model->duration) && $model->duration == '11' ? 'selected' : '' }}>11 Days</option>
                                <option value="11.5" {{ isset($model->duration) && $model->duration == '11.5' ? 'selected' : '' }}>11.5 Days</option>
                                <option value="12" {{ isset($model->duration) && $model->duration == '12' ? 'selected' : '' }}>12 Days</option>
                                <option value="12.5" {{ isset($model->duration) && $model->duration == '12.5' ? 'selected' : '' }}>12.5 Days</option>
                                <option value="13" {{ isset($model->duration) && $model->duration == '13' ? 'selected' : '' }}>13 Days</option>
                                <option value="13.5" {{ isset($model->duration) && $model->duration == '13.5' ? 'selected' : '' }}>13.5 Days</option>
                                <option value="14" {{ isset($model->duration) && $model->duration == '14' ? 'selected' : '' }}>14 Days</option>
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
                    
                </div>
        </div>
    </section>
    <hr>
    <h4><strong>Trainer Details</strong></h4>
    <br/>
    <!-- <section> -->
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
                                    value="{{$trainer->first_name}}" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" />
                                </div>
                            </div>
                            <div class="form-group train-deet">
                                <label class="itemcost">Last Name<span class="filedrequired">*</span></label>
                                <div class="input-error">
                                    <input type="text" class="form-control" name="last_name"
                                    value="{{$trainer->last_name}}" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" />
                                </div>
                            </div>
                            <div class="form-group train-deet">
                                <label class="itemcost email-customize">Email Address<span class="filedrequired">*</span></label>
                                <div class="input-error">
                                    <input type="email" class="form-control" name="email" value="{{$trainer->email}}" email-id="email" id="email_{{ $key }}" />
                                </div>
                            </div>
                            <div class="form-group train-deet">
                                <label class="itemcost">Confirm Email Address<span class="filedrequired">*</span></label>
                                <div class="input-error">
                                    <input type="email" class="form-control" name="email_confirm"  value="{{$trainer->email}}" id="confirm_email_0" confirm-email-id="confirm_email" />
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
                                value="" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" />
                            </div>
                        </div>
                        <div class="form-group train-deet">
                            <label class="itemcost">Last Name<span class="filedrequired">*</span></label>
                            <div class="input-error">
                                <input type="text" class="form-control" name="last_name"
                                value="" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" />
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