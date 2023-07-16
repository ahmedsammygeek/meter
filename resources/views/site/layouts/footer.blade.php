
    <!-- start the scroll div -->
    <div class="scroll">
        <i class='bx bx-chevron-up'></i>
    </div>
    <!-- end the scroll div -->


    <!-- start the footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <img src="{{ asset('site_assets/img/logo.JPG') }}" alt="logo-footer">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, 
                        cum reudiandae iste minima, optio voluptas cumque </p>
                    <h6>follow us :</h6>
                    <ul class="social">
                        <li><a href="{{ $data['settings']->facebook }}"><i class='bx bxl-facebook'></i></a></li>
                        <li><a href="{{ $data['settings']->youtube }}"><i class='bx bxl-twitter'></i></a></li>
                        <li><a href="{{ $data['settings']->twitter }}"><i class='bx bxl-youtube'></i></a></li>
                        <li><a href="{{ $data['settings']->instagram }}"><i class='bx bxl-instagram'></i></a></li>
                        <li><a href="{{ $data['settings']->tiktok }}"><i class='bx bxl-tiktok'></i></a></li>
                        <li><a href="{{ $data['settings']->snap_chat }}"><i class='bx bxl-snapchat'></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4> @lang('site.our company') </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="links">
                                <li><a href="{{ url('/') }}"><i class='bx bx-chevron-right'></i> @lang('site.home') </a></li>
                                <li><a href="{{ route('about') }}"><i class='bx bx-chevron-right'></i> @lang('site.about us') </a></li>
                                <li><a href="{{ route('offers') }}"><i class='bx bx-chevron-right'></i> @lang('site.offers') </a></li>
                                <li><a href="{{ route('contact') }}"><i class='bx bx-chevron-right'></i> @lang('site.contact us') </a></li>
                                <li><a href="{{ route('terms') }}"><i class='bx bx-chevron-right'></i> @lang('site.terms and condition') </a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="links">
                                @foreach ($data['services'] as $data_service)
                                   <li><a href="{{ route('services.show' , $data_service ) }}"><i class='bx bx-chevron-right'></i> {{ $data_service->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    
                    <h4> @lang('site.contacts') </h4>
                    <ul class="contact">
                        <li>
                            <i class='bx bx-home'></i>
                            <span> {{ $data['settings']->address }} </span>
                        </li>
                        <li>
                            <i class='bx bx-phone'></i>
                            <span> {{ $data['settings']->mobile }} </span>
                        </li>
                        <li>
                            <i class='bx bx-envelope'></i>
                            <span>{{ $data['settings']->email }} </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <span>© Elaidy Elmasia 2023 - All rights reserved.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end the footer -->


