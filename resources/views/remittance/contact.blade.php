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
                            <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" placeholder="Name" name="name" required>
                                <input type="email" class="form-control" placeholder="Email address" name="email" required>
                                <input type="text" class="form-control" placeholder="Phone number" name="number">
                                <textarea class="input-field  textarea" rows="3" name="message" placeholder="Message"
                                    required></textarea>
                                <button type="submit">Submit Message</button>
                            </form>

                            <div id="contactSuccess" class="alert alert-success mt-3 d-none">
                                ✅ Your message has been sent successfully!
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent normal form submission

        const form = e.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error('Submission failed');
            return response.json();
        })
        .then(data => {
            // Clear form
            form.reset();

            // Show success message
            document.getElementById('contactSuccess').classList.remove('d-none');
        })
        .catch(error => {
            alert('Oops! Something went wrong. Please try again.');
            console.error(error);
        });
    });
</script>

@endsection
