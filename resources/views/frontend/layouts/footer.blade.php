<style>
    .ps-footer {
        position: relative;
        width: 100%;
        min-height: 300px;
        /* Adjust as needed */
        background-image: url('{{ asset('frontend/img/footer_bg.jpg') }}');
        background-size: containe;
        background-position: center;
        background-repeat: no-repeat;
        color: #fff;
        /* Sets text color to white for contrast */
    }

    .ps-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #f5f5f5c2;
        /* White overlay with 91% opacity */
        z-index: 1;
    }

    .ps-footer .container {
        position: relative;
        z-index: 2;
    }

    .ps-footer__link,
    .ps-footer__title,
    .ps-footer__email,
    .ps-block__list a {
        color: #fff;
    }

    .ps-footer__link:hover,
    .ps-block__list a:hover {
        color: #ff0;
    }

    .extra-color {
        color: #fff;
    }

    .ps-social__link:hover {
        color: #ff0;
    }
</style>
<footer class="ps-footer ps-footer--13 ps-footer--14">
    <div class="ps-footer--top">
        <div class="container">
            <div class="row m-0">
                <div class="col-12 col-sm-4 p-0">
                    <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-wallet"></i>100% Money
                            back Guaranteed</a></p>
                </div>
                <div class="col-12 col-sm-4 p-0">
                    <p class="text-center"><a class="ps-footer__link" href="#"><i
                                class="icon-bag2"></i>Non-contact shipping</a></p>
                </div>
                <div class="col-12 col-sm-4 p-0">
                    <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-truck"></i>Free Delivery UK Mainland</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ps-footer__middle">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="ps-footer--address">
                                <div class="ps-logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ !empty(optional($setting)->site_logo_black) ? asset('storage/' . optional($setting)->site_logo_black) : asset('frontend/img/logo.png') }}"
                                            alt=""
                                            onerror="this.onerror=null; this.src='{{ asset('frontend/img/logo.png') }}';">
                                    </a>
                                </div>
                                <div class="ps-footer__title">Our store</div>
                                <p>{{ optional($setting)->address_line_one }}<br>{{ optional($setting)->address_line_two }}</p>

                                <!-- In your Blade view (e.g., resources/views/your_view_name.blade.php) -->
                                <ul class="ps-social">
                                    @if (optional($setting)->facebook_url)
                                        <li>
                                            <a class="ps-social__link extra-color facebook"
                                                href="{{ optional($setting)->facebook_url }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="fa fa-facebook"></i>
                                                <span class="ps-tooltip">Facebook</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if (optional($setting)->instagram_url)
                                        <li>
                                            <a class="ps-social__link extra-color instagram"
                                                href="{{ optional($setting)->instagram_url }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="fa fa-instagram"></i>
                                                <span class="ps-tooltip">Instagram</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if (optional($setting)->youtube_url)
                                        <li>
                                            <a class="ps-social__link extra-color youtube"
                                                href="{{ optional($setting)->youtube_url }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="fa fa-youtube-play"></i>
                                                <span class="ps-tooltip">YouTube</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if (optional($setting)->pinterest_url)
                                        <li>
                                            <a class="ps-social__link extra-color pinterest"
                                                href="{{ optional($setting)->pinterest_url }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="fa fa-pinterest-p"></i>
                                                <span class="ps-tooltip">Pinterest</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if (optional($setting)->linkedin_url)
                                        <li>
                                            <a class="ps-social__link extra-color linkedin"
                                                href="{{ optional($setting)->linkedin_url }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="fa fa-linkedin"></i>
                                                <span class="ps-tooltip">LinkedIn</span>
                                            </a>
                                        </li>
                                    @endif

                                    <!-- Add additional social media links similarly -->

                                    @if (optional($setting)->twitter_url)
                                        <li>
                                            <a class="ps-social__link extra-color twitter"
                                                href="{{ optional($setting)->twitter_url }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="fa fa-twitter"></i>
                                                <span class="ps-tooltip">Twitter</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if (optional($setting)->whatsapp_url)
                                        <li>
                                            <a class="ps-social__link extra-color whatsapp"
                                                href="{{ optional($setting)->whatsapp_url }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="fa fa-whatsapp"></i>
                                                <span class="ps-tooltip">WhatsApp</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="ps-footer--contact">
                                <h5 class="ps-footer__title">Need help</h5>
                                <div class="ps-footer__fax"><i class="icon-telephone"></i>{{ optional($setting)->primary_phone }}
                                </div>
                                <p class="ps-footer__work">Monday – Friday: 9:00-20:00<br>Saturday: 11:00 – 15:00</p>
                                <hr>
                                <p>
                                    <a class="ps-footer__email" href="mailto:{{ optional($setting)->contact_email }}">
                                        <i class="icon-envelope"></i>
                                        <span>{{ optional($setting)->contact_email }}</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">General</h5>
                                <ul class="ps-block__list">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about-us') }}">About us</a></li>
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                    <li><a href="{{ route('allBlog') }}">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Account</h5>
                                <ul class="ps-block__list">
                                    <li><a href="{{ route('user.account.details') }}">My Account</a></li>
                                    <li><a href="{{ route('user.order.history') }}">My Orders</a></li>
                                    <li><a href="{{ route('user.quick.order') }}">Quick Order</a></li>
                                    <li><a href="{{ route('user.wishlist') }}">Shopping List</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Policy</h5>
                                <ul class="ps-block__list">
                                    <li><a href="{{ asset('return-policy') }}">Returns</a></li>
                                    <li><a href="{{ asset('privacy/policy') }}">Privacy & Policy</a></li>
                                    <li><a href="{{ asset('terms-condition') }}">Terms & Conditions</a></li>
                                    <li><a href="{{ asset('faq') }}">Faq</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer--bottom">
            <div class="row">
                <div class="col-12 col-md-6">
                    <a href="{{ optional($setting)->copyright_url }}">
                        <p>{{ optional($setting)->copyright_title }}</p>
                    </a>
                </div>
                <div class="col-12 col-md-6 text-right">
                    <img src="{{ asset('frontend/img/payment.png') }}" alt>
                    <img class="payment-light" src="{{ asset('frontend/img/payment-light.png') }}" alt>
                </div>
            </div>
        </div>
    </div>
</footer>
