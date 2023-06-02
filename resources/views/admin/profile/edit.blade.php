@extends('admin.layout.app')
@section('page_title','SRS')
@section('content')
<!-- users list start -->
<div class="container-fluid">
    <div class="row page-titles mx-0">
        
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{auth()->user()->name}}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-6 col-xxl-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Profile</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{route('profile.update',auth()->user()->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6 form-gap-2">
                                    <label>First Name</label>
                                    <input class="form-control" id="first_name" type="text" name="first_name" placeholder="Sue" value="{{auth()->user()->name}}" aria-describedby="login-first_name" autofocus="" tabindex="1" required />
                                        @error('first_name')
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-6 form-gap-2">
                                    <label>Last Name</label>
                                    <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Swindell" value="{{auth()->user()->name}}" aria-describedby="login-last_name" autofocus="" tabindex="1" required />
                                        @error('last_name')
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-6 form-gap-2">
                                    <label>Phone Number</label>
                                    <input class="form-control" id="phone_number" type="text" name="phone_number" placeholder="07850185351" value="{{ old('phone_number') }}" aria-describedby="login-phone_number" autofocus="" tabindex="1" required />
                                        @error('phone_number')
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-6 form-gap-2">
                                    <label>Mobile Number</label>
                                    <input class="form-control" id="mobile_number" type="text" name="mobile_number" placeholder="07850185351" value="{{ old('mobile_number') }}" aria-describedby="login-mobile_number" autofocus="" tabindex="1" required />
                                        @error('mobile_number')
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-6 form-gap-2">
                                    <label>Email Address</label>
                                    <input class="form-control" id="email" type="text" name="email" placeholder="sue.swindell@srs-development.co.uk" value="{{auth()->user()->email}}" aria-describedby="login-email" autofocus="" tabindex="1" required />
                                        @error('email')
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <input type="hidden" name="type" value="{{auth()->user()->type}}">
                                    <input type="hidden" name="status" value="{{auth()->user()->status}}">
                                </div>
                                <div class="form-group col-md-6 form-gap-2">
                                    <label>Confirm Email Address</label>
                                    <input class="form-control" id="confirm_email" type="text" name="confirm_email" placeholder="sue.swindell@srs-development.co.uk" value="{{ old('confirm_email') }}" aria-describedby="login-confirm_email" autofocus="" tabindex="1"  />
                                        @error('confirm_email')
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-6 form-gap-2">
                                    <label>Password</label>
                                    <input class="form-control" id="password" type="text" name="password" placeholder="" value="{{ old('password') }}" aria-describedby="login-password" autofocus="" tabindex="1"  />
                                        @error('password')
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-6 form-gap-2">
                                    <label>Confirm Password</label>
                                    <input class="form-control" id="confirm_password" type="text" name="confirm_password" placeholder="" value="{{ old('confirm_password') }}" aria-describedby="login-confirm_password" autofocus="" tabindex="1"  />
                                        @error('confirm_password')
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="submit" class="btn btn-primary">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- users list ends -->
@endsection
