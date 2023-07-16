@extends('site.layouts.master')

@section('page_content')

    <!-- start the banner section -->
    <section class="banner">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2>@lang('site.Terms & Condition') </h2>
                        <li>
                            <a href="{{ url('/') }}">@lang('site.home') </a> //
                            @lang('site.Terms & Condition') 
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end the banner section -->


    <!-- start the terms section -->
    <section class="terms">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        {!! $data['settings']->terms !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end the terms section -->



@endsection