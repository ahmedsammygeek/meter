@extends('site.layouts.master')

@section('page_content')
<!-- start the banner section -->
<section class="banner">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2> @lang('site.product_details') </h2>
                    <li>
                        <a href="{{ url('/') }}"> @lang('home') </a> //
                        {{ $product->name }}
                    </li>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end the banner section -->

<!-- start the pro-details section -->
<section class="pro-details">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="product-slider">
                    <img src="{{ Storage::url('products/'.$product->image) }}" id="mainimg">
                    <div class="img-slides">
                        @foreach ($product->images as $image)
                        <div class="img-slide">
                            <img src="{{ Storage::url('products/'.$image->image) }}" class="small-img">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-8">
                <h4> {{ $product->name }} </h4>
                <h6>$ {{ $product->price }} </h6>
                <li>
                   @for ($i = 0; $i < $product->Rate ; $i++)
                   <i class='bx bx-star'></i>
                   @endfor
               </li>
               <p>{{  $product->content }}</p>
               <hr>
               <a href="https://api.whatsapp.com/send?phone={{ $data['settings']->whatsapp }}" target="-blank">
                <span> @lang('site.contact_whats') </span>
            </a>
        </div>
    </div>
</div>
</section>
<!-- end the pro-details section -->


<!-- start the scroll div -->
<div class="scroll">
    <i class='bx bx-chevron-up'></i>
</div>
<!-- end the scroll div -->


@endsection