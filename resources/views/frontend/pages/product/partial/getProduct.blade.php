<div class="ps-categogy--list">
    @if ($products->count() > 0)
        @foreach ($products as $product)
            <div class="ps-product ps-product--list align-items-center">
                <div class="ps-product__content">
                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                            <figure>
                                <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                                    onerror="this.onerror=null; this.src='{{ asset('frontend/img/no-product.jpg') }}';">
                            </figure>
                        </a>
                        <div class="ps-product__actions">
                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title=""
                                data-original-title="Quick view"><a href="#" data-toggle="modal"
                                    data-target="#popupQuickview{{ $product->id }}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="ps-product__badge">
                        </div>
                    </div>
                    <div class="ps-product__info">
                        {{-- <a class="ps-product__branch"
                                                 href="{{ route('category.products', $product->category->slug) }}">
                                                 {{ $product->category->name }}
                                             </a> --}}
                        <h5 class="ps-product__title shop_product-title">
                            <a href="{{ route('product.details', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </h5>
                        <div class="ps-product__desc">
                            @php
                                $description = strip_tags($product->short_description); // Strip any HTML tags
                                $words = explode(' ', $description); // Convert the description into an array of words
                                $limitedWords = implode(' ', array_slice($words, 0, 20)); // Get the first 15 words and join them back into a string
                            @endphp
                            {!! $limitedWords !!}...
                        </div>
                    </div>
                </div>
                <div class="ps-product__footer">
                    @if (Auth::check() && Auth::user()->status == 'active')
                        @if (!empty($product->box_discount_price))
                            <div class="ps-product__meta">
                                <span class="ps-product__price  sale">£{{ $product->box_discount_price }}</span>
                                <span class="ps-product__del">£{{ $product->box_price }}</span>
                            </div>
                        @else
                            <div class="ps-product__meta">
                                <span class="ps-product__price sale">£{{ $product->box_price }}</span>
                            </div>
                        @endif

                        <div class="ps-product">
                            <div class="ps-product__quantity">
                                <h6>Quantity</h6>
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="icon-minus"></i>
                                    </button>
                                    <input class="quantity" min="1" name="quantity" value="1"
                                        type="number" />
                                    <button class="plus"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="icon-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <a class="ps-btn ps-btn--warning" data-product_id="12" href="#"
                                onclick="addToCartShop(event, {{ $product->id }})">Add to cart</a>
                        </div>
                    @else
                        <div class="ps-product__meta">
                            <a href="{{ route('login') }}" class="btn btn-info btn-block">Login to
                                view price</a>
                        </div>
                    @endif

                    <div class="ps-product__variations text-center mt-3">
                        {{-- <a class="ps-product__link add_to_wishlist" href="{{ route('wishlist.store', $product->id) }}"
                         data-product-id="{{ $product->id }}">Add to wishlist</a> --}}
                        <a class="ps-product__link" href="javascript:void(0)"
                            onclick="addToWishlist(event, '{{ route('wishlist.store', $product->id) }}')">Add to
                            wishlist</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="ps-product ps-product--list align-items-center">
            <h5 class="text-warning">No Product Found.</h5>
        </div>
    @endif
</div>
{{-- <div class="ps-pagination">
    {{ $products->links() }}
</div> --}}
