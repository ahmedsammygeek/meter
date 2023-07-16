
@extends('site.layouts.master')

@section('page_content')


<!-- start the wrap-header section -->
<section class="wrap-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<h2>fast electrical services</h2>
				<h4>"We provide Reliable and Affordable services"</h4>
				<button><a href="{{ route('about') }}">about us</a></button>
			</div>
		</div>
	</div>
	<div class="scrollbottom">
		<a href="#about">
			<i class='bx bx-chevron-down'></i>
		</a>
	</div>
</section>
<!-- end the wrap-header section -->


<!-- start the about section -->
<section class="about" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="about-img">
					<img src="{{ asset('site_assets/img/2-1.jpg') }}" alt="about-img">
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<span>30 YEARS OF EXPERIENCE</span>
				<h2>Heating & Air Conditioning Repair & Installation Company</h2>
				<div class="move">
					<span></span>
				</div>
				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia eos nemo architecto tenetur aliquid hic, magnam voluptatem nesciunt soluta itaque perferendis
				fugit ab iusto culpa quis alias nam, nihil velit!</p>
				<button><a href="{{ route('about') }}">about us</a></button>
				<button><a href="{{ route('services') }}">our services</a></button>
			</div>
		</div>
	</div>
</section>
<!-- end the about section -->

<!-- start the shop section -->
<section class="shop">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<span> @lang('site.our_shop') </span>
				<h2> @lang('site.We Have Many Of Products') </h2>
				<div class="move">
					<span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="owl-carousel">
					@foreach ($products as $product)
					<div class="pro-box">
						<div class="pro-img">
							<img src="{{ Storage::url('products/'.$product->image) }}" alt="Products">
						</div>
						<div class="pro-text">
							<h3>{{ $product->name }}</h3>
							<button><a href="{{ route('products.show' , $product ) }}"> @lang('site.view_details') </a></button>
						</div>
						@if ($product->discount)
						<span> {{ $product->discount }} </span>
						@endif
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end the shop section -->

<!-- start the services section -->
<section class="services">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<span> @lang('site.our services') </span>
				<h2> @lang('site.We Run All Kinds Of Services') </h2>
				<div class="move">
					<span></span>
				</div>
			</div>
		</div>

		<div class="row">
			@php
			$i  = 1;
			@endphp
			@foreach ($services as $service)
			<div class="col-lg-6 col-md-6">
				<div class="box">
					<div class="icon">
						<h4>{{ $i++ }}</h4>
					</div>
					<div class="text">
						<h3> {{ $service->name }} </h3>
						<p> {{ $service->subtitle }} </p>
						<button><a href="{{ route('services.show' , $service) }}"> @lang('site.Read more') </a></button>
					</div>
				</div>
			</div> 
			@endforeach
		</div>
	</div>
</section>
<!-- end the services section -->


<!-- start the home-banner section -->
<section class="home-banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-1 col-md-1"></div>
			<div class="col-lg-10 col-md-10">
				<div class="home-banner-box">
					<h2> @lang('site.Contact us to get your service') </h2>
					<a href="https://api.whatsapp.com/send?phone={{ $data['settings']->whatsapp }}" target="-blank">
						<i class='bx bxl-whatsapp'></i>
						<h4> @lang('site.contact whatsapp') </h4>
					</a>
				</div>
			</div>
			<div class="col-lg-1 col-md-1"></div>
		</div>
	</div>
</section>
<!-- end the home-banner section -->


<!-- start the offer section -->
<section class="offer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<span> @lang('site.our offers') </span>
				<h2> @lang('site.We Provide Some Offers') </h2>
				<div class="move">
					<span></span>
				</div>
			</div>
		</div>

		<div class="row">
			@php
				$i = 1;
			@endphp
			@foreach ($offers as $offer)
			<div class="col-lg-6 col-md-6">
				<div class="offer-box">
					<div class="number">
						{{ $i++ }}
					</div>
					<h3> {{ $offer->name }} </h3>
					<p> {{ $offer->content }} </p>
					<a  href="https://api.whatsapp.com/send?phone={{ $data['settings']->whatsapp }}" target="-blank">
						@lang('site.contact whatsapp')
					</a>    
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- end the offer section -->


<!-- start the review section -->
<section class="review">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<span> @lang('site.testimonial') </span>
				<h2> @lang('site.We Have Trusted Clients') </h2>
				<div class="move">
					<span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="owl-carousel">
					@foreach ($reviews as $review)
					<div class="review-box">
						<img src="{{ Storage::url('reviews/'.$review->image) }}" alt="review">
						<p>{{ $review->comment }}</p>
						<h6>{{ $review->name }}</h6>
						<li>
							@for ($i = 0; $i < $review->rate ; $i++)
							<i class='bx bx-star'></i>                          
							@endfor
						</li>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</section>
<!-- end the review section -->
@endsection