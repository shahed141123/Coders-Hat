@if (
    (is_countable($brands) && count($brands) > 0) ||
        (is_countable($categorys) && count($categorys) > 0) ||
        (is_countable($products) && count($products) > 0) ||
        (is_countable($blogs) && count($blogs) > 0))
    <div class="ps-result__content">
        <div class="row m-0">
            <div class="col-12 col-lg-5">
                <div class="search-ctg">
                    <div class="row">
                        @if (is_countable($brands) && count($brands) > 0)
                            <div class="col-lg-6 col-5">
                                <h4 class="fw-bold mb-4 site_text_color">Brands</h4>
                                @foreach ($brands as $brand)
                                    <h4><a class="search_titles" href="#">{{ $brand->name }}</a></h4>
                                @endforeach
                            </div>
                        @endif
                        @if (is_countable($categorys) && count($categorys) > 0)
                            <div class="col-lg-6 col-7">
                                <h4 class="fw-bold mb-4 site_text_color">Categorys</h4>
                                @foreach ($categorys as $category)
                                    <h4>
                                        <a class="search_titles"
                                            href="{{ route('category.products', $category->slug) }}">{{ $category->name }}</a>
                                    </h4>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    @if (is_countable($blogs) && count($blogs) > 0)
                        <div class="row mt-3">
                            <div class="col-12">
                                <h4 class="fw-bold mb-4 site_text_color">Blogs</h4>
                                @foreach ($blogs as $blog)
                                    <h4>
                                        <a class="search_titles"href="{{ route('blog.details', $blog->slug) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </h4>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-lg-7">
                @if (count($products) > 0)
                    @foreach ($products as $search_product)
                        <div class="ps-product ps-product--horizontal top-search-product">
                            <div class="ps-product__thumbnail top-search-product-img">
                                <a class="ps-product__image search-img"
                                    href="{{ route('product.details', $search_product->slug) }}">
                                    <figure>
                                        <img class="img-fluid searched-product"
                                            src="{{ asset('storage/' . $search_product->thumbnail) }}" alt="alt"
                                            onerror="this.onerror=null;this.src='{{ asset('images/no-preview.png') }}';" />
                                    </figure>
                                </a>
                            </div>
                            <div class="ps-product__content pt-0">
                                <h4 class="ps-product__title" style="height: auto; min-height:auto">
                                    <a href="{{ route('product.details', $search_product->slug) }}">
                                        {{ $search_product->name }}
                                    </a>
                                </h4>
                                <p class="ps-product__desc d-none" style="display: block">{!! $search_product->short_description !!}</p>
                                @if (Auth::check() && Auth::user()->status == 'active')
                                    {{-- Display product pricing information outside of the <a> tag --}}
                                    @if (!empty($search_product->box_discount_price))
                                        <div class="ps-product__meta">
                                            <span class="">£{{ $search_product->box_discount_price }}</span>
                                            <span class="ps-product__del">£{{ $search_product->box_price }}</span>
                                        </div>
                                    @else
                                        <div class="ps-product__meta">
                                            <span
                                                class="ps-product__price sale">£{{ $search_product->box_price }}</span>
                                        </div>
                                    @endif

                                    {{-- Add to Cart button --}}
                                    <a href="{{ route('cart.store', $search_product->id) }}"
                                        class="btn ps-btn--warning my-3 btn-block add_to_cart"
                                        data-product_id="{{ $search_product->id }}" data-product_qty="1"
                                        onclick="addToCart(event, '{{ csrf_token() }}', '{{ route('cart.store', $search_product->id) }}')">
                                        <span>Add To Cart</span>
                                    </a>
                                @else
                                    <div class="ps-product__meta">
                                        <a href="{{ route('login') }}" class="btn btn-info btn-block">Login
                                            to view price</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="ps-result__viewall"><a href="{{ route('allproducts') }}">View all</a></div>
                @else
                    <div class="row m-0 p-2 shadow-lg bg-white border rounded d-flex align-items-center">
                        <h4 class="text-danger text-center">No Product Found. Search again.</h4>
                    </div>
                @endif
            </div>
        </div>

    </div>
@else
    <div class="ps-result__content">
        <div class="row m-0">
            <div class="col-12 col-lg-5">
                <div class="text-center p-4">
                    <h4 style="color: #ae0a46;"> Nothing Found ! Search again.</h4>
                </div>
            </div>
        </div>
    </div>
@endif
