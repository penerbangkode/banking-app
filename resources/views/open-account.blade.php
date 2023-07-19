@extends('layouts.template-no-auth')
@section('title', 'Open Account')
@push('css')
    <link href="{{ asset('css/wizard.css') }}" rel="stylesheet" type="text/css" />
@endpush


@section('content')
<div class="kt-wizard-v4" id="kt_wizard_v4" data-ktwizard-state="step-first">

    <!--begin: Form Wizard Nav -->
    <div class="kt-wizard-v4__nav">

        <!--doc: Remove "kt-wizard-v4__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
        <div class="kt-wizard-v4__nav-items kt-wizard-v4__nav-items--clickable">
            <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        1
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title">
                            Profile Detail
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            Setup Your Profile
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        2
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title">
                            Document
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            Complete Your Document
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        3
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title">
                            Account Type
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            Select Your Account Type
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        4
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title">
                            Completed
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            Review and Submit
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <!--end: Form Wizard Nav -->
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-grid">
                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                    <!--begin: Form Wizard Form-->
                    <form class="kt-form" id="kt_form" method="POST" action="{{ route('auth.customer-register') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            <div class="kt-heading kt-heading--md">Enter your Profile Details</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v4__form">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                        <span class="form-text  ">Please enter your first name.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                        <span class="form-text  ">Please enter your last name.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control kt-select2 gender" name="gender">
                                            <option></option>
                                            @foreach ($genders as $genders )
                                                <option value="{{ $genders->rule_value }}">{{ $genders->description }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text  ">Please Select your Gender.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Place Of Birth</label>
                                        <input type="text" class="form-control" name="place_of_birth" placeholder="Place Of Birth">
                                        <span class="form-text  ">Please enter your last name.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Date Of Birth</label>
                                        <input type="text" class="form-control" placeholder="DD/MM/YYYY" id="kt_datepicker_4_3" name="date_of_birth">
                                        <span class="form-text  ">Please enter your last name.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Mother Name</label>
                                        <input type="text" class="form-control" name="mother_name" placeholder="Mother Name">
                                        <span class="form-text  ">Please enter your Mother Name.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="phone" placeholder="+628XXXXXXX">
                                        <span class="form-text  ">Please enter your phone number.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        <span class="form-text  ">Please enter your email address.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <span class="form-text  ">Please enter your Password.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Nationality</label>
                                        <select class="form-control kt-select2 nationality" name="nationality">
                                            <option></option>
                                            @foreach ($nationality as $national )
                                                <option value="{{ $national->id }}">{{ $national->description }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text  ">Please Select your Nationality.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Identity Type</label>
                                        <select class="form-control kt-select2 identity" name="identity_type">
                                            <option></option>
                                            @foreach ($identity as $ident )
                                                <option value="{{ $ident->id }}">{{ $ident->description }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text  ">Please Select your Idnetity.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Identity No</label>
                                        <input type="text" class="form-control" name="identity_no" placeholder="000123000">
                                        <span class="form-text  ">Please enter your Identity No.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>NPWP No</label>
                                        <input type="text" class="form-control" name="npwp_no" placeholder="000123000">
                                        <span class="form-text  ">Please enter your NPWP No.</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" id="Address" rows="3" name="address"></textarea>
                                        <span class="form-text  ">Please enter your address.</span>
                                    </div>
                                    <div class="form-group" id="province-select">
                                        <label>Province</label>
                                        <select class="form-control kt-select2 province" name="province">
                                            <option></option>
                                            @foreach ($provinces as $province )
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text  ">Select Your Province</span>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control kt-select2 city" name="city">
                                            <option> </option>
                                        </select>
                                        <span class="form-text  ">Select Province To Show City</span>
                                    </div>
                                    <div class="form-group">
                                        <label>District</label>
                                        <select class="form-control kt-select2 district" name="district">
                                            <option> </option>
                                        </select>
                                        <span class="form-text  ">Select City To Show District</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Village</label>
                                        <select class="form-control kt-select2 village" name="village">
                                            <option> </option>
                                        </select>
                                        <span class="form-text  ">Select District To Show Village</span>
                                    </div>
                                    <div class="form-group">
                                       <label class="kt-checkbox kt-checkbox--brand">
                                            <input type="checkbox" class="is-domicile" name="is_domicile_match_identity"> Address Same As Domicile?
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="form-group" id="province-dom-select">
                                        <label>Province</label>
                                        <select class="form-control kt-select2 province-dom" name="province_dom">
                                            <option></option>
                                            @foreach ($provinces as $province )
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text  ">Select Your Province</span>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control kt-select2 city-dom" name="city_dom">
                                            <option> </option>
                                        </select>
                                        <span class="form-text  ">Select Province To Show City</span>
                                    </div>
                                    <div class="form-group">
                                        <label>District</label>
                                        <select class="form-control kt-select2 district-dom" name="district_dom">
                                            <option> </option>
                                        </select>
                                        <span class="form-text  ">Select City To Show District</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Village</label>
                                        <select class="form-control kt-select2 village-dom" name="village_dom">
                                            <option> </option>
                                        </select>
                                        <span class="form-text  ">Select District To Show Village</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Upload Your Document</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v4__form">
                                    <div class="form-group">
                                        <label>Identity Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="identity" name="identity_photo">
                                            <label class="custom-file-label" for="identity">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Selfie Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="selfie" name="selfie_photo">
                                            <label class="custom-file-label" for="selfie">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Npwp Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="npwp" name="npwp_photo">
                                            <label class="custom-file-label" for="npwp">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            <div class="kt-heading kt-heading--md">Enter your Profile Details</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v4__form">
                                    <div class="form-group">
                                        <label>Account Type</label>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                @foreach ($accounts as $account )
                                                <div class="col-lg-6">
                                                    <label class="kt-option">
                                                        <span class="kt-option__control">
                                                            <span class="kt-radio kt-radio--bold kt-radio--brand" checked="">
                                                                <input type="radio" name="account_type" value="{{ $account->id }}">
                                                                <span></span>
                                                            </span>
                                                        </span>
                                                        <span class="kt-option__label">
                                                            <span class="kt-option__head">
                                                                <span class="kt-option__title">
                                                                    {{ $account->type_name }}
                                                                </span>
                                                            </span>
                                                            <span class="kt-option__body">
                                                               limit Balance Rp.  @currency($account->limit_balance)
                                                            </span>
                                                            <span class="kt-option__body">
                                                               limit Transfer Daily Rp.  @currency($account->limit_transfer_daily)
                                                            </span>
                                                            <span class="kt-option__body">
                                                               limit Withdrawal Daily Rp.  @currency($account->limit_witdhraw_daily)
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Card Type</label>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                @foreach ($cards as $card )
                                                <div class="col-lg-6">
                                                    <label class="kt-option">
                                                        <span class="kt-option__control">
                                                            <span class="kt-radio kt-radio--bold kt-radio--brand" checked="">
                                                                <input type="radio" name="card_type" value="{{ $card->id }}">
                                                                <span></span>
                                                            </span>
                                                        </span>
                                                        <span class="kt-option__label">
                                                            <span class="kt-option__head">
                                                                <span class="kt-option__title">
                                                                    {{ $card->type_name }}
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <span class="form-text  ">Please Select your Card Type.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 3-->

                        {{-- <!--begin: Form Wizard Step 4-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Review your Details and Submit</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v4__review">
                                    <div class="kt-wizard-v4__review-item">
                                        <div class="kt-wizard-v4__review-title">
                                            Your Account Details
                                        </div>
                                        <div class="kt-wizard-v4__review-content">
                                            John Wick<br />
                                            Phone: +61412345678<br />
                                            Email: johnwick@reeves.com
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v4__review-item">
                                        <div class="kt-wizard-v4__review-title">
                                            Your Address Details
                                        </div>
                                        <div class="kt-wizard-v4__review-content">
                                            Address Line 1<br />
                                            Address Line 2<br />
                                            Melbourne 3000, VIC, Australia
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v4__review-item">
                                        <div class="kt-wizard-v4__review-title">
                                            Payment Details
                                        </div>
                                        <div class="kt-wizard-v4__review-content">
                                            Card Number: xxxx xxxx xxxx 1111<br />
                                            Card Name: John Wick<br />
                                            Card Expiry: 01/21
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Actions -->
                        <div class="kt-form__actions">
                            <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                Previous
                            </button>
                            <button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                                Submit
                            </button>
                            <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                Next Step
                            </button>
                        </div>

                        <!--end: Form Actions -->
                    </form>

                    <!--end: Form Wizard Form-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('js/wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/datepicker.js') }}" type="text/javascript"></script>
<script>
        $('.kt-select2.account').select2({
            placeholder: "Select Account",
        });

        $('.kt-select2.gender').select2({
            placeholder: "Select Gender",
        });

        $('.kt-select2.nationality').select2({
            placeholder: "Select Nationality",
        });

        $('.kt-select2.identity').select2({
            placeholder: "Select Identity",
        });

        $('.kt-select2.province').select2({
            placeholder: "Select Province",
        });


        $('.kt-select2.city').select2({
            placeholder: "Select City",
        });

        $('.kt-select2.district').select2({
            placeholder: "Select District",
        });

        $('.kt-select2.village').select2({
            placeholder: "Select Village",
        });

        $('.kt-select2.province-dom').select2({
            placeholder: "Select Province",
        });

        $('.kt-select2.city-dom').select2({
            placeholder: "Select City",
        });

        $('.kt-select2.district-dom').select2({
            placeholder: "Select District",
        });

        $('.kt-select2.village-dom').select2({
            placeholder: "Select Village",
        });

        getCity = (province_id) => {
           $.ajax({
                url: '{{ route('city') }}',
                type: "get", //send it through get method
                data: {
                    province: province_id,
                },
                success: function(response) {
                    implementCity(response)
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        }

        getDistrict = (city_id) => {
           $.ajax({
                url: '{{ route('district') }}',
                type: "get", //send it through get method
                data: {
                    regency: city_id,
                },
                success: function(response) {
                    implementDistrict(response)
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        }

        getVillage = (district_id) => {
           $.ajax({
                url: '{{ route('village') }}',
                type: "get", //send it through get method
                data: {
                    district: district_id,
                },
                success: function(response) {
                    implementVillage(response)
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        }

        getCityDom = (province_id) => {
           $.ajax({
                url: '{{ route('city') }}',
                type: "get", //send it through get method
                data: {
                    province: province_id,
                },
                success: function(response) {
                    implementCityDom(response)
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        }

        getDistrictDom = (city_id) => {
           $.ajax({
                url: '{{ route('district') }}',
                type: "get", //send it through get method
                data: {
                    regency: city_id,
                },
                success: function(response) {
                    implementDistrictDom(response)
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        }

        getVillageDom = (district_id) => {
           $.ajax({
                url: '{{ route('village') }}',
                type: "get", //send it through get method
                data: {
                    district: district_id,
                },
                success: function(response) {
                    implementVillageDom(response)
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        }

        $('.kt-select2.province').on("select2:select", function(e) {
            getCity(this.value);
        });

        $('.kt-select2.city').on("select2:select", function(e) {
            getDistrict(this.value);
        });

        $('.kt-select2.district').on("select2:select", function(e) {
            getVillage(this.value);
        });

        $('.kt-select2.province-dom').on("select2:select", function(e) {
            getCityDom(this.value);
        });

        $('.kt-select2.city-dom').on("select2:select", function(e) {
            getDistrictDom(this.value);
        });

        $('.kt-select2.district-dom').on("select2:select", function(e) {
            getVillageDom(this.value);
        });

        implementCity = (data) => {
            $.each(data, function(key, value){
                console.log(value.id, value.name)
                let cityOption = new Option(value.name, value.id, false, false);
                $('.kt-select2.city').append(cityOption).trigger('change')
            })
        }

        implementDistrict = (data) => {
            $.each(data, function(key, value){
                console.log(value.id, value.name)
                let cityOption = new Option(value.name, value.id, false, false);
                $('.kt-select2.district').append(cityOption).trigger('change')
            })
        }

        implementVillage = (data) => {
            $.each(data, function(key, value){
                console.log(value.id, value.name)
                let cityOption = new Option(value.name, value.id, false, false);
                $('.kt-select2.village').append(cityOption).trigger('change')
            })
        }

        implementCityDom = (data) => {
            $.each(data, function(key, value){
                console.log(value.id, value.name)
                let cityOption = new Option(value.name, value.id, false, false);
                $('.kt-select2.city-dom').append(cityOption).trigger('change')
            })
        }

        implementDistrictDom = (data) => {
            $.each(data, function(key, value){
                console.log(value.id, value.name)
                let cityOption = new Option(value.name, value.id, false, false);
                $('.kt-select2.district-dom').append(cityOption).trigger('change')
            })
        }

        implementVillageDom = (data) => {
            $.each(data, function(key, value){
                console.log(value.id, value.name)
                let cityOption = new Option(value.name, value.id, false, false);
                $('.kt-select2.village-dom').append(cityOption).trigger('change')
            })
        }

        $(".is-domicile").change(function() {
            if(this.checked) {
                $('.kt-select2.province-dom').prop('disabled', true)
                $('.kt-select2.city-dom').prop('disabled', true)
                $('.kt-select2.district-dom').prop('disabled', true)
                $('.kt-select2.village-dom').prop('disabled', true)
            }
            else{
                $('.kt-select2.province-dom').prop('disabled', false)
                $('.kt-select2.city-dom').prop('disabled', false)
                $('.kt-select2.district-dom').prop('disabled', false)
                $('.kt-select2.village-dom').prop('disabled', false)
            }
        });
</script>
@endpush
