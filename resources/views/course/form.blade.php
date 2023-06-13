<div>
    <h4>Course Details</h4>
    <section>
        <div class="row">
            <div class="col-lg-12 mb-4 form-style">
                <div class="form-group">
                    <label class="text-label">Name of Course*</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="course_category_id" name="course_category_id" >
                        <option selected>Select Course</option>
                        <!-- <option value="1">Influencing Course</option> -->
                        @if(count($courseCategory) > 0)
                            @foreach ($courseCategory as $key=> $category)
                                <option value="{{ $category->id }}">{{ $category->course_name}}</option>
                            @endforeach
                        @endif
                        </select>
                </div>
                <div class="form-group dat-o-c">
                    <label class="text-label headi-doc">Date of Course</label>
                    <input type="date" name="start_date" class="form-control" placeholder="" required>
                </div>
                <div class="form-group dat-o-c">
                    <label class="text-label headi-doc">Questionnaire End Date</label>
                    <input type="date" name="end_date" class="form-control" placeholder="" required>
                </div>
                
                    <div class="form-group">
                        <label class="text-label">Course Duration</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="duration" name="duration">
                            <option selected>Select Duration</option>
                            <option value="1">0.5 Days</option>
                            <option value="2">1 Days</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="text-label">Client</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="client_id" name="client_id">
                            <option selected>Please Select</option>
                            @if(count($clientList) > 0)
                                @foreach ($clientList as $key=> $client)
                                    <option value="{{ $client->id }}">{{ $client->company_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-label">Path</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="path" name="path" >
                            <option selected>Please Select</option>
                            <option value="1">Automated email</option>
                            <option value="2">PDF download</option>
                            </select>
                    </div>
                </div>
        </div>
    </section>
    <h4>Trainer Details</h4>
    <!-- <section> -->
    <hr>
    <div data-repeater-list="invoice">
        <div data-repeater-item>
            <div class="row d-flex align-items-end">
            <div class="col-lg-12 mb-4 form-style">
                    <div class="form-group train-deet">
                        <label class="itemcost">First Name<span class="filedrequired"> *</span></label>
                        <input type="text" class="form-control" name="first_name"
                            value="" />
                    </div>
                    <div class="form-group train-deet">
                        <label class="itemcost">Last Name<span class="filedrequired"> *</span></label>
                        <input type="text" class="form-control" name="last_name"
                            value="" />
                    </div>
                    <div class="form-group train-deet">
                        <label class="itemcost">Email Address<span class="filedrequired"> *</span></label>
                        <input type="email" class="form-control" name="email"
                            value="" />
                    </div>
                    <div class="form-group train-deet">
                        <label class="itemcost">Confirm Email Address<span class="filedrequired"> *</span></label>
                        <input type="email" class="form-control" name="email" value="" />
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
    </div>
                                       
    <!-- </section> -->

</div>