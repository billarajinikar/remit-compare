@extends('layouts.app')

@section('content')
@php
    $topProviders = ['wise']; // Add more provider names here (lowercase)
@endphp
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
                        @if(in_array(strtolower($rate->provider->name), $topProviders))
    <img src="/assets/template-img/ribbon.png" class="ribbon-img" alt="Wise Ribbon">
@endif
                    </div>
                    <div class="rating" style="background: url('/assets/template-img/partner-bg.png');">
                        <div class="partner-img">
                            <img src="/assets/providers/{{ $rate->provider->main_logo }}" alt="">
                        </div>

                    </div>
                    <div class="content">
                        <div class="pament-box">
                            <div class="pament">
                                <p class="text">Payment Options</p>
                                <div class="cradit-card">
                                    <p class="text"> <span>{!! $rate->provider->payment_options !!}</span></p>
                                </div>
                            </div>
                            <div class="exchange">
                                <p class="text">Exchange rate: <span>₹ {{ number_format($rate->rate, 4) }}</span></p>
                                <p class="text">Transfer fees: <span>{{ number_format($rate->fee, 4) }}3 SEK</span></p>
                                <p class="text">Transfer time: <span>Immediately</span></p>
                            </div>
                        </div>

                        <div class="free-transfer">
                            <p class="text">{!! $rate->provider->notes !!}</p>
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
