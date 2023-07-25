<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- normalize ملف -->
    <link rel="stylesheet" href="{{ asset('main-assets/css/normalize.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- bootstrap-->
    <link rel="stylesheet" href="{{ asset('main-assets/css/bootstrap.min.css') }}">
    <!-- مكتبة الفونت أوسم-->
    <link rel="stylesheet" href="{{ asset('main-assets/css/all.min.css') }}">
    <!-- رابط الخط-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('css')
    @include('users.components.css')
        <!-- css ملف-->
    <link rel="stylesheet" href="{{ asset('main-assets/css/style.css') }}">
    <title>Al Amal Project</title>
</head>

<body>
    <section class="loading">
        <div class="lds-default">
            <div></div>
        </div>
    </section>
    <span class="up"><i class="fa-solid fa-angle-up"></i></span>
    <!-- بداية الناف بار-->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <div class="logo">
                <a href="index.html"><img class="w-100" src="{{ asset('main-assets/image/logo.png') }}"
                        alt="صورة الشعار"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="main">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 {{ in_array(Route::currentRouteName(), ['home']) ? 'active' : '' }}"
                            href="{{ route('home') }}"> الصفحة الرئيسية </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 {{ in_array(Route::currentRouteName(), ['about']) ? 'active' : '' }}"
                            href="{{ route('about') }}"> نبذة عن المرض</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 {{ in_array(Route::currentRouteName(), ['symptoms']) ? 'active' : '' }}"
                            href="{{ route('symptoms') }}"> الأعراض </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 {{ in_array(Route::currentRouteName(), ['nutrition']) ? 'active' : '' }}"
                            href="{{ route('nutrition') }}"> التغذية </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 {{ in_array(Route::currentRouteName(), ['awareness']) ? 'active' : '' }}"
                            href="{{ route('awareness') }}"> قسم التوعية </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3 {{ in_array(Route::currentRouteName(), ['contact']) ? 'active' : '' }}"
                            href="{{ route('contact') }}"> تواصل معنا </a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <!-- نهاية الناف بار-->
    <!--  landing بداية -->
    @yield('content')
    <!--  نهاية قصتي مع السرطان  -->
</body>
</div>
<footer>
    <p> فريق الامل<span class="fw-bold">Created By</span></p>
    <p class="mb-0"> الجامعة الإسلامية <span class="fw-bold">&copy2023</span></p>
</footer>

<script src="{{ asset('main-assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('main-assets/js/jquery.js') }}"></script>
<script src="{{ asset('main-assets/js/‏‏jquery_c.js') }}"></script>
<script src="{{ asset('main-assets/js/JS.js') }}"></script>
<script src="{{ asset('dashboard-assets/js/axios.js') }}"></script>
<script src="{{ asset('dashboard-assets/js/crud.js') }}"></script>
@include('users.js.index')
@include('users.components.js')

@yield('js')
<script>
    AOS.init();
</script>

</html>
