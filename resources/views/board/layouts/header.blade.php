      <header class="navbar navbar-expand-md d-print-none" >
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('board.index') }}">
              <img src="./static/logo.svg" width="110" height="32" alt="لوحه التحكم" class="navbar-brand-image">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">

            <div class="d-none d-md-flex">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
              data-bs-placement="bottom">
              <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
            </a>
            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
            data-bs-placement="bottom">
            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
          </a>

        </div>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm" style="background-image: url({{ Storage::url('users/'.Auth::user()->image) }})"></span>
            <div class="d-none d-xl-block ps-2">
              <div> {{ Auth::user()->name }} </div>
              <div class="mt-1 small text-muted"> مدير الموقع </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="{{ route('board.profile.show') }}" class="dropdown-item"> الملف الشخصى </a>
            <a href="{{ route('board.password.show') }}" class="dropdown-item">تعديل كلمه المرور</a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('board.logout') }}" class="dropdown-item"> تسجيل الخروج </a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar">
        <div class="container-xl">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('board.index') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                  الرئيسيه
                </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('board.users.index') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                   <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                   <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                   <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                   <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                   <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                 </svg>
               </span>
               <span class="nav-link-title">
                المشرفين
              </span>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="{{ route('board.workers.index') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                   <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                   <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                   <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                   <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                   <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                 </svg>
               </span>
               <span class="nav-link-title">
                الموظفين
              </span>
            </a>
          </li>
      </ul>

    </div>
  </div>
</div>
</header>