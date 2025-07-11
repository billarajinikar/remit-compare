@php
    $topProviders = ['wise']; // Add more provider names here (lowercase)
@endphp
<style>
    .exchange .rate_text, .fee_text, .time_text {
        text-align: left !important;
        font-size: 16px !important;
        color: #292669;

    }
    .rate_number,
    .fee_number,
    .time_number {
        font-size: 18px !important;
        font-weight: bold;
    }
    .payment_option_text {
        font-size: 12px;
        text-align: left;
    }
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
    .provaider .provaider-box .content .pament-box {
    display: flex;
    flex-wrap: wrap;

}
    .provaider .provaider-box {
        padding: 30px !important;
    }




    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }

    @media (max-width: 768px) {
    .provaider .provaider-box {
        flex-direction: column;
        padding: 15px;
    }

    .provaider .provaider-box .rating,
    .provaider .provaider-box .content,
    .provaider .provaider-box .total {
        width: 100%;
        padding: 15px 0;
        text-align: center;
    }

    .provaider .provaider-box .content .pament-box {
        flex-direction: column;
        align-items: flex-start;
        padding: 15px;
    }
    .provaider .exchange {
        font-size: 12px;
        text-align: left;
    }
    .exchange .rate_text, .fee_text, .time_text {
        font-size: 12px !important;
        text-align: left !important;
    }
    .rate_number,
    .fee_number,
    .time_number {
        font-size: 16px !important;
        font-weight: bold;
    }
    .provaider .provaider-box .content .pament-box .pament,
    .provaider .provaider-box .content .pament-box .exchange {
        margin: 10px 0;
    }

    .provaider .provaider-box .total {
        padding: 10px 0 0;
    }

    .provaider .provaider-box .total a.button {
        width: 100%;
        height: 44px;
        font-size: 16px;
        margin: 15px 0 0;
    }

    .provaider .provaider-box .content .pament-box:after,
    .provaider .provaider-box .content .pament-box .pament:after {
        display: none;
    }

    .provaider .provaider-box .rating .partner-img {
        margin: 0 auto;
    }
    .provaider .provaider-box .content .free-transfer {
    display: flex;
    justify-content: flex-start;

    padding: 0px 0px 0px;
}
    .provaider .provaider-box .content .pament-box {
        flex-direction: column;
        align-items: flex-start;
        padding: 15px 0px 10px 0px !important;
    }
    .provaider .provaider-box .content .pament-box {
    display: flex
;
    justify-content: space-between;
    align-items: start !important
    padding: 15px 15px 15px !important;
    position: relative;
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
                                <a href="{{ $rate->provider->affiliate_url }}" >
                                    <img src="/assets/providers/{{ $rate->provider->main_logo }}" alt="">
                                </a>
                            </div>

                        </div>
                        <div class="content">
                            <div class="pament-box">
                                <div class="pament">
                                    <p class="text">Payment Options:</p>
                                    <div class="cradit-card">
                                        <p class="payment_option_text"> <span>{!! $rate->provider->payment_options !!}</span></p>
                                    </div>
                                </div>
                                <div class="exchange">
                                    <p class="rate_text">Exchange Rate: <span class="rate_number">₹ {{ number_format($rate->rate, 2) }}</span></p>
                                    <p class="fee_text">Transfer Fee: <span class="fee_number">{{ number_format($rate->fee, 2) }} SEK</span></p>
                                    <p class="time_text">Arrival Time: <span class="time_number">Immediately</span></p>
                                </div>
                            </div>

                            <div class="free-transfer">
                                <p class="text">{!! $rate->provider->notes !!}</p>
                            </div>
                        </div>
                        <div class="total">
                            <p class="text">You may get:</p>
                            <h4 class="amount">₹{{ number_format($rate->received_amount, 2) }}</h4>
                            <!-- <p class="text">Included fees</p> -->
                            <a href="{{ $rate->provider->affiliate_url }}" class="button button-1">Go to {{ $rate->provider->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
