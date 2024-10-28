<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\Brand;
use App\Models\Order;
use App\Models\BlogTag;
use App\Models\Product;
use App\Models\Setting;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\DealBanner;
use App\Models\PageBanner;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\ShippingMethod;
use App\Models\TermsAndCondition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function home()
    {
        $categoryone = Category::inRandomOrder()->active()->first();

        if ($categoryone) {
            $categoryoneproducts = $categoryone->products()->inRandomOrder()->paginate(8);
        }

        if ($categoryone) {
            $categorytwo = Category::where('id', '!=', $categoryone->id)
                ->inRandomOrder()->active()->first();

            if ($categorytwo) {
                $categorytwoproducts = $categorytwo->products()->inRandomOrder()->paginate(8);
            }
        }

        if (isset($categoryone, $categorytwo)) {
            $categorythree = Category::where('id', '!=', $categoryone->id)
                ->where('id', '!=', $categorytwo->id)
                ->inRandomOrder()->active()->first();

            if ($categorythree) {
                $categorythreeproducts = $categorythree->products()->inRandomOrder()->paginate(8);
            }
        }
        $categoryoneproducts = $categoryoneproducts ?? collect(); // Empty collection if categoryone is null
        $categorytwoproducts = $categorytwoproducts ?? collect(); // Empty collection if categorytwo is null
        $categorythreeproducts = $categorythreeproducts ?? collect();
        $data = [

            'sliders'                   => PageBanner::active()->where('page_name', 'home_slider')->latest('id')->get(),
            'home_slider_bottom_first'  => PageBanner::active()->where('page_name', 'home_slider_bottom_first')->latest('id')->first(),
            'home_slider_bottom_second' => PageBanner::active()->where('page_name', 'home_slider_bottom_second')->latest('id')->first(),
            'home_slider_bottom_third'  => PageBanner::active()->where('page_name', 'home_slider_bottom_third')->latest('id')->first(),
            'blog_posts'                => BlogPost::active()->inRandomOrder()->get(),
            'deals'                     => DealBanner::active()->inRandomOrder()->limit(7)->get(),
            'blog'                      => BlogPost::inRandomOrder()->active()->first(),
            'categorys'                 => Category::orderBy('name', 'ASC')->active()->get(),
            'categoryone'               => $categoryone ?? '',
            'categoryoneproducts'       => $categoryoneproducts,
            'categorytwo'               => $categorytwo ?? '',
            'categorytwoproducts'       => $categorytwoproducts,
            'categorythree'             => $categorythree ?? '',
            'categorythreeproducts'     => $categorythreeproducts,
            'latest_products'           => Product::with('multiImages')->inRandomOrder()->where('status', 'published')->paginate(8),
            'deal_products'             => Product::with('multiImages')->whereNotNull('box_discount_price')->where('status', 'published')->inRandomOrder()->limit(10)->get(),
        ];
        // dd($data['deal_products']);
        return view('frontend.pages.home', $data);
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function aboutUs()
    {
        $data = [
            'blog_posts'     => BlogPost::latest('id')->where('status', 'publish')->get(),
        ];
        return view('frontend.pages.aboutUs', $data);
    }
    public function returnPolicy()
    {
        return view('frontend.pages.returnPolicy');
    }
    public function privacyPolicy()
    {
        $data = [
            'banner'  => PageBanner::active()->where('page_name', 'privacy')->latest('id')->first(),
            'privacy' => PrivacyPolicy::latest('id')->where('status', 'active')->first(),
        ];
        return view('frontend.pages.privacyPolicy', $data);
    }
    public function termsCondition()
    {
        $data = [
            'banner'  => PageBanner::active()->where('page_name', 'terms')->latest('id')->first(),
            'terms'   => TermsAndCondition::latest('id')->where('status', 'active')->first(),
        ];
        return view('frontend.pages.termsCondition', $data);
    }
    public function faq()
    {
        $data = [
            'banner'  => PageBanner::active()->where('page_name', 'faq')->latest('id')->first(),
            'faqs'    => Faq::orderBy('order', 'asc')->where('status', 'active')->get(),
        ];
        return view('frontend.pages.faq', $data);
    }
    public function allBlog()
    {
        $data = [
            'blog_posts'     => BlogPost::latest('id')->where('status', 'publish')->get(),
            'blog_categorys' => BlogCategory::latest('id')->where('status', 'active')->get(),
            'blog_tags'      => BlogTag::latest('id')->where('status', 'active')->get(),
        ];
        return view('frontend.pages.blog.allBlog', $data);
    }
    public function blogDetails($slug)
    {
        $data = [
            'blog'           => BlogPost::where('slug', $slug)->first(),
            'blog_posts'     => BlogPost::inRandomOrder()->latest('id')->where('status', 'publish')->get(),
            'blog_categorys' => BlogCategory::latest('id')->where('status', 'active')->get(),
            'blog_tags'      => BlogTag::latest('id')->where('status', 'active')->get(),
        ];
        return view('frontend.pages.blog.blogDetails', $data);
    }
    public function productDetails($slug)
    {
        $data = [
            'product'          => Product::where('slug', $slug)->first(),
            'related_products' => Product::select('id', 'slug', 'meta_title', 'thumbnail', 'name', 'box_discount_price', 'box_price')->with('multiImages')->where('status', 'published')->inRandomOrder()->limit(12)->get(),
        ];
        return view('frontend.pages.product.productDetails', $data);
    }
    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $data = [
            'category'                => $category,
            'categories'              => Category::orderBy('name', 'ASC')->active()->get(),
        ];
        return view('frontend.pages.categoryDetails', $data);
    }

    public function compareList()
    {

        $data = [
            'categories'   => Category::orderBy('name', 'ASC')->active()->get(),
        ];
        return view('frontend.pages.cart.compareList', $data);
    }

    public function cart()
    {
        $data = [
            'cartItems' => Cart::instance('cart')->content(),
            'related_products' => Product::select('id', 'slug', 'meta_title', 'thumbnail', 'name', 'box_discount_price', 'box_price')->with('multiImages')->where('status', 'published')->inRandomOrder()->limit(12)->get(),
        ];
        return view('frontend.pages.cart.mycart', $data);
    }
    public function checkout()
    {
        $setting = Setting::first();
        $minimumOrderAmount = $setting->minimum_order_amount ?? 0;

        $formattedSubtotal = Cart::instance('cart')->subtotal();
        $cleanSubtotal = preg_replace('/[^\d.]/', '', $formattedSubtotal);
        $subTotal = (float)$cleanSubtotal;

        if ($subTotal > $minimumOrderAmount) {
            $data = [
                'shippingmethods' => ShippingMethod::active()->get(),
                'cartItems'       => Cart::instance('cart')->content(),
                'total'           => Cart::instance('cart')->total(),
                'cartCount'       => Cart::instance('cart')->count(),
                'user'            => Auth::user(),
                'subTotal'        => $subTotal,
            ];
            return view('frontend.pages.cart.checkout', $data);
        } else {
            // Redirect back with error message
            Session::flash('error', 'The added product price must be greater than 500£ to proceed to check out.');
            // Session::flush();
            return redirect()->back();
        }
    }


    public function checkoutSuccess($id)
    {

        $data = [
            'order'           => Order::with('orderItems')->where('order_number', $id)->first(),
            'user'            => Auth::user(),
        ];
        // dd(Cart::instance('cart'));
        return view('frontend.pages.cart.checkoutSuccess', $data);
    }

    public function globalSearch(Request $request)
    {
        $query = $request->get('term', '');
        $data['products'] = Product::join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('products.name', 'LIKE', '%' . $query . '%')
            ->where('products.status', 'published')
            ->where('brands.status', 'active')
            ->limit(10)
            ->get(['products.id', 'products.name', 'products.slug', 'products.thumbnail', 'products.box_price', 'products.box_discount_price', 'products.box_stock', 'products.short_description']);

        $data['categorys'] = Category::where('name', 'LIKE', '%' . $query . '%')->limit(2)->get(['id', 'name', 'slug']);
        $data['brands'] = Brand::where('name', 'LIKE', '%' . $query . '%')->where('status', 'active')->limit(5)->get(['id', 'name', 'slug']);
        $data['blogs'] = BlogPost::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title', 'slug']);

        return response()->json(view('frontend.layouts.search', $data)->render());
    } // end method
}
