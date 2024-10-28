@foreach ($latest_products as $latest_product)
    <div class="modal fade" id="popupQuickview{{ $latest_product->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-hidden="true">
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
                                            @if ($latest_product->multiImages->isNotEmpty())
                                                @foreach ($latest_product->multiImages->slice(0, 5) as $image)
                                                    @php
                                                        $imagePath = 'storage/' . $image->photo;
                                                        $imageSrc = file_exists(public_path($imagePath))
                                                            ? asset($imagePath)
                                                            : asset('frontend/img/no-product.jpg');
                                                    @endphp
                                                    <div class="slide">
                                                        <img src="{{ $imageSrc }}"
                                                            alt="{{ $latest_product->name }}" />
                                                    </div>
                                                @endforeach
                                            @else
                                                @php
                                                    $thumbnailPath = 'storage/' . $latest_product->thumbnail;
                                                    $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                        ? asset($thumbnailPath)
                                                        : asset('frontend/img/no-product.jpg');
                                                @endphp
                                                <div class="slide">
                                                    <img src="{{ $thumbnailSrc }}" alt="{{ $latest_product->name }}" />
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ps-gallery--image">
                                            @if ($latest_product->multiImages->isNotEmpty())
                                                @foreach ($latest_product->multiImages->slice(0, 5) as $image)
                                                    @php
                                                        $imagePath = 'storage/' . $image->photo;
                                                        $imageSrc = file_exists(public_path($imagePath))
                                                            ? asset($imagePath)
                                                            : asset('frontend/img/no-product.jpg');
                                                    @endphp
                                                    <div class="slide">
                                                        <div class="ps-gallery__item">
                                                            <img src="{{ $imageSrc }}"
                                                                alt="{{ $latest_product->name }}" />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                @php
                                                    $thumbnailPath = 'storage/' . $latest_product->thumbnail;
                                                    $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                        ? asset($thumbnailPath)
                                                        : asset('frontend/img/no-product.jpg');
                                                @endphp
                                                <div class="slide">
                                                    <div class="ps-gallery__item">
                                                        <img src="{{ $thumbnailSrc }}"
                                                            alt="{{ $latest_product->name }}" />
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
                                                class="ps-badge ps-badge--instock">{{ $latest_product->box_stock > 0 ? 'IN STOCK' : 'OUT OF STOCK' }}</span>
                                        </div>
                                        <div class="ps-product__branch">
                                            <a href="#">{{ optional($latest_product->brand)->name }}</a>
                                        </div>
                                        <h5 class="ps-product__title">
                                            <a href="{{ route('product.details', $latest_product->slug) }}">
                                                {{ $latest_product->name }}
                                            </a>
                                        </h5>
                                        <div class="ps-product__desc">
                                            <p>{!! $latest_product->short_description !!}</p>
                                        </div>
                                        @if (Auth::check() && Auth::user()->status == 'active')
                                            @if (!empty($latest_product->box_discount_price))
                                                <div class="ps-product__meta">
                                                    <span
                                                        class="ps-product__price sale">£{{ $latest_product->box_discount_price }}</span>
                                                    <span
                                                        class="ps-product__del">£{{ $latest_product->box_price }}</span>
                                                </div>
                                            @else
                                                <div class="ps-product__meta">
                                                    <span
                                                        class="ps-product__price sale">£{{ $latest_product->box_price }}</span>
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
                                                        data-product_id="{{ $latest_product->id }}" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>

                                            <a class="ps-btn ps-btn--warning add_to_cart_btn_product_single"
                                                data-product_id="{{ $latest_product->id }}" href="#">Add to
                                                cart</a>
                                        @else
                                            <div class="ps-product__meta">
                                                <a href="{{ route('login') }}" class="btn btn-info btn-block">Login to
                                                    view price</a>
                                            </div>
                                        @endif
                                        <div class="ps-product__type">
                                            <ul class="ps-product__list">

                                                <li><span class="ps-list__title">SKU-Code: </span><a
                                                        class="ps-list__text"
                                                        href="#">{{ $latest_product->sku_code }}</a>
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
@foreach ($deal_products as $deal_product)
    <div class="modal fade" id="popupQuickview{{ $deal_product->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-hidden="true">
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
                                            @if ($deal_product->multiImages->isNotEmpty())
                                                @foreach ($deal_product->multiImages->slice(0, 5) as $image)
                                                    @php
                                                        $imagePath = 'storage/' . $image->photo;
                                                        $imageSrc = file_exists(public_path($imagePath))
                                                            ? asset($imagePath)
                                                            : asset('frontend/img/no-product.jpg');
                                                    @endphp
                                                    <div class="slide">
                                                        <img src="{{ $imageSrc }}"
                                                            alt="{{ $deal_product->name }}" />
                                                    </div>
                                                @endforeach
                                            @else
                                                @php
                                                    $thumbnailPath = 'storage/' . $deal_product->thumbnail;
                                                    $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                        ? asset($thumbnailPath)
                                                        : asset('frontend/img/no-product.jpg');
                                                @endphp
                                                <div class="slide">
                                                    <img src="{{ $thumbnailSrc }}"
                                                        alt="{{ $deal_product->name }}" />
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ps-gallery--image">
                                            @if ($deal_product->multiImages->isNotEmpty())
                                                @foreach ($deal_product->multiImages->slice(0, 5) as $image)
                                                    @php
                                                        $imagePath = 'storage/' . $image->photo;
                                                        $imageSrc = file_exists(public_path($imagePath))
                                                            ? asset($imagePath)
                                                            : asset('frontend/img/no-product.jpg');
                                                    @endphp
                                                    <div class="slide">
                                                        <div class="ps-gallery__item">
                                                            <img src="{{ $imageSrc }}"
                                                                alt="{{ $deal_product->name }}" />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                @php
                                                    $thumbnailPath = 'storage/' . $deal_product->thumbnail;
                                                    $thumbnailSrc = file_exists(public_path($thumbnailPath))
                                                        ? asset($thumbnailPath)
                                                        : asset('frontend/img/no-product.jpg');
                                                @endphp
                                                <div class="slide">
                                                    <div class="ps-gallery__item">
                                                        <img src="{{ $thumbnailSrc }}"
                                                            alt="{{ $deal_product->name }}" />
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
                                                class="ps-badge ps-badge--instock">{{ $deal_product->box_stock > 0 ? 'IN STOCK' : 'OUT OF STOCK' }}</span>
                                        </div>
                                        <div class="ps-product__branch">
                                            <a href="#">{{ optional($deal_product->brand)->name }}</a>
                                        </div>
                                        <h5 class="ps-product__title">
                                            <a href="{{ route('product.details', $deal_product->slug) }}">
                                                {{ $deal_product->name }}
                                            </a>
                                        </h5>
                                        <div class="ps-product__desc">
                                            <p>{!! $deal_product->short_description !!}</p>
                                        </div>
                                        @if (Auth::check() && Auth::user()->status == 'active')
                                            @if (!empty($deal_product->box_discount_price))
                                                <div class="ps-product__meta">
                                                    <span
                                                        class="ps-product__price sale">£{{ $deal_product->box_discount_price }}</span>
                                                    <span
                                                        class="ps-product__del">£{{ $deal_product->box_price }}</span>
                                                </div>
                                            @else
                                                <div class="ps-product__meta">
                                                    <span
                                                        class="ps-product__price sale">£{{ $deal_product->box_price }}</span>
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
                                                        data-product_id="{{ $deal_product->id }}" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>

                                            <a class="ps-btn ps-btn--warning add_to_cart_btn_product_single"
                                                data-product_id="{{ $deal_product->id }}" href="#">Add to
                                                cart</a>
                                        @else
                                            <div class="ps-product__meta">
                                                <a href="{{ route('login') }}" class="btn btn-info btn-block">Login
                                                    to
                                                    view
                                                    price</a>
                                            </div>
                                        @endif
                                        <div class="ps-product__type">
                                            <ul class="ps-product__list">


                                                <li>
                                                    <span class="ps-list__title">SKU-Code: </span><a
                                                        class="ps-list__text"
                                                        href="#">{{ $deal_product->sku_code }}</a>
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
