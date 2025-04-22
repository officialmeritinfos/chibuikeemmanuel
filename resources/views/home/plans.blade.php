@extends('home.base')
@section('content')
    @push('css')
        <style>

            small {
                font-size: 14px;
                text-transform: initial;
            }
            .single-price {
                text-align: center;
                background: #262626;
                transition: .7s;
                margin-top: 20px;
            }
            .single-price h3 {
                font-size: 30px;
                color: #000;
                font-weight: 600;
                text-align: center;
                margin: 0;
                margin-top: -80px;
                margin-bottom: 1rem;
                font-family: poppins;
                color: #fff;
            }
            .single-price h4 {
                font-size: 20px;
                font-weight: 500;
                color: #fff;
            }
            .single-price h4 span.sup {
                vertical-align: text-top;
                font-size: 15px;
            }
            .deal-top {
                position: relative;
                background: #104547;
                font-size: 16px;
                text-transform: uppercase;
                padding: 136px 24px 0;
            }
            .deal-top::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: -50px;
                width: 0;
                height: 0;
                border-top: 50px solid #104547;
                border-left: 175px solid transparent;
                border-right: 183px solid transparent;
            }
            .deal-bottom {
                padding: 56px 16px 0;
            }
            .deal-bottom ul {
                margin: 0;
                padding: 0;
            }
            .deal-bottom  ul li {
                font-size: 16px;
                color: #fff;
                font-weight: 300;
                margin-top: 16px;
                border-top: 1px solid #E4E4E4;
                padding-top: 16px;
                list-style: none;
            }
            .btn-area a {
                display: inline-block;
                font-size: 18px;
                color: #fff;
                background: #104547;
                padding: 8px 64px;
                margin-top: 32px;
                border-radius: 4px;
                margin-bottom: 40px;
                text-transform: uppercase;
                font-weight: bold;
                text-decoration: none;
            }


            .single-price:hover {
                background: #104547;
            }
            .single-price:hover .deal-top {
                background: #262626;
            }
            .single-price:hover .deal-top:after {
                border-top: 50px solid #262626;
            }
            .single-price:hover .btn-area a {
                background: #262626;
            }
            /* ignore the code below */


            .link-area
            {
                position:fixed;
                bottom:20px;
                left:20px;
                padding:15px;
                border-radius:40px;
                background:#104547;
            }
            .link-area a
            {
                text-decoration:none;
                color:#fff;
                font-size:25px;
            }
        </style>
    @endpush

        <!-- page-title -->
        <section class="page-title centred">
            <div class="bg-layer" style="background-image: url({{asset('home/images/background/page-title.jpg')}} );"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>{{ $pageName }}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>{{ $pageName }}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

    <!-- pricing-section -->
    <section class="pricing-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred mb_50">
                <span class="sub-title">Investment Options</span>
                <h2> Choose the Plan<br /> that works for you</h2>
            </div>
            <div class="tabs-box">

                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="row clearfix">
                            @foreach($packages as $package)
                                @inject('option','App\Defaults\Custom')
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block mt-4">
                                    <div class="pricing-block-one">
                                        <div class="pricing-table">
                                            <div class="shape-1" style="background-image: url({{ asset('home/images/shape/shape-38.png') }}s);"></div>
                                            <div class="table-header mb_35">
                                                <span class="title">{{$package->name}}</span>
                                                <h2>{{$package->roi}}%/<span>{{$option->getReturnType($package->returnType)}}</span></h2>
                                            </div>
                                            <div class="table-content">
                                                <ul class="feature-list list-style-one clearfix">
                                                    <li>
                                                        Price: ${{number_format($package->minAmount,2)}} - @if($package->isUnlimited !=1)
                                                            ${{number_format($package->maxAmount,2)}}
                                                        @else
                                                            Unlimited
                                                        @endif
                                                    </li>
                                                    <li>Profit return: {{$package->roi}}% {{$option->getReturnType($package->returnType)}}</li>
                                                    <li>Contract Duration: {{$package->Duration}}</li>
                                                    <li>Referral Bonus: {{$package->referral}}% </li>
                                                </ul>
                                            </div>
                                            <div class="table-footer">
                                                <a href="{{ route('register') }}" class="theme-btn-one">Get Started Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
