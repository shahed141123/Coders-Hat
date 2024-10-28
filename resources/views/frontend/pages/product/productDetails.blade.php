<x-frontend-app-layout :title="'Product Details'" :product="$product">
    @push('heads')
        @php
            $isProductPage = true; // Flag to indicate this is a product details page
            $metaTitle = $product->meta_title ?? $product->name;
            $metaDescription = $product->meta_description ?? substr($product->description, 0, 150);
            $metaImage = $product->thumbnail ?? ''; // Default image
        @endphp
    @endpush
    <style>
        .slider-nav-thumbnails {
            margin-top: 10px;
        }

        .slider-nav-thumbnails .slick-slide {
            cursor: pointer;
            outline: none;
        }

        .slider-nav-thumbnails .slick-slide.slick-current.slick-active {
            opacity: 1;
        }

        .slider-nav-thumbnails .slick-slide img {
            padding: 5px;
            background: transparent;
        }

        .slider-nav-thumbnails .slick-slide.slick-current.slick-active img {
            background: #8cbf44;
        }

        .slider-nav-thumbnails img {
            width: 100px;
            object-fit: cover;
            margin: 0 5px;
        }

        .slider-nav-thumbnails .slick-slide:first-child img {
            margin-left: 0;
        }

        .slider-nav-thumbnails .slick-slide:last-child img {
            margin-right: 0;
        }

        .main_product_img img {
            width: 530px;
            height: 430px;
            object-fit: contain;
        }
    </style>
    <div class="ps-page--product3">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="{{ route('home') }}">Home</a></li>
                <li class="ps-breadcrumb__item"><a href="{{ route('allproducts') }}">All Products</a></li>
                <li class="ps-breadcrumb__item active" aria-current="page">{{ $product->name }}</li>
            </ul>
            <div class="ps-page__content">
                <div class="ps-product--detail">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <div class="row">
                                <div class="col-12 col-xl-6">

                                    <div class="videos-slider-2">
                                        <div class="main_product_img">
                                            <img class="img-fluid" src="{{ asset('storage/' . $product->thumbnail) }}"
                                                alt="{{ $product->meta_title }}" />
                                        </div>
                                        @foreach ($product->multiImages as $image)
                                            <div class="main_product_img">
                                                <img class="img-fluid" src="{{ asset('storage/' . $image->photo) }}"
                                                    alt="{{ $product->meta_title }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('images/no-preview.png') }}';" />
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="slider-nav-thumbnails">
                                        <div>
                                            <img class="img-fluid" src="{{ asset('storage/' . $product->thumbnail) }}"
                                                alt="{{ $product->meta_title }}"
                                                onerror="this.onerror=null;this.src='{{ asset('images/no-preview.png') }}';" />
                                        </div>
                                        @foreach ($product->multiImages as $image)
                                            <div>
                                                <img class="img-fluid" src="{{ asset('storage/' . $image->photo) }}"
                                                    alt="{{ $product->meta_title }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('images/no-preview.png') }}';" />
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="ps-product--gallery">
                                        <div class="ps-product__thumbnail">
                                            @foreach ($product->multiImages as $image)
                                                <div class="slide">
                                                    <img src="{{ asset('storage/' . $image->photo) }}"
                                                        alt="{{ $product->meta_title }}" />
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="ps-gallery--image">
                                            @foreach ($product->multiImages as $image)
                                                <div class="slide">
                                                    <div class="ps-gallery__item">
                                                        <img src="{{ asset('storage/' . $image->photo) }}"
                                                            alt="{{ $product->meta_title }}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product__info">
                                        <div class="ps-product__title text-22" style="height: auto;">
                                            {{ $product->name }}
                                        </div>
                                        <table class="table ps-table ps-table--oriented m-0">
                                            <tbody>
                                                @if (!empty($product->sku_code))
                                                    <tr>
                                                        <th class="ps-table__th">CODE</th>
                                                        <td>{{ $product->sku_code }}</td>
                                                    </tr>
                                                @endif
                                                @if (!empty($product->barcode_id))
                                                    <tr>
                                                        <th class="ps-table__th">BARCODE </th>
                                                        <td>{{ $product->barcode_id }}</td>
                                                    </tr>
                                                @endif
                                                @if (!empty($product->weight))
                                                    <tr>
                                                        <th class="ps-table__th">Weight </th>
                                                        <td>{{ $product->weight }} gm</td>
                                                    </tr>
                                                @endif
                                                @if (!empty($product->length))
                                                    <tr>
                                                        <th class="ps-table__th">Length </th>
                                                        <td>{{ $product->length }} cm</td>
                                                    </tr>
                                                @endif
                                                @if (!empty($product->width))
                                                    <tr>
                                                        <th class="ps-table__th">Width </th>
                                                        <td>{{ $product->width }} cm</td>
                                                    </tr>
                                                @endif
                                                @if (!empty($product->height))
                                                    <tr>
                                                        <th class="ps-table__th">Height </th>
                                                        <td>{{ $product->height }} cm</td>
                                                    </tr>
                                                @endif
                                                @if (!empty(optional($product->brand)->name))
                                                    <tr>
                                                        <th class="ps-table__th">BRAND </th>
                                                        <td>{{ optional($product->brand)->name }}</td>
                                                    </tr>
                                                @endif
                                                @if (!empty($product->box_stock))
                                                    <tr>
                                                        <th class="ps-table__th">NO. OF CARTONS </th>
                                                        <td>{{ $product->box_stock }}</td>
                                                    </tr>
                                                @endif
                                                @if (!empty($product->box_stock) && !empty($product->box_contains))
                                                    <tr>
                                                        <th class="ps-table__th">PALLET QUANTITY </th>
                                                        <td>{{ $product->box_stock * $product->box_contains }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="ps-product__group mt-20">
                                            <table class="table ps-table ps-table--oriented m-0">
                                                <tr>
                                                    <th>Carton / Box</th>
                                                    <th>Unit Price</th>
                                                    <th>Stock</th>
                                                </tr>
                                                <tr>
                                                    <td>{{ $product->box_contains }}</td>
                                                    <td>
                                                        @if (Auth::check() && Auth::user()->status == 'active')
                                                            {{ $product->unit_price }}
                                                        @else
                                                            <a href="{{ route('login') }}"
                                                                class="btn btn-info btn-block">Login</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($product->box_stock) && $product->box_stock > 0)
                                                            <i class="fa fa-check"></i>
                                                        @else
                                                            <span class="text-danger">X</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="ps-product__feature">
                                @if (!empty($product->box_stock) && $product->box_stock > 0)
                                    <div class="ps-product__badge"><span
                                            class="ps-badge bg-success">{{ $product->box_stock }} In Stock</span></div>
                                @else
                                    <div class="ps-product__badge"><span class="ps-badge ps-badge--outstock">Out Of
                                            Stock</span></div>
                                @endif


                                @if (Auth::check() && Auth::user()->status == 'active')
                                    @if (!empty($product->box_discount_price))
                                        <div class="ps-product__meta">
                                            <span
                                                class="ps-product__price sale">£{{ $product->box_discount_price }}</span>
                                            <span class="ps-product__del">£{{ $product->box_price }}</span>
                                        </div>
                                    @else
                                        <div class="ps-product__meta">
                                            <span class="ps-product__price sale">£{{ $product->box_price }}</span>
                                        </div>
                                    @endif

                                    <div class="ps-product__quantity">
                                        <h6>Quantity</h6>
                                        <div class="def-number-input number-input safari_only">
                                            <button class="minus"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                    class="icon-minus"></i></button>
                                            <input class="quantity" min="1" name="quantity" value="1"
                                                type="number" data-product_id="{{ $product->id }}" />
                                            <button class="plus"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                    class="icon-plus"></i></button>
                                        </div>
                                    </div>

                                    <a class="ps-btn ps-btn--warning add_to_cart_btn_product_single"
                                        data-product_id="{{ $product->id }}" href="#">Add to cart</a>
                                @else
                                    <div class="ps-product__meta">
                                        <a href="{{ route('login') }}" class="btn btn-info btn-block">Login to view
                                            price</a>
                                    </div>
                                @endif

                                <ul class="ps-product__bundle">
                                    <li><i class="icon-wallet"></i>100% Money back Guaranteed</li>
                                    <li><i class="icon-bag2"></i>Non-contact shipping</li>
                                    <li><i class="icon-truck"></i>Free Delivery All Over UK Mainland (2-3 Days)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product__content">
                        <ul class="nav nav-tabs ps-tab-list bg-white p-3" id="productContentTabs" role="tablist">
                            <li class="nav-item ml-3 pr-info-tabs" role="presentation">
                                <a class="nav-link active" id="description-tab" data-toggle="tab"
                                    href="#description-content" role="tab" aria-controls="description-content"
                                    aria-selected="true">
                                    Key Features
                                </a>
                            </li>
                            <li class="nav-item ml-3 pr-info-tabs" role="presentation">
                                <a class="nav-link" id="information-tab" data-toggle="tab"
                                    href="#information-content" role="tab" aria-controls="information-content"
                                    aria-selected="false">
                                    Description
                                </a>
                            </li>
                            <li class="nav-item ml-3 pr-inf-tabs" role="presentation">
                                <a class="nav-link" id="specification-tab" data-toggle="tab"
                                    href="#specification-content" role="tab"
                                    aria-controls="specification-content" aria-selected="false">
                                    Specification
                                </a>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content"
                                    role="tab" aria-controls="reviews-content" aria-selected="false">
                                    Reviews (5)
                                </a>
                            </li> --}}
                        </ul>
                        <div class="tab-content bg-white p-5" id="productContent">
                            <div class="tab-pane fade show active" id="description-content" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="ps-document">
                                    <div class="row row-reverse">
                                        <div class="col-12">
                                            {!! $product->overview !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="information-content" role="tabpanel"
                                aria-labelledby="information-tab">
                                <div class="ps-document">
                                    <div class="row row-reverse">
                                        <div class="col-12">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="specification-content" role="tabpanel"
                                aria-labelledby="specification-tab">
                                <div class="ps-document">
                                    <div class="row row-reverse">
                                        <div class="col-12">
                                            {!! $product->specification !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="reviews-content" role="tabpanel"
                                aria-labelledby="reviews-tab">
                                <div class="ps-product__tabreview">
                                    <div class="ps-review--product">
                                        <div class="ps-review__row">
                                            <div class="ps-review__avatar"><img src="img/avatar/avatar-review.html"
                                                    alt="alt" /></div>
                                            <div class="ps-review__info">
                                                <div class="ps-review__name">Mark J.</div>
                                                <div class="ps-review__date">Oct 30, 2021</div>
                                            </div>
                                            <div class="ps-review__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-review__desc">
                                                <p>Everything is perfect. I would recommend!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-form--review">
                                    <div class="ps-form__title">Write a review</div>
                                    <div class="ps-form__desc">Your email address will not be published. Required
                                        fields are marked *</div>
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-12 col-lg-4">
                                                <label class="ps-form__label">Your rating *</label>
                                                <select class="ps-rating--form" data-value="0">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="col-6 col-lg-4">
                                                <label class="ps-form__label">Name *</label>
                                                <input class="form-control ps-form__input">
                                            </div>
                                            <div class="col-6 col-lg-4">
                                                <label class="ps-form__label">Email *</label>
                                                <input class="form-control ps-form__input">
                                            </div>
                                            <div class="col-12">
                                                <div class="ps-form__block">
                                                    <label class="ps-form__label">Your review *</label>
                                                    <textarea class="form-control ps-form__textarea"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button class="btn ps-btn ps-btn--warning">Add Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <section class="ps-section--also" data-background="img/related-bg.jpg">
                        <div class="container">
                            <h3 class="ps-section__title">Customer also bought</h3>
                            <div class="owl-carousel">
                                @foreach ($related_products as $related_product)
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail">
                                                <a class="ps-product__image"
                                                    href="{{ route('product.details', $related_product->slug) }}">
                                                    <figure>
                                                        @if (!empty($related_product->thumbnail))
                                                            @php
                                                                $thumbnailPath =
                                                                    'storage/' . $related_product->thumbnail;
                                                                $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                                    ? asset($thumbnailPath)
                                                                    : asset('frontend/img/no-product.jpg');
                                                            @endphp
                                                            <img src="{{ $thumbnailSrc }}"
                                                                alt="{{ $related_product->meta_title }}"
                                                                width="210" height="210" />
                                                        @else
                                                            @foreach ($related_product->multiImages->slice(0, 2) as $image)
                                                                @php
                                                                    $imagePath = 'storage/' . $image->photo;
                                                                    $imageSrc = file_exists(public_path($imagePath))
                                                                        ? asset($imagePath)
                                                                        : // : asset('frontend/img/no-product.jpg');
                                                                        asset('frontend/img/no-product.jpg');
                                                                @endphp
                                                                <img src="{{ $imageSrc }}"
                                                                    alt="{{ $related_product->meta_title }}"
                                                                    width="210" height="210" />
                                                            @endforeach
                                                        @endif
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a class="add_to_wishlist"
                                                            href="{{ route('wishlist.store', $related_product->id) }}">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                    </div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Quick view"><a href="#"
                                                            data-toggle="modal"
                                                            data-target="#popupQuickview{{ $related_product->id }}"><i
                                                                class="fa fa-search"></i></a></div>

                                                </div>
                                                @if (!empty($related_product->box_discount_price))
                                                    <div class="ps-product__badge">
                                                        <div class="ps-badge ps-badge--sale">Offer</div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title">
                                                    <a href="{{ route('product.details', $related_product->slug) }}">
                                                        {{ implode(' ', array_slice(explode(' ', $related_product->name), 0, 8)) }}
                                                    </a>
                                                </h5>
                                                @if (Auth::check() && Auth::user()->status == 'active')
                                                    @if (!empty($related_product->box_discount_price))
                                                        <div class="ps-product__meta">
                                                            <span
                                                                class="ps-product__price sale">£{{ $related_product->box_discount_price }}</span>
                                                            <span
                                                                class="ps-product__del">£{{ $related_product->box_price }}</span>
                                                        </div>
                                                    @else
                                                        <div class="ps-product__meta">
                                                            <span
                                                                class="ps-product__price sale">£{{ $related_product->box_price }}</span>
                                                        </div>
                                                    @endif
                                                    <a href="{{ route('cart.store', $related_product->id) }}"
                                                        class="btn ps-btn--warning my-3 btn-block add_to_cart"
                                                        data-product_id="{{ $related_product->id }}"
                                                        data-product_qty="1">Add To
                                                        Cart</a>
                                                @else
                                                    <div class="ps-product__meta">
                                                        <a href="{{ route('login') }}"
                                                            class="btn btn-info btn-block">Login
                                                            to view price</a>
                                                    </div>
                                                @endif
                                                <div class="ps-product__actions ps-product__group-mobile">
                                                    <div class="ps-product__quantity">
                                                        <div class="def-number-input number-input safari_only">
                                                            <button class="minus"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                    class="icon-minus"></i></button>
                                                            <input class="quantity" min="0" name="quantity"
                                                                value="1" type="number" />
                                                            <button class="plus"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                    class="icon-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a
                                                            href="#"><i class="fa fa-shopping-basket"></i></a>
                                                    </div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a class="add_to_wishlist"
                                                            href="{{ route('wishlist.store', $related_product->id) }}">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                    </div>
                                                    {{-- <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="ps-delivery"
                style="background-image: url({{ asset('frontend/img/promotion/banner-delivery-2.jpg') }})">
                <div class="ps-delivery__content">
                    <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>100% Secure
                                delivery </strong>without contacting the courier</span></div><a
                        class="ps-delivery__more" href="#">More</a>
                </div>
            </div>
        </div>
    </div>

    @foreach ($related_products as $related_product)
        <div class="modal fade" id="popupQuickview{{ $related_product->id }}" data-backdrop="static"
            data-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered ps-quickview">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="wrap-modal-slider container-fluid ps-quickview__body">
                            <button class="close ps-quickview__close" type="button" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="ps-product--detail">
                                <div class="row">
                                    <div class="col-12 col-xl-6">
                                        <div class="ps-product--gallery">
                                            <div class="ps-product__thumbnail">
                                                @if ($related_product->multiImages->isNotEmpty())
                                                    @foreach ($related_product->multiImages->slice(0, 5) as $image)
                                                        @php
                                                            $imagePath = 'storage/' . $image->photo;
                                                            $imageSrc = file_exists(public_path($imagePath))
                                                                ? asset($imagePath)
                                                                : asset('frontend/img/no-product.jpg');
                                                        @endphp
                                                        <div class="slide">
                                                            <img src="{{ $imageSrc }}"
                                                                alt="{{ $related_product->name }}" />
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @php
                                                        $thumbnailPath = 'storage/' . $related_product->thumbnail;
                                                        $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                            ? asset($thumbnailPath)
                                                            : asset('frontend/img/no-product.jpg');
                                                    @endphp
                                                    <div class="slide">
                                                        <img src="{{ $thumbnailSrc }}"
                                                            alt="{{ $related_product->name }}" />
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ps-gallery--image">
                                                @if ($related_product->multiImages->isNotEmpty())
                                                    @foreach ($related_product->multiImages->slice(0, 5) as $image)
                                                        @php
                                                            $imagePath = 'storage/' . $image->photo;
                                                            $imageSrc = file_exists(public_path($imagePath))
                                                                ? asset($imagePath)
                                                                : asset('frontend/img/no-product.jpg');
                                                        @endphp
                                                        <div class="slide">
                                                            <div class="ps-gallery__item">
                                                                <img src="{{ $imageSrc }}"
                                                                    alt="{{ $related_product->name }}" />
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @php
                                                        $thumbnailPath = 'storage/' . $related_product->thumbnail;
                                                        $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                            ? asset($thumbnailPath)
                                                            : asset('frontend/img/no-product.jpg');
                                                    @endphp
                                                    <div class="slide">
                                                        <div class="ps-gallery__item">
                                                            <img src="{{ $thumbnailSrc }}"
                                                                alt="{{ $related_product->name }}" />
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <div class="ps-product__info">
                                            <div class="ps-product__badge">
                                                <span
                                                    class="ps-badge ps-badge--instock">{{ $related_product->box_stock > 0 ? 'IN STOCK' : 'OUT OF STOCK' }}</span>
                                            </div>
                                            <div class="ps-product__branch">
                                                <a href="#">{{ optional($related_product->brand)->name }}</a>
                                            </div>
                                            <h5 class="ps-product__title">
                                                <a href="{{ route('product.details', $related_product->slug) }}">
                                                    {{ implode(' ', array_slice(explode(' ', $related_product->name), 0, 8)) }}
                                                </a>
                                            </h5>
                                            <div class="ps-product__desc">
                                                <p>{!! $related_product->short_description !!}</p>
                                            </div>
                                            @if (Auth::check() && Auth::user()->status == 'active')
                                                @if (!empty($related_product->box_discount_price))
                                                    <div class="ps-product__meta">
                                                        <span
                                                            class="ps-product__price sale">£{{ $related_product->box_discount_price }}</span>
                                                        <span
                                                            class="ps-product__del">£{{ $related_product->box_price }}</span>
                                                    </div>
                                                @else
                                                    <div class="ps-product__meta">
                                                        <span
                                                            class="ps-product__price sale">£{{ $related_product->box_price }}</span>
                                                    </div>
                                                @endif

                                                <div class="ps-product__quantity">
                                                    <h6>Quantity</h6>
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="1" name="quantity"
                                                            value="1" type="number"
                                                            data-product_id="{{ $related_product->id }}" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>

                                                <a class="ps-btn ps-btn--warning add_to_cart_btn_product_single"
                                                    data-product_id="{{ $related_product->id }}" href="#">Add
                                                    to
                                                    cart</a>
                                            @else
                                                <div class="ps-product__meta">
                                                    <a href="{{ route('login') }}"
                                                        class="btn btn-info btn-block">Login to
                                                        view
                                                        price</a>
                                                </div>
                                            @endif
                                            <div class="ps-product__type">
                                                <ul class="ps-product__list">

                                                    <li><span class="ps-list__title">SKU-Code: </span><a
                                                            class="ps-list__text"
                                                            href="#">{{ $related_product->sku_code }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
        <script>
            //メインスライド
            var slider = new Swiper('.gallery-slider', {
                slidesPerView: 1,
                centeredSlides: true,
                loop: true,
                loopedSlides: 6, //スライドの枚数と同じ値を指定
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            //サムネイルスライド
            var thumbs = new Swiper('.gallery-thumbs', {
                slidesPerView: 'auto',
                spaceBetween: 10,
                centeredSlides: true,
                loop: true,
                slideToClickedSlide: true,
            });

            //3系
            //slider.params.control = thumbs;
            //thumbs.params.control = slider;

            //4系～
            slider.controller.control = thumbs;
            thumbs.controller.control = slider;
        </script>
        <script>
            $('.videos-slider-2').slick({
                autoplay: true,
                slidesToScroll: 1,
                slidesToShow: 1,
                arrows: false,
                dots: false,
                asNavFor: '.slider-nav-thumbnails',
            });

            $('.slider-nav-thumbnails').slick({
                autoplay: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.videos-slider-2',
                dots: false,
                arrows: false,
                focusOnSelect: true,
                variableWidth: true
            });

            // Remove active class from all thumbnail slides
            $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

            // Set active class to first thumbnail slides
            $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

            // On before slide change match active thumbnail to current slide
            $('.videos-slider-2').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                var mySlideNumber = nextSlide;
                $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
                $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    items: 4, // Change this to 4
                    loop: true,
                    nav: true,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4 // Change this to 4 as well
                        }
                    }
                });
            });
        </script>
    @endpush
</x-frontend-app-layout>
