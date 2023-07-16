    <header>
        <!-- start the header-top -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <ul class="social">
                            <li><a target='_blank' href="{{ $data['settings']->facebook }}"><i class='bx bxl-facebook'></i></a></li>
                            <li><a target='_blank' href="{{ $data['settings']->twitter }}"><i class='bx bxl-twitter'></i></a></li>
                            <li><a target='_blank' href="{{ $data['settings']->youtube }}"><i class='bx bxl-youtube'></i></a></li>
                            <li><a target='_blank' href="{{ $data['settings']->instagram }}"><i class='bx bxl-instagram'></i></a></li>
                            <li><a target='_blank' href="{{ $data['settings']->tiktok }}"><i class='bx bxl-tiktok'></i></a></li>
                            <li><a target='_blank' href="{{ $data['settings']->snap_chat }}"><i class='bx bxl-snapchat'></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul>
                            <li><i class='bx bx-phone'></i> {{ $data['settings']->mobile }}</li>
                            <li><i class='bx bxs-time'></i> {{ $data['settings']->working_hours }} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end the header-top -->
        <!-- start the nav -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('site_assets/img/logo.JPG') }}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class='bx bx-menu'></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}"> @lang('site.home') </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}"> @lang('site.about us') </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @lang('site.services')
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($data['services'] as $data_service)
                                <li><a class="dropdown-item" href="{{ route('services.show' , $data_service ) }}">{{ $data_service->name }}</a></li>
                                @endforeach             
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @lang('site.our projects')
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($data['projects'] as $data_project)
                                   <li><a class="dropdown-item" href="{{ route('projects.show' , $data_project ) }}"> {{ $data_project->name }} </a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('offers') }}"> @lang('site.offers') </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}"> @lang('site.contact us') </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? LaravelLocalization::getLocalizedURL('en') : LaravelLocalization::getLocalizedURL('ar') }}"> {{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'English' : 'العربيه' }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>