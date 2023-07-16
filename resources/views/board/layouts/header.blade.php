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
            <a href="{{ route('board.settings.edit') }}" class="dropdown-item">الاعدادات</a>
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
            <a class="nav-link" href="{{ route('board.offers.index') }}" >
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                 <path d="M9 15l6 -6"></path>
                 <circle cx="9.5" cy="9.5" r=".5" fill="currentColor"></circle>
                 <circle cx="14.5" cy="14.5" r=".5" fill="currentColor"></circle>
                 <path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7a2.2 2.2 0 0 0 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1a2.2 2.2 0 0 0 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
               </svg>
             </span>
             <span class="nav-link-title">
              العروض
            </span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('board.products.index') }}" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-armchair-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <path d="M5 10v-4a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v4"></path>
               <path d="M16 15v-2a3 3 0 1 1 3 3v3h-14v-3a3 3 0 1 1 3 -3v2"></path>
               <path d="M8 12h8"></path>
               <path d="M7 19v2"></path>
               <path d="M17 19v2"></path>
             </svg>
           </span>
           <span class="nav-link-title">
            المنتجات
          </span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('board.services.index') }}" >
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-apple-arcade" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
             <path d="M20 12.5v4.75a.734 .734 0 0 1 -.055 .325a.704 .704 0 0 1 -.348 .366l-5.462 2.58a5 5 0 0 1 -4.27 0l-5.462 -2.58a.705 .705 0 0 1 -.401 -.691l0 -4.75"></path>
             <path d="M4.431 12.216l5.634 -2.332a5.065 5.065 0 0 1 3.87 0l5.634 2.332a.692 .692 0 0 1 .028 1.269l-5.462 2.543a5.064 5.064 0 0 1 -4.27 0l-5.462 -2.543a.691 .691 0 0 1 .028 -1.27z"></path>
             <path d="M12 7l0 6"></path>
           </svg>
           
         </span>
         <span class="nav-link-title">
          الخدمات
        </span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ route('board.projects.index') }}" >
        <span class="nav-link-icon d-md-none d-lg-inline-block">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-bank" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
           <path d="M3 21l18 0"></path>
           <path d="M3 10l18 0"></path>
           <path d="M5 6l7 -3l7 3"></path>
           <path d="M4 10l0 11"></path>
           <path d="M20 10l0 11"></path>
           <path d="M8 14l0 3"></path>
           <path d="M12 14l0 3"></path>
           <path d="M16 14l0 3"></path>
         </svg>
       </span>
       <span class="nav-link-title">
        المشاريع
      </span>
    </a>
  </li>

  <li class="nav-item ">
    <a class="nav-link" href="{{ route('board.reviews.index') }}" >
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-hipchat" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M17.802 17.292s.077 -.055 .2 -.149c1.843 -1.425 3 -3.49 3 -5.789c0 -4.286 -4.03 -7.764 -9 -7.764c-4.97 0 -9 3.478 -9 7.764c0 4.288 4.03 7.646 9 7.646c.424 0 1.12 -.028 2.088 -.084c1.262 .82 3.104 1.493 4.716 1.493c.499 0 .734 -.41 .414 -.828c-.486 -.596 -1.156 -1.551 -1.416 -2.29z"></path>
          <path d="M7.5 13.5c2.5 2.5 6.5 2.5 9 0"></path>
        </svg>
      </span>
      <span class="nav-link-title">
        التقييمات
      </span>
    </a>
  </li>

  <li class="nav-item ">
    <a class="nav-link" href="{{ route('board.settings.edit') }}" >
      <span class="nav-link-icon d-md-none d-lg-inline-block">
       <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings-code" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
         <path d="M11.482 20.924a1.666 1.666 0 0 1 -1.157 -1.241a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.312 .318 1.644 1.794 .995 2.697"></path>
         <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
         <path d="M20 21l2 -2l-2 -2"></path>
         <path d="M17 17l-2 2l2 2"></path>
       </svg>
     </span>
     <span class="nav-link-title">
      الاعدادات
    </span>
  </a>
</li>

<li class="nav-item ">
  <a class="nav-link" href="{{ route('board.about.edit') }}" >
    <span class="nav-link-icon d-md-none d-lg-inline-block">
     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
       <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
       <path d="M12 9h.01"></path>
       <path d="M11 12h1v4h1"></path>
     </svg>
   </span>
   <span class="nav-link-title">
    من نحن
  </span>
</a>
</li>


<li class="nav-item ">
  <a class="nav-link" href="{{ route('board.terms.edit') }}" >
    <span class="nav-link-icon d-md-none d-lg-inline-block">
     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-stop" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
       <path d="M8 13v-7.5a1.5 1.5 0 0 1 3 0v6.5"></path>
       <path d="M11 5.5v-2a1.5 1.5 0 1 1 3 0v8.5"></path>
       <path d="M14 5.5a1.5 1.5 0 0 1 3 0v6.5"></path>
       <path d="M17 7.5a1.5 1.5 0 0 1 3 0v8.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47"></path>
     </svg>
   </span>
   <span class="nav-link-title">
    الشروط و الاحكام
  </span>
</a>
</li>

</ul>

</div>
</div>
</div>
</header>