@extends('layouts.app')
@section('content')

<div class="container main-content ">
    <h3 class="mb-4" style="color: coral">Compare SEK to INR Remittance Rates</h3>
    @include('includes.search-form')
</div>

@include('includes.rates', ['rates' => $rates])

<div class="mission">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="mission-img">
                        <img src="/assets/template-img/mission.png" alt="" class="mission-pic">
                    </div>
                </div>
                <div class="col-lg-7 ">
                    <div class="content">
                        <h3 class="subtitle">Welcome to Pravasify 🇸🇪 ➡️ 🇮🇳</h3>
                        <h2 class="title"><strong>Pravasify</strong> is built by a community of Indians living in Sweden who truly understand the challenges and priorities of the NRI life. One of the most common concerns? <strong>Sending money back home efficiently, securely, and at the best possible rate.</strong></h2>
                        <p class="text">
            That’s why we created this platform — to empower you with an easy way to <strong>compare the most reliable remittance services from Sweden to India</strong>. We track exchange rates, transfer fees, and delivery times so that you can make smart decisions and save more.
        </p>
        <p class="text">
            But we’re not stopping here. <strong>Pravasify</strong> is evolving into a broader support hub for NRIs. In the near future, you’ll be able to compare <strong>courier services between India and Sweden</strong>, explore <strong>financial tools</strong> designed for expats, and access <strong>everyday resources tailored for the Indian community abroad (Sweden specially)</strong>.
        </p>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="hcontent">
                        <h3 class="subtitle">Empowering NRIs with Better Choices</h3>
                        <h2 class="title">Whether it's transferring money, sending packages, or accessing useful NRI tools, our guides help you do it smarter.</h2>
                        <p class="text">
                            Guides That Make Your NRI Life Easier
                        </p>
                    </div>
                </div>
            </div>
            @include('includes.top-blogs')
        </div>
</div>

@include('includes.faq-section')

@endsection
