@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Terms & Conditions</h1>
    <p>Welcome to Pravasify.com. By accessing or using our website, you agree to be bound by the following Terms and Conditions. Please read them carefully.</p>

    <h4>1. Purpose of Service</h4>
    <p>Pravasify.com provides a platform to compare remittance providers based on exchange rates, fees, transfer times, and estimated delivery amounts. These estimates are based on publicly available data and may not reflect real-time values.</p>

    <h4>2. No Financial Advice</h4>
    <p>The information provided is for general information only. We are not a financial institution and do not offer financial or investment advice.</p>

    <h4>3. Accuracy of Information</h4>
    <p>We strive to provide accurate and up-to-date information. However, remittance rates and fees may vary depending on the provider’s live rates and terms. Users are encouraged to verify details directly with the provider before making any transaction.</p>

    <h4>4. Affiliate Links</h4>
    <p>Some links to remittance providers may be affiliate links. If you use these links to make a transaction, we may earn a commission at no extra cost to you.</p>

    <h4>5. Limitation of Liability</h4>
    <p>We are not liable for any losses or damages resulting from the use of information on our website or transactions made with listed providers.</p>

    <h4>6. Changes to Terms</h4>
    <p>We reserve the right to update or modify these Terms and Conditions at any time. Continued use of the website signifies your acceptance of any changes.</p>

    <p class="mt-4">Last updated: {{ now()->format('F d, Y') }}</p>
</div>
@endsection
