<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;
use App\Models\Offer;
use App\Models\Review;
use App\Models\Project;
use App\Http\Requests\Site\ContactUsRequest;
use Mail;
use App\Mail\ContactUsMail;
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('is_active' , 1)->latest()->get();
        $services = Service::where('is_active' , 1)->latest()->get();
        $offers = Offer::where('is_active' , 1)->latest()->get();
        $reviews = Review::where('is_active' , 1)->latest()->get();
        return view('site.index' , compact('products' , 'services' , 'offers' , 'reviews') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        $services = Service::where('is_active' , 1)->latest()->get();
        $offers = Offer::where('is_active' , 1)->latest()->get();
        $reviews = Review::where('is_active' , 1)->latest()->get();
        return view('site.about' , compact('services' , 'offers' , 'reviews'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function services()
    {
        $offers = Offer::where('is_active' , 1)->latest()->get();
        $reviews = Review::where('is_active' , 1)->latest()->get();
        $services = Service::where('is_active' , 1)->latest()->get();
        return view('site.services'  , compact('services'  , 'offers' , 'reviews'  ) );
    }

    public function offers()
    {
        $products = Product::where('is_active' , 1)->latest()->get();
        $offers = Offer::where('is_active' , 1)->latest()->get();
        $reviews = Review::where('is_active' , 1)->latest()->get();
        return view('site.offers' , compact('products' , 'reviews' , 'offers') );
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function terms()
    {
        return view('site.terms');
    }


    public function show_service(Service $service)
    {
        $offers = Offer::where('is_active' , 1)->latest()->get();
        $reviews = Review::where('is_active' , 1)->latest()->get();
        return view('site.service' , compact('service' , 'offers' , 'reviews'));
    }

    public function show_product(Product $product)
    {
        return view('site.product' , compact('product'));
    }
    
    public function show_project()
    {
        $offers = Offer::where('is_active' , 1)->latest()->get();
        $reviews = Review::where('is_active' , 1)->latest()->get();
        $projects = Project::where('is_active' , 1 )->latest()->get();
        return view('site.project' ,  compact('projects' , 'offers' , 'reviews') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function send(ContactUsRequest $request)
    {
        Mail::to('alaydealmasya.tech@gmail.com')->send(new ContactUsMail($request->all()));
        return back()->with('success' , trans('site.message_send_success') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
