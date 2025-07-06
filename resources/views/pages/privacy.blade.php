@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Privacy Policy</h1>
    <p>Your privacy is important to us. This Privacy Policy outlines how we collect, use, and protect your information when you visit nrily.com.</p>

    <h4>1. Information We Collect</h4>
    <ul>
        <li>Email address (if you subscribe to our newsletter)</li>
        <li>Contact form submissions (name, email, phone number, message)</li>
        <li>Usage data through analytics (IP address, browser type, visited pages, etc.)</li>
    </ul>

    <h4>2. How We Use Your Information</h4>
    <ul>
        <li>To respond to your inquiries</li>
        <li>To send updates and promotional content (if subscribed)</li>
        <li>To improve the functionality and user experience of our website</li>
    </ul>

    <h4>3. Data Security</h4>
    <p>We take appropriate security measures to protect your information but cannot guarantee absolute security of data transmission over the internet.</p>

    <h4>4. Third-party Services</h4>
    <p>We may use third-party services (e.g. analytics, email marketing tools) which may collect and process your data according to their own privacy policies.</p>

    <h4>5. Cookies</h4>
    <p>We may use cookies to enhance your browsing experience. You can choose to disable cookies in your browser settings.</p>

    <h4>6. Your Rights</h4>
    <p>You may request access, correction, or deletion of your personal data at any time by contacting us at <strong>hello@nrily.com</strong>.</p>

    <h4>7. Changes to this Policy</h4>
    <p>We may update this policy from time to time. All changes will be posted on this page.</p>

    <p class="mt-4">Last updated: {{ now()->format('F d, Y') }}</p>
</div>
@endsection
