@extends('site.layouts.master')

@section('page_content')

<!-- start the banner section -->
<section class="banner">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2> @lang('site.contact us') </h2>
                    <li>
                        <a href="{{ url('/') }}"> @lang('site.home') </a> //
                        @lang('site.contact us') 
                    </li>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end the banner section -->


<!-- start the contact section -->
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2> @lang('site.Get In Touch') </h2>
                <div class="move">
                    <span></span>
                </div>
            </div>
        </div>
        <div class="row second-row">
            <div class="col-lg-4 col-md-4">
                <h4> @lang('site.Quick Contact') </h4>
                <li>
                    <i class='bx bx-location-plus'></i>
                    <span>
                        {{ $data['settings']->address }}
                    </span>
                </li>
                <li>
                    <i class='bx bxs-phone-outgoing'></i>
                    <span> {{ $data['settings']->mobile }} </span>
                </li>
                <li>
                    <i class='bx bx-envelope'></i>
                    <span> {{ $data['settings']->email }} </span>
                </li>
                <li>
                    <i class='bx bxs-time'></i>
                    <span> {{ $data['settings']->working_hours }} </span>
                </li>
            </div>
            <div class="col-lg-8 col-md-8">
                @if (Session::has('success'))
                <div class="alert alert-primary" role="alert">
                   {{ Session::get('success') }}
               </div>
               @endif
               <h4> @lang('site.Send Message Us') </h4>
               <form action="{{ route('contact.send') }}" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-data">
                            <input  value="{{ old('name') }}" name='name' type="text" required>
                            <label> @lang('site.Your Name') </label>
                        </div>
                        @error('name')
                        <p class='text-danger' > {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-data">
                            <input name='email' type='email' value="{{ old('email') }}"  required>
                            <label> @lang('site.Your Email') </label>
                        </div>
                        @error('email')
                        <p class='text-danger' > {{ $message }} </p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-data">
                            <input type="text" name='phone' value="{{ old('phone') }}" required>
                            <label> @lang('site.Phone') </label>
                        </div>
                        @error('phone')
                        <p class='text-danger' > {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-data">
                            <input name='subject' value="{{ old('subject') }}" type="text" required>
                            <label> @lang('site.Subject') </label>
                        </div>
                        @error('subject')
                        <p class='text-danger' > {{ $message }} </p>
                        @enderror
                    </div>
                </div>
                <textarea name='message' placeholder="@lang('site.Your Message')"> {{ old('message') }} </textarea>
                @error('message')
                <p class='text-danger' > {{ $message }} </p>
                @enderror
                <button type="submit"> @lang('site.send') </button>
            </form>
        </div>
    </div>
</div>
</section>
<!-- end the contact section -->


<!-- start the map section -->
<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462560.6828097395!2d55.55714419440109!3d25.07628045112199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2z2K_YqNmKIC0g2KfZhNil2YXYp9ix2KfYqiDYp9mE2LnYsdio2YrYqSDYp9mE2YXYqtit2K_YqQ!5e0!3m2!1sar!2seg!4v1683258503847!5m2!1sar!2seg" 
    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<!-- end the map section -->


@endsection