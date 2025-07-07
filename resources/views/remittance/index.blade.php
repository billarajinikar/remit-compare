@extends('layouts.app')

@section('content')

<div class="container main-content">
    <h2 class="mb-4">Compare SEK to INR Remittance Rates</h2>
    @include('includes.search-form')
</div>

@include('includes.rates', ['rates' => $rates])
@include('includes.faq-section')

@endsection
