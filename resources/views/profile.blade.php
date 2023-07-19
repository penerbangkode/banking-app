@extends('layouts.template')
@section('title', 'Profile')
@section('name',  $customer_personal->full_name)


@section('content')
<div class="row justify-content-center">
    <div class="col-xl-5">

        <!--Begin::Portlet-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--noborder">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin::Widget -->
                <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__head">
                        <div class="kt-widget__media">
                            <img class="kt-widget__img kt-hidden-" src="{{ asset('images/user-default.png') }}" alt="image">
                        </div>
                        <div class="kt-widget__info">
                            <a href="#" class="kt-widget__username">
                                {{ $customer_personal->full_name }}
                            </a>
                        </div>
                    </div>
                    <div class="kt-widget__body mt-5">
                        <div class="kt-widget__content">
                            <div class="kt-widget__stats kt-margin-r-20">
                                <div class="kt-widget__details">
                                    <span class="kt-widget__title">Balance</span>
                                    <span class="kt-widget__value">@currency($account->balance)</span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__item">
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Account No:</span>
                                <a href="#" class="kt-widget__data">{{ $account->account_no }}</a>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Email:</span>
                                <a href="#" class="kt-widget__data">{{ $customer->username }}</a>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Phone:</span>
                                <a href="#" class="kt-widget__data">{{ $customer_personal->phone }}</a>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Place Of Birth:</span>
                                <a href="#" class="kt-widget__data">{{ $customer_personal->place_of_birth }}</a>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Date Of Birth:</span>
                                <a href="#" class="kt-widget__data">{{ Carbon\Carbon::parse($customer_personal->date_of_birth)->format('d-m-Y') }}</a>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Identity_no:</span>
                                <a href="#" class="kt-widget__data">{{ $customer_personal->identity_no }}</a>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">NPWP No:</span>
                                <a href="#" class="kt-widget__data">{{ $customer_personal->npwp_no }}</a>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Address:</span>
                                <span class="kt-widget__data">{{ $customer_personal->identity_address }}</span>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Mother Name:</span>
                                <span class="kt-widget__data">{{ $customer_personal->mother_name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="kt-widget__footer">
                        <button type="button" class="btn btn-label-success btn-lg btn-upper" onclick="window.location.href='{{ route('dashboard') }}'">Back To Dashboard</button>
                    </div>
                </div>

                <!--end::Widget -->

                <!--begin::Navigation -->
                <ul class="kt-nav kt-nav--bold kt-nav--md-space kt-margin-t-20 kt-margin-b-20 kt-hidden" role="tablist">
                    <li class="kt-nav__item kt-nav__item--active">
                        <a class="kt-nav__link active" data-toggle="tab" href="#kt_profile_tab_personal_information" role="tab">
                            <span class="kt-nav__link-icon"><i class="flaticon2-calendar-3"></i></span>
                            <span class="kt-nav__link-text">Personal Information</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a class="kt-nav__link" data-toggle="tab" href="#kt_profile_tab_account_information" role="tab">
                            <span class="kt-nav__link-icon"><i class="flaticon2-protected"></i></span>
                            <span class="kt-nav__link-text">Acccount Information</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a class="kt-nav__link" href="#" role="tab" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="This feature is coming soon!">
                            <span class="kt-nav__link-icon"><i class="flaticon2-hourglass-1"></i></span>
                            <span class="kt-nav__link-text">Payments</span>
                        </a>
                    </li>
                    <li class="kt-nav__separator"></li>
                    <li class="kt-nav__item">
                        <a class="kt-nav__link" href="#" role="tab" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="This feature is coming soon!">
                            <span class="kt-nav__link-icon"><i class="flaticon2-bell-2"></i></span>
                            <span class="kt-nav__link-text">Statements</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a class="kt-nav__link" href="#" role="tab" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="This feature is coming soon!">
                            <span class="kt-nav__link-icon"><i class="flaticon2-medical-records-1"></i></span>
                            <span class="kt-nav__link-text">Audit Log</span>
                        </a>
                    </li>
                </ul>

                <!--end::Navigation -->
            </div>
        </div>

        <!--End::Portlet-->
    </div>
</div>
@endsection
