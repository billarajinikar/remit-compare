@extends('layouts.app')

@section('content')

<div class="container main-content">
    <h2 class="mb-4">Compare SEK to INR Remittance Rates</h2>
    @include('includes.search-form')
</div>

@include('includes.rates', ['rates' => $rates])
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
