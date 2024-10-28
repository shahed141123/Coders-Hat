<x-frontend-app-layout :title="'About Us'">
    <div class="ps-about">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="{{ route('home') }}">Home</a></li>
                <li class="ps-breadcrumb__item active" aria-current="page">About us</li>
            </ul>
            <section class="ps-banner--round">
                <div class="ps-banner">
                    <div class="ps-banner__block">
                        <div class="ps-banner__content">
                            <div class="ps-logo"><a href="{{ route('home') }}"> <img src="{{ asset('frontend/img/logo.png') }}"
                                        alt></a></div>
                            <h2 class="ps-banner__title">Your Ultimate Destination <br> for Wholesale Wonders!</h2>
                            <div class="ps-banner__btn-group">
                                <div class="ps-banner__btn"><img src="{{ asset('frontend/img/icon/virus.svg') }}"
                                        alt>Bulk Savings</div>
                                <div class="ps-banner__btn"><img src="{{ asset('frontend/img/icon/ribbon.svg') }}"
                                        alt>Diverse Selection</div>
                            </div>
                        </div>
                        <div class="ps-banner__thumnail"><img class="ps-banner__round"
                                src="{{ asset('frontend/img/round5.png') }}" alt><img class="ps-banner__image"
                                src="{{ asset('frontend/img/about/about-bg.png') }}" alt></div>
                    </div>
                </div>
            </section>
            <section class="ps-about--info">
                <h2 class="ps-about__title">Your Ultimate Wholesale Hub <br> for Bulk Bargains!</h2>
                <p class="ps-about__subtitle">Our platform is designed for seamless navigation, offering a user-friendly
                    experience that's both sleek and intuitive.</p>
                <div class="ps-about__extent">
                    <div class="row m-0">
                        <div class="col-12 col-md-4 p-0">
                            <div class="ps-block--about">
                                <div class="ps-block__icon"><img src="{{ asset('frontend/img/icon/award-icon-2.png') }}"
                                        alt=""></div>
                                <h4 class="ps-block__title">Effortless Ordering</h4>
                                <div class="ps-block__subtitle">Streamline your wholesale purchases with our easy-to-use
                                    online platform, making ordering a breeze for your convenience.</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 p-0">
                            <div class="ps-block--about">
                                <div class="ps-block__icon"><img
                                        src="{{ asset('frontend/img/icon/dentistry-icon-2.png') }}" alt="">
                                </div>
                                <h4 class="ps-block__title">Flexible Shipping Options</h4>
                                <div class="ps-block__subtitle">Choose from a variety of shipping methods tailored to
                                    your needs, ensuring your orders arrive promptly and efficiently.</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 p-0">
                            <div class="ps-block--about">
                                <div class="ps-block__icon"><img
                                        src="{{ asset('frontend/img/icon/toothbrush-icon-2.png') }}" alt="">
                                </div>
                                <h4 class="ps-block__title">Dedicated Customer Support</h4>
                                <div class="ps-block__subtitle">Our knowledgeable team is always here to assist you,
                                    providing personalized assistance and expert guidance whenever you need it.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="ps-about__content">
            <section class="ps-about__banner"
                style="background-image: url('{{ asset('frontend/img/Mask-Group.jpg') }}')">
                <div class="container">
                    <div class="ps-banner">
                        <h2 class="ps-banner__title">Hundreds of thousands of products at Best prices</h2>
                        <div class="ps-banner__desc">Completely the needs of home medicine chest and professional
                            offices</div><a class="ps-banner__shop" href="{{ route('allproducts') }}">Shop now</a>
                    </div>
                </div>
            </section>
            <section class="ps-about__project">
                <div class="container">
                    <h2 class="ps-about__title">Welcome to {{optional($setting)->website_name}}, your premier destination for wholesale solutions.
                    </h2>
                    <section class="ps-section--block-grid">
                        <div class="ps-section__thumbnail"> <a class="ps-section__image" href="#"><img
                                    src="{{ asset('frontend/img/about/about-us-1.jpg') }}" alt=""></a></div>
                        <div class="ps-section__content">
                            <h3 class="ps-section__title">Top quality products and proven suppliers with quality
                                certificates!</h3>
                            <div class="ps-section__subtitle">They have CEE 2020 certificate.</div>
                            <div class="ps-section__desc">At {{optional($setting)->website_name}}, we pride ourselves on delivering top-quality
                                products and exceptional service to businesses of all sizes. With our extensive range of
                                products and commitment to customer satisfaction, we strive to be your trusted partner
                                in meeting your wholesale needs.</div>
                            <div class="ps-section__desc">
                                Our platform is designed with you in mind, offering a seamless shopping experience and
                                flexible options to accommodate your unique requirements. Whether you're stocking up on
                                everyday essentials or seeking specialty items, we've got you covered.
                            </div>
                        </div>
                    </section>
                    <section class="ps-section--block-grid row-reverse">
                        <div class="ps-section__thumbnail"> <a class="ps-section__image" href="#"><img
                                    src="{{ asset('frontend/img/about/about-us-2.jpg') }}" alt=""></a></div>
                        <div class="ps-section__content">
                            <h3 class="ps-section__title">Empowering Your Business Success</h3>
                            <div class="ps-section__subtitle">Your Trusted Partner in Wholesale Solutions</div>
                            <div class="ps-section__desc">At {{optional($setting)->website_name}}, we are dedicated to empowering your business
                                success through our comprehensive range of wholesale solutions. With a commitment to
                                excellence and a focus on customer satisfaction, we strive to be the go-to choice for
                                businesses seeking reliable and cost-effective wholesale options.</div>
                            <ul class="ps-section__list">
                                <li>Quality Assurance</li>
                                <li>Tailored Solutions</li>
                                <li>Exceptional Service</li>
                                <li>Industry Experience</li>
                            </ul>
                        </div>
                    </section>
                    <section class="ps-section--block-grid">
                        <div class="ps-section__thumbnail"> <a class="ps-section__image" href="#"><img
                                    src="{{ asset('frontend/img/about/about-us-3.jpg') }}" alt=""></a></div>
                        <div class="ps-section__content">
                            <h3 class="ps-section__title">Driving Wholesale Excellence</h3>
                            <div class="ps-section__subtitle">Your Gateway to Premium Wholesale Solutions</div>
                            <div class="ps-section__desc">At {{optional($setting)->website_name}}, we're committed to driving wholesale excellence by
                                offering a comprehensive range of premium solutions tailored to meet your business
                                needs. With a focus on quality, reliability, and customer satisfaction, we aim to
                                elevate your wholesale experience and help you achieve your goals.</div>
                            <ul class="ps-section__list">
                                <li>Premium Quality</li>
                                <li>Customized Options</li>
                                <li>Personalized Support</li>
                                <li>Industry Expertise</li>
                            </ul>
                        </div>
                    </section>
                </div>
            </section>
            <section class="ps-about--video">
                <div class="ps-banner">
                    <div class="container">
                        <div class="ps-banner__block">
                            <div class="ps-banner__content">
                                <h2 class="ps-banner__title">Your Ultimate Source <br>for Health & Wellness Solutions!
                                </h2>
                                <div class="ps-banner__desc">Only this week 30% to 50% cheaper!</div>
                                <div class="ps-banner__btn-group">
                                    <div class="ps-banner__btn"><img src="{{ asset('frontend/img/icon/virus.svg') }}"
                                            alt>Limited Time Offer:
                                        Save Big Now!</div>
                                    <div class="ps-banner__btn"><img
                                            src="{{ asset('frontend/img/icon/ribbon.svg') }}" alt>Exclusive Deals:
                                        Don't Miss Out!</div>
                                </div><a class="ps-banner__shop bg-warning" href="#">About</a>
                            </div>
                            <div class="ps-banner__thumnail">
                                <div style="display:none;" id="video1">
                                    <video class="lg-video-object lg-html5" controls="" preload="none">
                                        <source src="{{ asset('frontend/img/video.mp4') }}" type="video/mp4">Your
                                        browser does not support
                                        HTML5 video.
                                    </video>
                                </div><img class="ps-banner__image"
                                    src="{{ asset('frontend/img/about/video-bg.jpg') }}" alt>
                                <div id="ps-video-gallery">
                                    <div class="video" data-html="#video1"
                                        data-poster="{{ asset('frontend/img/about/goby-tD3GaS9ysF4-unsplash-1.jpg') }}">
                                        <a href="#">
                                            <div class="ps-banner__video"><i class="fa fa-play"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- <section class="ps-section--reviews"
                style="background-image: url('{{ asset('frontend/img/roundbg.png') }}')">
                <h3 class="ps-section__title"> <img src="{{ asset('frontend/img/quote-icon.png') }}" alt>Latest
                    reviews</h3>
                <div class="ps-section__content">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="ps-review">
                                <div class="ps-review__text">There was a small mistake in the order. In return, I got
                                    the correct order and I could keep the wrong one for myself.</div>
                                <div class="ps-review__name">Esther Howard</div>
                                <div class="ps-review__review">
                                    <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"
                                            data-read-only="true" style="display: none;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <div class="br-widget br-readonly"><a href="#" data-rating-value="1"
                                                data-rating-text="1" class="br-selected"></a><a href="#"
                                                data-rating-value="2" data-rating-text="2" class="br-selected"></a><a
                                                href="#" data-rating-value="3" data-rating-text="3"
                                                class="br-selected"></a><a href="#" data-rating-value="4"
                                                data-rating-text="4" class="br-selected br-current"></a><a
                                                href="#" data-rating-value="5" data-rating-text="5"></a>
                                            <div class="br-current-rating">4</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
        </div>
        <div class="container">
            <section class="ps-section--blog">
                <h3 class="ps-section__title">From the blog</h3>
                <div class="ps-section__carousel">
                    <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                        data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="3" data-owl-item-xs="1"
                        data-owl-item-sm="1" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="3"
                        data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach ($blog_posts as $blog_post)
                            <div class="ps-section__item">
                                <div class="ps-blog--latset">
                                    <div class="ps-blog__thumbnail">
                                        <a href="{{ route('blog.details', $blog_post->slug) }}">
                                            <img src="{{ asset('storage/' . $blog_post->image) }}" alt="alt" />
                                        </a>
                                        <div class="ps-blog__badge">
                                            <span class="ps-badge__item">{{ $blog_post->badge }}</span>
                                            {{-- @foreach ($blog_post->blogTag as $tag)
                                                <span class="ps-badge__item">{{ $tag->name }}</span>
                                            @endforeach --}}
                                        </div>
                                    </div>
                                    <div class="ps-blog__content">
                                        <div class="ps-blog__meta"> <span
                                                class="ps-blog__date">{{ $blog_post->created_at->format('M d Y') }}</span>
                                            <a class="ps-blog__author" href="#">{{ $blog_post->author }}</a>
                                        </div>
                                        <a class="ps-blog__title"
                                            href="{{ route('blog.details', $blog_post->slug) }}">{{ $blog_post->title }}</a>
                                        <p class="ps-blog__desc">{{ $blog_post->header }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="ps-section--newsletter"
                style="background-image: url('{{ asset('frontend/img/newsletter-bg.jpg') }}')">
                <h3 class="ps-section__title pt-5">Join our newsletter and get <br> $20 discount for your first order</h3>
                <div class="ps-section__content">
                    <form action="{{ route('subscription.add') }}" method="post">
                        @csrf
                        <div class="ps-form--subscribe">
                            <div class="ps-form__control">
                                <input class="form-control ps-input" type="email" name="email"
                                    placeholder="Enter your email address">
                                <button class="ps-btn ps-btn--warning">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script>
            $(function() {
                // Owl Carousel
                var owl = $(".owl-carousel");
                owl.owlCarousel({
                    items: 1,
                    margin: 10,
                    loop: true,
                    nav: true,
                    dots: false, // Ensures that dot indicators are not shown
                    autoplay: true, // Enables autoplay
                    autoplayTimeout: 3000, // Time in milliseconds (3000ms = 3 seconds)
                    autoplayHoverPause: true, // Pause on mouse hover
                    responsive: {
                        480: {
                            items: 1
                        },
                        768: {
                            items: 1
                        },
                        992: {
                            items: 1
                        },
                        1200: {
                            items: 4
                        },
                        1680: {
                            items: 4
                        }
                    }
                });
            });
        </script>
    @endpush
</x-frontend-app-layout>
