<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="subcribe-box" style="background: url('/assets/template-img/subscribe-bg.png');">
                        <h3 class="subcribe">To get exclusive updates and benefits </h3>
                         @if(session('subscribe_success'))
                            <div class="alert alert-success mt-2">{{ session('subscribe_success') }}</div>
                        @endif
                        <div class="form-group">
                            <form action="{{ route('subscribe') }}" method="POST">
                                @csrf
                                <input type="email" class="form-control" placeholder="Enter Your Email" name="email"
                                    required>
                                <button class="button-1" type="submit">Subscribe</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="footer-box">
                        <a href="#"><img class="logo" src="/assets/template-img/logo.png" alt=""> </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="footer-box">
                        <ul class="footer-link">
                            <li><a href="#">About us</a></li>
                            <li>|</li>
                            <li><a href="">How it works</a></li>
                            <li>|</li>
                            <li><a href="">FAQ</a></li>
                            <li>|</li>
                            <li><a href="/contact-us">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="raka"></div>
                </div>
                <div class="col-md-6">
                    <div class="footer-bottom">
                        <p class="text">Copyright &copy; <a href="/">Nrily</a> | 2025 </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-bottom">
                        <div class="social-style">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-skype"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
