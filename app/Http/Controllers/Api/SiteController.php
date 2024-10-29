<?php

namespace App\Http\Controllers\Api;

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
use App\Models\FaqCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class SiteController extends Controller
{
    public function home()
    {
        $categoryone = Category::inRandomOrder()->active()->first();

        $categoryoneproducts = $categoryone ? $categoryone->products()->inRandomOrder()->paginate(8) : collect();
        $categorytwo = $categoryone ? Category::where('id', '!=', $categoryone->id)->inRandomOrder()->active()->first() : null;
        $categorytwoproducts = $categorytwo ? $categorytwo->products()->inRandomOrder()->paginate(8) : collect();
        $categorythree = $categoryone && $categorytwo
            ? Category::whereNotIn('id', [$categoryone->id, $categorytwo->id])->inRandomOrder()->active()->first()
            : null;
        $categorythreeproducts = $categorythree ? $categorythree->products()->inRandomOrder()->paginate(8) : collect();

        return response()->json([
            'sliders' => PageBanner::active()->where('page_name', 'home_slider')->latest('id')->get(),
            'blog_posts' => BlogPost::active()->inRandomOrder()->get(),
            'deals' => DealBanner::active()->inRandomOrder()->limit(7)->get(),
            'categories' => Category::orderBy('name', 'ASC')->active()->get(),
            'latest_products' => Product::with('multiImages')->inRandomOrder()->where('status', 'published')->paginate(8),
            'deal_products' => Product::with('multiImages')->whereNotNull('box_discount_price')->where('status', 'published')->inRandomOrder()->limit(10)->get(),
        ], 200);
    }
    public function blogCategories()
    {
        return response()->json([
            'categorys' => BlogCategory::inRandomOrder()->active()->get(),
        ], 200);
    }
    public function categoryWiseBlogs($slug)
    {
        $category = BlogCategory::where('slug', $slug)->active()->first();

        if (!$category) {
            return response()->json([
                'message' => 'Category not found',
            ], 404);
        }

        // Assuming the `BlogPost` model has a `category_id` or a relationship with `BlogCategory`
        $blogs = BlogPost::whereJsonContains('category_id', (string) $category->id)->active()->get();

        return response()->json([
            'blogs' => $blogs,
        ], 200);
    }

    public function allBlog()
    {
        return response()->json([
            'blog_posts' => BlogPost::latest('id')->where('status', 'publish')->get(),
        ], 200);
    }

    public function blogDetails($slug)
    {
        $blog = BlogPost::where('slug', $slug)->active()->first();

        return response()->json([
            'blog' => $blog, // Access the accessor
        ], 200);
        // return response()->json([
        //     'blog' => BlogPost::with('blogCategory')->where('slug', $slug)->active()->first(),
        // ], 200);
    }
    // public function blogDetails($slug)
    // {
    //     return response()->json([
    //         'blog' => BlogPost::where('slug', $slug)->first(),
    //         'blog_posts' => BlogPost::inRandomOrder()->latest('id')->where('status', 'publish')->get(),
    //         'blog_categorys' => BlogCategory::latest('id')->where('status', 'active')->get(),
    //         'blog_tags' => BlogTag::latest('id')->where('status', 'active')->get(),
    //     ], 200);
    // }



    public function faqCategories()
    {
        return response()->json([
            'categorys' => FaqCategory::inRandomOrder()->active()->get(),
        ], 200);
    }
    public function categoryWiseFaqs($slug)
    {
        $category = FaqCategory::with('faq')->where('slug', $slug)->active()->first();

        if (!$category) {
            return response()->json([
                'message' => 'Category not found',
            ], 404);
        }

        $faqs = $category->faq;

        return response()->json([
            'faqs' => $faqs,
        ], 200);
    }

    public function allFaq()
    {
        return response()->json([
            'faqs' => Faq::latest('id')->active()->get(),
        ], 200);
    }




    public function contact()
    {

        return response()->json(['message' => 'Contact page data loaded'], 200);
    }

    public function aboutUs()
    {
        return response()->json([
            'blog_posts' => BlogPost::latest('id')->where('status', 'publish')->get(),
        ], 200);
    }

    public function returnPolicy()
    {
        return response()->json(['message' => 'Return policy data loaded'], 200);
    }

    public function privacyPolicy()
    {
        return response()->json([
            'banner' => PageBanner::active()->where('page_name', 'privacy')->latest('id')->first(),
            'privacy' => PrivacyPolicy::latest('id')->where('status', 'active')->first(),
        ], 200);
    }

    public function termsCondition()
    {
        return response()->json([
            'banner' => PageBanner::active()->where('page_name', 'terms')->latest('id')->first(),
            'terms' => TermsAndCondition::latest('id')->where('status', 'active')->first(),
        ], 200);
    }

    public function faq()
    {
        return response()->json([
            'banner' => PageBanner::active()->where('page_name', 'faq')->latest('id')->first(),
            'faqs' => Faq::orderBy('order', 'asc')->where('status', 'active')->get(),
        ], 200);
    }



    public function productDetails($slug)
    {
        return response()->json([
            'product' => Product::where('slug', $slug)->first(),
            'related_products' => Product::select('id', 'slug', 'meta_title', 'thumbnail', 'name', 'box_discount_price', 'box_price')->with('multiImages')->where('status', 'published')->inRandomOrder()->limit(12)->get(),
        ], 200);
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return response()->json([
            'category' => $category,
            'categories' => Category::orderBy('name', 'ASC')->active()->get(),
        ], 200);
    }


    public function globalSearch(Request $request)
    {
        $query = $request->get('term', '');
        return response()->json([
            'products' => Product::join('brands', 'products.brand_id', '=', 'brands.id')->where('products.name', 'LIKE', '%' . $query . '%')->where('products.status', 'published')->where('brands.status', 'active')->limit(10)->get(['products.id', 'products.name', 'products.slug', 'products.thumbnail', 'products.box_price', 'products.box_discount_price', 'products.box_stock', 'products.short_description']),
            'categories' => Category::where('name', 'LIKE', '%' . $query . '%')->limit(2)->get(['id', 'name', 'slug']),
            'brands' => Brand::where('name', 'LIKE', '%' . $query . '%')->where('status', 'active')->limit(5)->get(['id', 'name', 'slug']),
            'blogs' => BlogPost::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title', 'slug']),
        ], 200);
    }
}
