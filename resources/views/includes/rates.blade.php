@php
    $topProviders = ['wise']; // Add more provider names here (lowercase)
@endphp
<style>
    .skeleton-box {
        background-color: #f8f9fa;
        border: 1px solid #e0e0e0;
        min-height: 150px;
        padding: 1rem;
        border-radius: 0.75rem;
    }

    .skeleton-line {
        height: 24px;
        line-height: 1.556;
        background: linear-gradient(90deg, #eee, #ddd, #eee);
        background-size: 200% 100%;
        animation: shimmer 1.2s infinite;
        border-radius: 4px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #292669;
    }

    .skeleton-logo {
        width: 161px;
        height: 61px;
        background: linear-gradient(90deg, #eee, #ddd, #eee);
        background-size: 200% 100%;
        animation: shimmer 1.2s infinite;
    }

    .skeleton-btn {
        width: 100px;
        height: 36px;
        background: linear-gradient(90deg, #eee, #ddd, #eee);
        background-size: 200% 100%;
        animation: shimmer 1.2s infinite;
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }
</style>

<div class="container secure-badge">
    <div class="row">
        <div class="col-12">
            <div class="secure">
                <img src="/assets/template-img/secure-icon.png" alt="" class="sucure-icon">
                <p class="text">We only compare secure providers which we have researched, tested and approved.
                </p>
            </div>
        </div>
    </div>
</div>

<div id="skeleton-loader" class="provaider container my-5" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="skeleton-line">
                    <p class="skeleton-line"> </p>
                    <p class="skeleton-line"> </p>
                </div>
                @for ($i = 0; $i < 5; $i++)
                    <div class="provaider-box skeleton-box mb-4 p-3 border rounded-3 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!-- Logo & Provider Name -->
                            <div class="d-flex align-items-center gap-3">
                                <div class="skeleton-logo rounded"></div>
                                <div>
                                    <div class="skeleton-line w-100 mb-1" style="width: 120px;"></div>
                                    <div class="skeleton-line w-75"></div>
                                </div>
                            </div>

                            <!-- CTA Button -->
                            <div>
                                <div class="skeleton-btn rounded-pill"></div>
                            </div>
                        </div>

                        <!-- Payment Info & Exchange Rate -->
                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="mb-2" style="width: 45%;">
                                <div class="skeleton-line w-100 mb-2"></div>
                                <div class="skeleton-line w-75"></div>
                            </div>
                            <div class="mb-2" style="width: 45%;">
                                <div class="skeleton-line w-100 mb-2"></div>
                                <div class="skeleton-line w-50"></div>
                            </div>
                        </div>

                        <!-- Footer Total -->
                        <div class="mt-3">
                            <div class="skeleton-line w-50 mb-2"></div>
                            <div class="skeleton-line w-25"></div>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </div>
</div>

<div class="provaider" id="rates-results">
    <div class="container">
        <div class="row">
            <div class="col-12">
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
                                    <p class="text">Transfer fees: <span>{{ number_format($rate->fee, 2) }} SEK</span></p>
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
