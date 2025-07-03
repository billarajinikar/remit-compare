@extends('layouts.app')

@section('content')
    <div class="banner contact">
        <div class="hero-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-content">
                            <h2 class="title">Get in touch</h2>
                            <p class="text">We are here to answer any questions you may have about the Comofer
                                experience.Reach out to us and we will respond as soon as we can.</p>
                        </div>
                        <div class="contact-info">
                            <div class="info-box one">
                                <div class="icon">
                                    <img src="/assets/template-img/mail.png" alt="" class="pic">
                                </div>
                                <p class="text">mail</p>
                                <span>hello@nrily.com</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="hero-form contact">
                            <h3 class="subtitle">Send us a message</h3>
                            <p class="text">Drop us a quick line and we’ll get back to you asap.</p>
                            @if(session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" placeholder="Name" name="text">
                                <input type="email" class="form-control" placeholder="Email address" name="email">
                                <input type="text" class="form-control" placeholder="Phone number" name="number">
                                <textarea class="input-field borderd textarea" rows="3" id="message" placeholder="Message"
                                    required=""></textarea>
                                <button type="submit">Submit Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
