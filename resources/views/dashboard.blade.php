@extends('layouts.template')
@section('title', 'Dashboard')
@section('name',  $customer_personal->full_name)
@push('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=josefin+Sans:wght@400;500;600;700&display=swap');

.card-con {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Josefin Sans', sans-serif;
}

.card-con .container {
    width: 100%;
    /* background: #000; */
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-con .card {
    width: 500px;
    height: 300px;
    color: #fff;
    cursor: pointer;
    perspective: 1000px;
}

.card-con .card-inner {
    width: 100%;
    height: 100%;
    position: relative;
    transition: transform 1s;
    transform-style: preserve-3d;
}

.card-con .front, .back {
    width: 100%;
    height: 100%;
    background-image: linear-gradient(45deg, #0045c7, #ff2c7d);
    position: absolute;
    top: 0;
    left: 0;
    padding: 20px 30px;
    border-radius: 15px;
    overflow: hidden;
    z-index: 1;
    backface-visibility: hidden;
}

.card-con .row {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card-con .map-img {
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0.3;
    z-index: -1;
}

.card-con .card-no {
    font-size: 35px;
    margin-top: 60px;
}

.card-con .card-holder {
    font-size: 12px;
    margin-top: 40px;
}

.card-con .name {
    font-size: 22px;
    margin-top: 20px;
}

.card-con .bar {
    background: #222;
    margin-left: -30px;
    margin-right: -30px;
    height: 60px;
    margin-top: 10px;
}

.card-con .card-cvv {
    margin-top: 20px;
}

.card-con .card-cvv div {
    flex: 1;
}

.card-con .card-cvv img {
    width: 100%;
    display: block;
    line-height: 0;
}

.card-con .card-cvv p {
    background: #fff;
    color: #000;
    font-size: 22px;
    padding: 10px 20px;
}

.card-con .card-text {
    margin-top: 30px;
    font-size: 14px;
}

.card-con .signature {
    margin-top: 30px;
}

.card-con .back {
    transform: rotateY(180deg);
}

.card-con .card:hover .card-inner {
    transform: rotateY(-180deg);
}
    </style>
@endpush
@section('content')

    <!--Begin::Section-->
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-xl">
                <div class="col-md-12 col-lg-12 col-xl-12">

                    <!--begin:: Widgets/Stats2-1 -->
                    <div class="kt-widget1">
                        <div class="kt-widget1__item">
                            <div class="kt-widget1__info">
                                <h3 class="kt-widget1__title">Current Balance</h3>
                                <span class="kt-widget1__desc">As of {{ date('d-m-Y H:i:s') }}</span>
                            </div>
                            <span class="kt-widget1__number kt-font-brand">@currency($account->balance)</span>
                        </div>
                    </div>

                    <!--end:: Widgets/Stats2-1 -->
                </div>
            </div>
        </div>
    </div>

    <!--End::Section-->


        <!--Begin::Section-->
        <div class="row mb-5">
            <div class="col-xl-5 card-con pl-4 pt-5">

                <div class="kt-portlet kt-portlet--height-fluid" style="background: transparent;box-shadow: none;">
                    <div class="card">
                        <div class="card-inner">
                            <div class="front">
                                <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                                <div class="row">
                                    <img src="https://i.ibb.co/G9pDnYJ/chip.png" width="60px">
                                    <img src="https://i.ibb.co/WHZ3nRJ/visa.png" width="60px">
                                </div>
                                <div class="row card-no">
                                    @php
                                        $card_split = str_split($card->card_no, 4);
                                        foreach ($card_split as $number) {
                                            echo "<p>$number</p>";
                                        }
                                    @endphp
                                </div>
                                <div class="row name">
                                    <p>{{ strtoupper($card->card_name) }}</p>
                                    <p>{{ Carbon\Carbon::parse($card->expired_date)->format('m/y') }}</p>
                                </div>
                            </div>
                            <div class="back">
                                <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                                <div class="bar"></div>
                                <div class="row card-cvv">
                                    <div>
                                        <img src="https://i.ibb.co/S6JG8px/pattern.png">
                                    </div>
                                    <p>{{ $card->cvc }}</p>
                                </div>
                                <div class="row signature">
                                    <p></p>
                                    <img src="https://i.ibb.co/WHZ3nRJ/visa.png" width="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon"></span>
                            <h3 class="kt-portlet__head-title">Transfer</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            Account : {{ $account->account_no }} | Session Expired : <span class="countdown-holder"></span>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-portlet__content">
                            <form action="{{ route('transaction.submit') }}" method="POST">
                                @csrf
                                <div class="form-group ">
                                    @if (session('error-trf') || session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-text">{{ session('error-trf') }} {{ session('error') }}</div>
                                        </div>
                                    @elseif (session('success-trf'))
                                        <div class="alert alert-success" role="alert">
                                            <div class="alert-text">{{ session('success-trf') }}</div>
                                        </div>
                                    @endif
                                    <label>Account Number Received</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control account-search" placeholder="1212314213" name="account_no">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary find-account" type="button">Find!</button>
                                        </div>

                                    </div>
                                    <div class="form-group form-group-xs row">
                                        <label class="col-1 col-form-label">Name:</label>
                                        <div class="col-2">
                                            <span class="form-control-plaintext kt-font-bolder name-reciever"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label>Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" class="form-control amount" placeholder="0.00" aria-label="Amount to Transfer" name="amount">

                                    </div>
                                </div>
                                <div class="kt-form__actions">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">

                <!--begin:: Widgets/Best Sellers-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                History Transaction
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-datatable" id="kt_datatable_latest_orders"></div>
                    </div>
                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
            <div>

            </div>
        </div>
</div>
@endsection

@push('script')
    		<!--begin::Page Scripts(used by this page) -->
		<script src="{{ asset('js/dashboard.js') }}" type="text/javascript"></script>
        <script>
            jQuery(document).ready(function() {
                getAccountNo = (account) => {
                $.ajax({
                url: '{{ route('search.account') }}',
                type: "get", //send it through get method
                data: {
                    account: account,
                },
                success: function(response) {
                    $('.name-reciever').text(response.name);
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
            }

            $('.find-account').on('click', function(){
                getAccountNo($('.account-search').val());
            })

            $('.amount').on('keyup', function(e){
                $('.amount').val(formatRupiah($('.amount').val()))
            })

            function formatRupiah(angka, prefix)
            {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split    = number_string.split(','),
                    sisa     = split[0].length % 3,
                    rupiah     = split[0].substr(0, sisa),
                    ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            };

            async function loadHistory() {
                let response = await fetch('{{ route('transaction.history') }}/?customer_account_id={{ $account->id }}');
                let data = await response.json();

                $('.kt-datatable').KTDatatable({
                data: {
                    type: 'local',
                    source: await data,
                    pageSize: 10,
                    saveState: {
                        cookie: false,
                        webstorage: true
                    },
                    serverPaging: false,
                    serverFiltering: false,
                    serverSorting: false
                },

                layout: {
                    scroll: true,
                    height: 500,
                    footer: false
                },

                sortable: true,

                filterable: false,

                pagination: true,

                columns: [ {
                    field: "trail",
                    title: "Trail",
                    width: 'auto',
                    autoHide: false,
                    // callback function support for column rendering
                    template: function(row) {
                        return row.trail;
                    }
                }, {
                    field: "created_at",
                    title: "Date",
                    width: 100,
                    type: "date",
                    format: 'MM/DD/YYYY',
                    template: function(data) {
                        var date = new Date(data.created_at);
                        return '<span class="kt-font-bold">' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear() + '</span>';
                    }
                },
                {
                    field: "from_account",
                    title: "From Account",
                    width: 200,
                    // callback function support for column rendering
                    template: function(row) {
                        return row.from_account
                    }

                },
                {
                    field: "to_account",
                    title: "To Account",
                    width: 200,
                    // callback function support for column rendering
                    template: function(row) {
                        return row.to_account
                    }

                },
                {
                    field: "transaction_type",
                    title: "Type",
                    width: 100,
                    // callback function support for column rendering
                    template: function(row) {
                        var type = {
                            DB: {
                                'title': 'Withdraw',
                                'class': ' btn-label-danger'
                            },
                            CR: {
                                'title': 'Deposit',
                                'class': ' btn-label-success'
                            }
                        };
                        return '<span class="btn btn-bold btn-sm btn-font-sm ' + type[row.transaction_type].class + '">' + type[row.transaction_type].title + '</span>';
                    }
                },
                {
                    field: "amount",
                    title: "To Account",
                    width: 200,
                    // callback function support for column rendering
                    template: function(row) {
                        return row.amount.toLocaleString('id-ID')
                    }

                },
            ]

            });
            }
            $.sessionTimeout({
            title: 'Session Timeout Notification',
            message: 'Your session is about to expire.',
            redirUrl: "{{ route('auth.customer-logout') }}",
            logoutUrl: "{{ route('auth.customer-logout') }}",
            warnAfter: 300000, //warn after 5 seconds
            redirAfter: 350000, //redirect after 10 secons,
            ignoreUserActivity: true,
            countdownMessage: 'Redirecting in {timer} seconds.',
            countdownBar: true,
            countdownSmart:true
        });
            loadHistory();
            });

        </script>
@endpush
