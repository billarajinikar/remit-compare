@extends('layouts.app')

@section('content')
<div class="container main-content">
    <h2 class="mb-4">Compare SEK to INR Remittance Rates</h2>
    @include('includes.search-form')
</div>
<div class="provaider">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="secure">
                    <img src="/assets/template-img/secure-icon.png" alt="" class="sucure-icon">
                    <p class="text">We only compare secure providers which we have researched, tested and approved.
                    </p>
                </div>
                <div class="provaider-match">
                    <p class="text one">{{ $rates->count() }} Providers Matched </p>
                    <p class="text two">Rates updated less than 11 mins ago</p>
                </div>
                @foreach ($rates as $rate)
                <div class="provaider-box">
                    <div class="ribbon">
                        <img src="/assets/template-img/ribbon.png" class="ribbon-img" alt="">
                    </div>
                    <div class="rating" style="background: url('/assets/template-img/partner-bg.png');">
                        <div class="partner-img">
                            <img src="/assets/providers/{{ $rate->provider->main_logo }}" alt="">
                        </div>
                        <p class="text">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            (42,223 Reviews)
                        </p>
                        <a href="review.html" class="link">Learn more >></a>
                    </div>
                    <div class="content">
                        <div class="pament-box">
                            <div class="pament">
                                <p class="text">Payment Options</p>
                                <div class="cradit-card">
                                    <p class="text"><img src="/assets/tempalte-img/card.png" alt=""> <span>Debit /Credit Card</span></p>
                                    <p class="text"><img src="/assets/tempalte-img/bank.png" alt=""> <span>Direct Bank Transfers</span></p>
                                </div>
                            </div>
                            <div class="exchange">
                                <p class="text">Exchange rate: <span>₹ {{ number_format($rate->rate, 4) }}</span></p>
                                <p class="text">Transfer fees: <span>{{ number_format($rate->fee, 4) }}3 SEK</span></p>
                                <p class="text">Transfer time: <span>Immediately</span></p>
                            </div>
                        </div>

                        <div class="free-transfer">
                            <img src="assets/img/free-trns.png" alt="" class="free-icon">
                            <p class="text">New customers get first 3 transfers fee FREE</p>
                        </div>
                    </div>
                    <div class="total">
                        <p class="text">Total:</p>
                        <h4 class="amount">₹{{ number_format($rate->received_amount, 2) }}</h4>
                        <p class="text">Included fees</p>
                        <a href="{{ $rate->provider->affiliate_url }}" class="button button-1">Go to site</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('includes.faq-section')

@endsection
