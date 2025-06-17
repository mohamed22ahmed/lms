@php
    $userLanguages = !empty($generalSettings['site_language']) ? [$generalSettings['site_language'] => getLanguages($generalSettings['site_language'])] : [];

    if (!empty($generalSettings['user_languages']) and is_array($generalSettings['user_languages'])) {
        $userLanguages = getLanguages($generalSettings['user_languages']);
    }

    $localLanguage = [];

    foreach($userLanguages as $key => $userLanguage) {
        $localLanguage[localeToCountryCode($key)] = $userLanguage;
    }

@endphp
@extends(getTemplate().'.layouts.appnew')


<body class="ep-magic-cursor">

<!-- Start Preloader  -->
<div id="preloader">
    <div id="ep-preloader" class="ep-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
        </div>
    </div>
</div>
<!-- End Preloader -->

<!-- Start Back To Top  -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- End Back To Top -->
<!-- Mobile Menu Modal -->
<div class="modal mobile-menu-modal offcanvas-modal fade" id="offcanvas-modal">
    <div class="modal-dialog offcanvas-dialog">
        <div class="modal-content">
            <div class="modal-header offcanvas-header">
                <!-- offcanvas-logo-start -->
                <div class="offcanvas-logo">
                    <a href="index.html">
                        <img src="assets/Landing_1/assets/images/new/3C.png" alt="logo" />
                    </a>
                </div>
                <!-- offcanvas-logo-end -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fi fi-ss-cross"></i>
                </button>
            </div>
            <div class="mobile-menu-modal-main-body">
                <!-- offcanvas-menu start -->
                <nav id="offcanvas-menu" class="navigation offcanvas-menu">
                    <ul id="nav mobile-nav" class="list-none offcanvas-men-list">
                        <li>
                            <a class="" href="javascript:void(0)">Home</a>

                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>
<!-- End Mobile Menu Modal -->

<!-- Start Header Area -->
<header class="ep-header ep-header--style2 position-relative">
    <!-- Header Middle -->
    <div id="active-sticky" class="ep-header__middle ep-header__middle--style2">
{{--        @include('web.default.includes.top_nav')--}}
        <div class="container ">
            <div class="ep-header__inner ep-header__inner--style2">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-6">
                        <div class="ep-logo">
                            <a href="index.html">
                                <img src="assets/Landing_1/assets/images/new/3C.png" alt="logo" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-6">
                        <div class="ep-header__inner-right">
                            <nav class="ep-header__navigation">
                                <ul class="ep-header__menu ep-header__menu--style2">
                                    <li class="active">
                                        <a href="#">Home </a>

                                    </li>
                                    <li>
                                        <a href="#">About us</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>

                            <div class="ep-header__btn">
                                <a href="#" class="ep-btn ep5-bg">Read More <i class="fi fi-rs-arrow-small-right"></i> </a>
                            </div>
                        </div>
                        <!-- Mobile Menu Button -->
                        <button type="button" class="mobile-menu-offcanvas-toggler" data-bs-toggle="modal" data-bs-target="#offcanvas-modal">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </button>
                        <!-- End Mobile Menu Button -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Area -->

<div id="smooth-wrapper">
    <div id="smooth-content">
        <main>
            @if($heroSection == "1")
                @if(!empty($heroSectionData['is_video_background']))
                    <video playsinline autoplay muted loop id="homeHeroVideoBackground" class="img-cover">
                        <source src="{{ $heroSectionData['hero_background'] }}" type="video/mp4">
                    </video>
                @endif

                <div class="mask"></div>
            @endif
            <!-- Start Hero Area -->

            <section class="ep-hero section-bg-1">
                <div class="container ">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-6 col-12">
                            <div class="ep-hero__content">
                                <h1 class="ep-hero__title  left">
                                    {{ $heroSectionData['title'] }}
                                </h1>
                                <p class="ep-hero__text">
                                    {!! nl2br($heroSectionData['description']) !!}

                                </p>
                                <div class="ep-hero__btn">
                                    <a href="#" class="ep-btn">Explore Now <i class="fi fi-rs-arrow-small-right"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6 col-12 order-top">
                            <div class="BookFormBox">
                                <div class="MainTitle">
                                    <p>Start your kids ' learning journey today!</p>
                                </div>
                                <div class="FormBook">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Enter your WhatsApp phone number</label>
                                                    <input id="phone" type="tel" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option value="">Select grade/class</option>
                                                        <option value="Grade 1">Grade 1</option>
                                                        <option value="Grade 2">Grade 2</option>
                                                        <option value="Grade 3">Grade 3</option>
                                                        <option value="Grade 4">Grade 4</option>
                                                        <option value="Grade 5">Grade 5</option>
                                                        <option value="Grade 6">Grade 6</option>
                                                        <option value="Grade 7">Grade 7</option>
                                                        <option value="Grade 8">Grade 8</option>
                                                        <option value="Grade 9">Grade 9</option>
                                                        <option value="Grade 10">Grade 10</option>
                                                        <option value="Grade 11">Grade 11</option>
                                                        <option value="Grade 12">Grade 12</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="ep-btn">Try a free class</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="SecTitle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange mr-2 mt-1">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                    <p>🚀 Over 1,000 seats booked in the last 24 hours!</p>
                                </div>
                                <div class="Description">
                                    <p>By registering, you agree to our Terms of Service and Privacy Policy. You also confirm that you have
                                        parental/guardian consent. Important updates will be shared via WhatsApp.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Start Hero Area -->
            <!-- Start About Area -->
                @php
                    $aboutPage = App\Models\Page::where('link', '/about')->first()?? null;;
                    $currentLocale = app()->getLocale();
                @endphp

                @if($aboutPage)
                    <section class="ep-about ep-about--style2 ep-section section-gap position-relative">
                        <div class="container">
                            {!! $aboutPage->translate($currentLocale)->content !!}
                        </div>
                    </section>

                @endif
            <!-- End Start About Area -->


            <!-- Start Brand -->
                @php
                    $accreditationsPage = App\Models\Page::where('link', '/accreditations')->first();
                    $currentLocale = app()->getLocale();

                    // Set default values
                    $defaultContent = 'Our Accreditations|||School in the Middle East ISO 21001, STEM|||3C Online Coding School is the most accredited coding school...';

                    // Get content with null safety
                    $ckContent = $accreditationsPage && $accreditationsPage->translate($currentLocale)
                        ? ($accreditationsPage->translate($currentLocale)->content ?? $defaultContent)
                        : $defaultContent;

                    // Parse text sections
                    $sections = explode('|||', $ckContent);

                    // Ensure we have at least 3 sections
                    $sections = array_pad($sections, 5, '');
                @endphp

                <div class="ep-brand section-gap pt-0">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-xl-6 col-md-8 col-12">
                                <div class="ep-section-head text-center">
                                    <!-- Small Title (from CKEditor) -->
                                    <span class="ep-section-head__sm-title ep1-color">
                        {{ $sections[0] ?? 'Our Accreditations' }}
                    </span>

                                    <!-- Main Title (from CKEditor) -->
                                    <h3 class="ep-section-head__big-title left">
                                        {{ $sections[1] ?? 'The Most' }}      <span>{{ $sections[2] ?? 'Accreditation' }} </span> {{ $sections[3] ?? 'School in the Middle East ISO 21001, STEM' }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-10 col-md-8 col-12">
                                <div class="ep-section-head text-center">
                                    <!-- Description (from CKEditor) -->
                                    <p class="ep-section-head__text">
                                        {{ $sections[4] ?? '3C Online Coding School is the most accredited...' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Static Carousel (hardcoded) -->
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel ep-brand__slider">
                                    @foreach(range(1,5) as $index)
                                        <a href="#" class="ep-brand__logo ep-brand__logo--style2">
                                            <img src="{{ asset("assets/Landing_1/assets/images/brand/brand-2/{$index}.svg") }}" alt="brand-logo">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- End Start Brand -->



            <!-- Start Funfact Area -->
            <section class="ep-funfact ep-funfact--style2 section-gap position-relative">
                <div class="container ">
                    <div class="ep-funfact-shape updown-ani">
                        <img src="assets/Landing_1/assets/images/funfact/funfact-2/arrow.svg" alt="arrow-icon" />
                    </div>
                    <div class="row">
                        <!-- Single Funfact Card -->
                        <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                            <div class="ep-funfact__card ep-funfact__card--style2 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="ep-funfact__icon ep5-bg-light">
                                    <img src="assets/Landing_1/assets/images/funfact/funfact-2/1.svg" alt="funfact-icon" />
                                </div>
                                <div class="ep-funfact__info m-0">
                                    <h4><span class="counter">10</span>+</h4>
                                    <p>Years of Experience
                                        Led by top experts in coding
                                        .and artificial intelligence </p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Funfact Card -->
                        <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                            <div class="ep-funfact__card ep-funfact__card--style2 wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                                <div class="ep-funfact__icon ep1-bg-light">
                                    <img src="assets/Landing_1/assets/images/funfact/funfact-2/2.svg" alt="funfact-icon" />
                                </div>
                                <div class="ep-funfact__info m-0">
                                    <h4><span class="counter">99</span>k+</h4>
                                    <p>Happy Parents
                                        Trusted by families who’ve seen
                                        .real results with 3C</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Funfact Card -->
                        <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                            <div class="ep-funfact__card ep-funfact__card--style2 wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                                <div class="ep-funfact__icon ep7-bg-light">
                                    <img src="assets/Landing_1/assets/images/funfact/funfact-2/3.svg" alt="funfact-icon" />
                                </div>
                                <div class="ep-funfact__info m-0">
                                    <h4><span class="counter">1000</span>k+</h4>
                                    <p>Training Hours
                                        Delivering quality tech
                                        education at scale</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Funfact Card -->
                        <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                            <div class="ep-funfact__card ep-funfact__card--style2 wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                                <div class="ep-funfact__icon ep2-bg-light">
                                    <img src="assets/Landing_1/assets/images/funfact/funfact-2/4.svg" alt="funfact-icon" />
                                </div>
                                <div class="ep-funfact__info m-0">
                                    <h4><span class="counter">100</span>k+</h4>
                                    <p>Graduates
                                        Pioneers in children’s coding
                                        .education across the region</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Funfact Area -->

            <!-- Start Category Area -->
            <section class="ep-category section-gap">
                <div class="container ">
                    <div class="BoxxServices">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                                <div class="ep-section-head text-center">
                                    <h3 class="ep-section-head__big-title  left">
                                        +48 professional developers tech tools in one curriculum
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="Serviceitemsss">
                            <div class="ItemServ">
                                <img src="assets/Landing_1/assets/images/new/serv_1.svg">
                                <p>Mobile App Development</p>
                            </div>
                            <div class="ItemServ">
                                <img src="assets/Landing_1/assets/images/new/serv_2.svg">
                                <p>AI & Machine Learning</p>
                            </div>
                            <div class="ItemServ">
                                <img src="assets/Landing_1/assets/images/new/serv_3.svg">
                                <p>3D Coding (AR, VR)</p>
                            </div>
                            <div class="ItemServ">
                                <img src="assets/Landing_1/assets/images/new/serv_4.svg">
                                <p>Game Development</p>
                            </div>
                            <div class="ItemServ">
                                <img src="assets/Landing_1/assets/images/new/serv_5.svg">
                                <p>Python & Data Science</p>
                            </div>
                            <div class="ItemServ">
                                <img src="assets/Landing_1/assets/images/new/serv_6.svg">
                                <p>Minecraft & <br> Roblox</p>
                            </div>
                            <div class="ItemServ">
                                <img src="assets/Landing_1/assets/images/new/serv_7.svg">
                                <p>Web <br> Development</p>
                            </div>
                            <div class="ItemServ">
                                <img src="assets/Landing_1/assets/images/new/serv_8.svg">
                                <p>User interface (UI & UX)</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- End  Category Area -->


            <!-- Start Team Area -->
            <section class="ep-team section-gap position-relative">
                <div class="ep-team__pattern updown-ani">
                    <img
                        src="assets/Landing_1/assets/images/team/team-1/dot-pattern.svg"
                        alt="dot-pattern"
                    />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-8 col-md-10 col-12">
                            <div class="ep-section-head text-center">
                                <span class="ep-section-head__sm-title ep1-color">Our Students</span>
                                <h3 class="ep-section-head__big-title  left mb-2">
                                    Meet Our Future <span>Leaders</span> !
                                </h3>
                                <p>At 3C, your child will learn coding using the latest technologies, following real industry standards.
                                    They’ll get the chance to independently design and build their own projects, just like the pros!
                                    But it doesn’t stop at programming —
                                    our students also gain valuable skills in marketing, design, business management, HR, critical thinking, and much
                                    more.
                                    We don’t just teach code — we build future-ready creators</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="owl-carousel ep-student__slider">
                            <div class="col-lg-12">
                                <div
                                    class="ep-team__card wow fadeInUp"
                                    data-wow-delay=".3s"
                                    data-wow-duration="1s"
                                >
                                    <div class="ep-team__img">
                                        <img
                                            src="assets/Landing_1/assets/images/team/team-1/1.png"
                                            alt="team-img"
                                        />
                                        <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="ep-video__btn popup-video ep-hover-layer-2" >
                                            <i class="fi fi-sr-play"></i>
                                        </a>
                                    </div>
                                    <div class="ep-team__content">
                                        <div class="ep-team__author">

                                            <h5>Bessie Cooper</h5>

                                            <!-- <p>Mentor</p> -->
                                        </div>
                                        <div class="ep-team__social">
                              <span class="ep-team__social-btn">
                                <i class="fi-rr-share"></i>
                              </span>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Team -->
                            <div class="col-lg-12">
                                <div
                                    class="ep-team__card wow fadeInUp"
                                    data-wow-delay=".5s"
                                    data-wow-duration="1s"
                                >
                                    <div class="ep-team__img">
                                        <img
                                            src="assets/Landing_1/assets/images/team/team-1/2.png"
                                            alt="team-img"
                                        />
                                        <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="ep-video__btn popup-video ep-hover-layer-2" >
                                            <i class="fi fi-sr-play"></i>
                                        </a>
                                    </div>
                                    <div class="ep-team__content">
                                        <div class="ep-team__author">

                                            <h5>Arlene McCoy</h5>

                                            <!-- <p>Senior Mentor</p> -->
                                        </div>
                                        <div class="ep-team__social">
                              <span class="ep-team__social-btn">
                                <i class="fi-rr-share"></i>
                              </span>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Team -->
                            <div class="col-lg-12">
                                <div
                                    class="ep-team__card wow fadeInUp"
                                    data-wow-delay=".7s"
                                    data-wow-duration="1s"
                                >
                                    <div class="ep-team__img">
                                        <img
                                            src="assets/Landing_1/assets/images/team/team-1/3.png"
                                            alt="team-img"
                                        />
                                        <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="ep-video__btn popup-video ep-hover-layer-2" >
                                            <i class="fi fi-sr-play"></i>
                                        </a>
                                    </div>
                                    <div class="ep-team__content">
                                        <div class="ep-team__author">

                                            <h5>Brooklyn Simmons</h5>

                                            <!-- <p>Assistant Teacher</p> -->
                                        </div>
                                        <div class="ep-team__social">
                              <span class="ep-team__social-btn">
                                <i class="fi-rr-share"></i>
                              </span>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icofont-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Team -->

                    </div>
                </div>
            </section>
            <!-- End Team Area -->


            <!-- Start Team Area -->
            <section
                class="ep-team ep-team--style2 section-gap position-relative"
            >
                <div class="ep-team__pattern-style2">
                    <img
                        class="pattern-1 updown-ani"
                        src="assets/Landing_1/assets/images/team/team-2/pattern-1.svg"
                        alt="pattern-1"
                    />
                    <img
                        class="pattern-2 rotate-ani"
                        src="assets/Landing_1/assets/images/team/team-2/pattern-2.svg"
                        alt="pattern-2"
                    />
                    <img
                        class="pattern-3 updown-ani"
                        src="assets/Landing_1/assets/images/team/team-2/pattern-3.svg"
                        alt="pattern-3"
                    />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-8 col-md-10 col-12">
                            <div class="ep-section-head text-center">

                                <h3 class="ep-section-head__big-title  left mb-2">
                                    Unique Experience for <span>Every Parent</span>
                                </h3>
                                <p>We believe every family is unique, and so is our approach.
                                    At 3C, we tailor the journey to match your child’s needs, and we keep parents involved every step of
                                    the way.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="owl-carousel ep-student__slider">
                            <!-- Single Team -->
                            <div class="col-lg-12">
                                <div
                                    class="ep-team__card ep-team__card--style2 wow fadeInUp"
                                    data-wow-delay=".3s"
                                    data-wow-duration="1s"
                                >
                                    <div class="ep-team__img">
                                        <img
                                            src="assets/Landing_1/assets/images/team/team-2/1.png"
                                            alt="team-img"
                                        />
                                        <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="ep-video__btn popup-video ep-hover-layer-2" >
                                            <i class="fi fi-sr-play"></i>
                                        </a>
                                    </div>
                                    <div class="ep-team__content">
                                        <div class="ep-team__author">

                                            <h5>Jane Cooper</h5>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Single Team -->
                            <div class="col-lg-12">
                                <div
                                    class="ep-team__card ep-team__card--style2 wow fadeInUp"
                                    data-wow-delay=".5s"
                                    data-wow-duration="1s"
                                >
                                    <div class="ep-team__img">
                                        <img
                                            src="assets/Landing_1/assets/images/team/team-2/2.png"
                                            alt="team-img"
                                        />
                                        <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="ep-video__btn popup-video ep-hover-layer-2" >
                                            <i class="fi fi-sr-play"></i>
                                        </a>
                                    </div>
                                    <div class="ep-team__content">
                                        <div class="ep-team__author">

                                            <h5>Kane Saan</h5>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Single Team -->
                            <div class="col-lg-12">
                                <div
                                    class="ep-team__card ep-team__card--style2 wow fadeInUp"
                                    data-wow-delay=".7s"
                                    data-wow-duration="1s"
                                >
                                    <div class="ep-team__img">
                                        <img
                                            src="assets/Landing_1/assets/images/team/team-2/3.png"
                                            alt="team-img"
                                        />
                                        <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="ep-video__btn popup-video ep-hover-layer-2" >
                                            <i class="fi fi-sr-play"></i>
                                        </a>
                                    </div>
                                    <div class="ep-team__content">
                                        <div class="ep-team__author">

                                            <h5>Jack Win</h5>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <!-- End Team Area -->

            <!-- Start Pricing Area -->
            <section class="ep-pricing section-gap position-relative ">
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-6 col-md-8 col-12">
                            <div class="ep-section-head text-center">
                                <span class="ep-section-head__sm-title ep1-color">Pricing</span>
                                <h3 class="ep-section-head__big-title  left">
                                    Our <span>programs</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="ep-pricing__shape updown-ani">
                        <img src="assets/Landing_1/assets/images/pricing/arrow.svg" alt="pricing-shape" />
                    </div>

                    <div class="row">
                        <!-- Pricing Card -->
                        <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                            <div class="ep-pricing__card pricing-1 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="ep-pricing__head">
                                    <div class="ep-pricing__icon ep5-bg-light">
                                        <img src="assets/Landing_1/assets/images/pricing/icon-1.svg" alt="pricing-icon" />
                                    </div>
                                    <h3 class="ep-pricing__title">Annual - Plan <br>
                                        12-Month Plan </h3>
                                    <br>
                                    <div class="ep-pricing__price">
                                        <span class="ep-pricing__amount ep5-color">9000 (instead of 12.800)</span>
                                    </div>
                                </div>
                                <ul class="ep-pricing__features">
                                    <li><i class="fi fi-sr-checkbox"></i> live online session</li>
                                    <li><i class="fi fi-sr-checkbox"></i> assessment & quizzes</li>
                                    <li><i class="fi fi-sr-checkbox"></i> Compilation Certificate</li>
                                    <li><i class="fi fi-sr-checkbox"></i> Technical Guidance</li>
                                    <li><i class="fi fi-sr-checkbox"></i> Limited Group</li>
                                    <li><i class="fi fi-sr-checkbox"></i> 4 -Levels Completion</li>
                                    <li><i class="fi fi-sr-checkbox"></i> graduation projects</li>
                                    <li><i class="fi fi-sr-checkbox"></i> 6 Months Freeze Parent support Installment</li>
                                </ul>
                                <div class="ep-pricing__btn">
                                    <a href="#" class="ep-btn border-btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing Card -->
                        <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                            <div class="ep-pricing__card pricing-2 wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                                <div class="ep-pricing__head">
                                    <div class="ep-pricing__icon ep2-bg-light">
                                        <img src="assets/Landing_1/assets/images/pricing/icon-2.svg" alt="pricing-icon" />
                                    </div>
                                    <h3 class="ep-pricing__title">Semi-Annual<br>
                                        6-Month Plan </h3>
                                    <br>
                                    <div class="ep-pricing__price">
                                        <span class="ep-pricing__amount ep2-color">4950 (instead of 7950)</span>
                                    </div>
                                </div>
                                <ul class="ep-pricing__features">
                                    <li><i class="fi fi-sr-checkbox"></i> live online session </li>
                                    <li><i class="fi fi-sr-checkbox"></i> assessment & quizzes</li>
                                    <li><i class="fi fi-sr-checkbox"></i> Compilation Certificate</li>
                                    <li><i class="fi fi-sr-checkbox"></i> Technical Guidance</li>
                                    <li><i class="fi fi-sr-checkbox"></i> Limited Group</li>
                                    <li><i class="fi fi-sr-checkbox"></i> 2-Level Completion</li>
                                    <li><i class="fi fi-sr-checkbox"></i> graduation projects</li>
                                    <li><i class="fi fi-sr-checkbox"></i> 3 Month freeze Parent support</li>
                                </ul>
                                <div class="ep-pricing__btn">
                                    <a href="#" class="ep-btn border-btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing Card -->
                        <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                            <div class="ep-pricing__card pricing-3 wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                                <div class="ep-pricing__head">
                                    <div class="ep-pricing__icon ep1-bg-light">
                                        <img src="assets/Landing_1/assets/images/pricing/icon-3.svg" alt="pricing-icon" />
                                    </div>
                                    <h3 class="ep-pricing__title">Quarter- plan <br>
                                        3-Month Plan</h3>
                                    <br>
                                    <div class="ep-pricing__price">
                                                <span class="ep-pricing__amount ep1-color">2500(instead of 3500)
                                                </span>
                                    </div>
                                </div>
                                <ul class="ep-pricing__features">
                                    <li><i class="fi fi-sr-checkbox"></i>live online session</li>
                                    <li><i class="fi fi-sr-checkbox"></i>assessment & quizzes</li>
                                    <li><i class="fi fi-sr-checkbox"></i>Compilation Certificate</li>
                                    <li><i class="fi fi-sr-checkbox"></i>Technical Guidance</li>
                                    <li><i class="fi fi-sr-checkbox"></i>Limited Group</li>
                                    <li><i class="fi fi-sr-checkbox"></i>1 Level Completion</li>
                                    <li><i class="fi fi-sr-checkbox"></i>graduation projects</li>
                                    <li><i class="fi fi-sr-checkbox"></i>Parent support</li>
                                </ul>
                                <div class="ep-pricing__btn">
                                    <a href="#" class="ep-btn border-btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Pricing Area -->

            <section
                class="ep-hero ep-hero--style2 hero-bg background-image"
                style="background-image: url('assets/Landing_1/assets/images/hero/home-2/bg.png')"
            >
                <div class="container ep-container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-6 col-12">
                            <div class="ep-hero__content ep-hero__content--style2">
                                <h1 class="ep-hero__title  left">
                                    Give Your Child the Chance
                                </h1>
                                <p class="ep-hero__text"> For over 9 years, 3C has been the leading platform in the Middle East and Africa for teaching coding and .artificial intelligence </p>
                                <p>We combine coding, AI, and entrepreneurship to shape .the leaders of tomorrow </p>
                                <p>Our curriculum goes beyond just teaching code — it helps children adapt to change, develop a growth .mindset, and thrive in any environment</p>
                                <p>With certifications from ISO 21001 and STEM.org, we are the most trusted platform for future-focused .tech education, setting the standard for excellence</p>
                            </div>
                        </div>
                        <div class="col-lg-12 offset-xl-1 col-xl-5 col-12 order-top">
                            <div class="ep-hero__widget ep-hero__widget-style2 position-relative" >
                                <div class="ep-hero__img">
                                    <img
                                        src="assets/Landing_1/assets/images/hero/home-2/hero-img.png"
                                        alt="hero-img"
                                    />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Start Faq Area -->
            <section class="ep-faq ep-faq--style2 section-gap position-relative">
                <div class="ep-faq__pattern-3 updown-ani">
                    <img src="assets/Landing_1/assets/images/faq/faq-2/pattern.svg" alt="pattern" />
                </div>
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-6 col-md-8 col-12">
                            <div class="ep-section-head text-center">
                                <span class="ep-section-head__sm-title ep1-color">FAQ</span>
                                <h3 class="ep-section-head__big-title  left">
                                    Study Aids to <span>Questions</span> <br />
                                    Your Learning
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 align-items-center">
                        <div class="col-lg-5 col-12">
                            <div class="ep-faq__img">
                                <img src="assets/Landing_1/assets/images/faq/faq-2/faq-img.png" alt="faq-img" />
                            </div>
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="ep-faq__content">
                                <div class="ep-section-head">
                                    <h3 class="ep-section-head__big-title fs-28  left">
                                        Frequently Asked Questions and Answers <br />
                                        Find Solutions
                                    </h3>
                                </div>
                                <div class="ep-faq__accordion faq-inner accordion" id="accordionExample">
                                    <!-- Single Faq -->
                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <span>01</span>Why is it important for kids to learn coding from an early age?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: Learning to code at a young age builds essential skills like logical thinking, creativity, and
                                                    problem-solving, all through fun and age-appropriate methods.
                                                    Coding is not just a technical skill — it helps children develop focus, patience, and selfconfidence.
                                                    Kids who start early gain a stronger understanding of modern technology and are better
                                                    prepared to create, innovate, and thrive in a digital world.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Faq -->
                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <span>02</span>What is the best age to start learning coding?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: The ideal age to start is between 6 and 8 years old, when children's brains are highly
                                                    adaptable and ready to learn new skills.
                                                    Studies f rom MIT show that kids at this age can absorb coding concepts easily through visual
                                                    tools like Scratch, which is now used in thousands of schools worldwide.
                                                    At 3C, we make coding fun, simple, and exciting — tailored to every age group.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Faq -->
                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <span>03</span>How can a 6-year-old learn to code and understand programming?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: Young children learn best through observation and play. Tools like Scratch and Blockly
                                                    are designed specifically for kids, using visual blocks to introduce core programming
                                                    concepts.
                                                    At 3C, we start with fun challenges and gradually introduce real coding, helping kids build
                                                    confidence step by step.
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="heading_4">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                                <span>04</span>What’s the coding curriculum like at 3C?
                                            </button>
                                        </h2>
                                        <div id="collapse_4" class="accordion-collapse collapse" aria-labelledby="heading_4" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: We offer a complete learning path f rom ages 6 to 18, starting with interactive, playful
                                                    basics and progressing to professional-level skills.
                                                    Students work with modern tools like MIT Scratch, Python, and Unity, in a safe and
                                                    inspiring environment where every child can learn at their own pace.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="heading_5">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
                                                <span>05</span>What do kids actually learn at 3C?
                                            </button>
                                        </h2>
                                        <div id="collapse_5" class="accordion-collapse collapse" aria-labelledby="heading_5" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: Kids learn how to think logically, solve problems, and create real-world projects
                                                    like games and websites.
                                                    We also teach them critical thinking, creativity, and give them hands-on
                                                    experience with real tools like Python, JavaScript, and Scratch — setting the stage
                                                    for a strong digital future.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="heading_6">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_6" aria-expanded="false" aria-controls="collapse_6">
                                                <span>06</span>How do you teach a language like Python to young kids?
                                            </button>
                                        </h2>
                                        <div id="collapse_6" class="accordion-collapse collapse" aria-labelledby="heading_6" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: We start with interactive games and challenges, then introduce Python in a
                                                    simplified way through fun projects.
                                                    Our approach is based on global best practices like project-based learning, so
                                                    kids learn by building and creating.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="heading_7">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_7" aria-expanded="false" aria-controls="collapse_7">
                                                <span>07</span>Do kids need any special skills to learn coding?
                                            </button>
                                        </h2>
                                        <div id="collapse_7" class="accordion-collapse collapse" aria-labelledby="heading_7" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: Not at all! Coding doesn’t require any special talent — just curiosity and a
                                                    willingness to learn.
                                                    At 3C, our step-by-step, interactive methods make it easy for every child to learn
                                                    comfortably and confidently.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="heading_8">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_8" aria-expanded="false" aria-controls="collapse_8">
                                                <span>08</span>How can I choose the right program for my child?
                                            </button>
                                        </h2>
                                        <div id="collapse_8" class="accordion-collapse collapse" aria-labelledby="heading_8" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: Start with your child’s interests — Do they love games? Building? Exploring?
                                                    At 3C, we offer a quick assessment to help us recommend the best track based on
                                                    each child’s unique strengths and passions.
                                                    Our instructors guide them to the right learning path for a personalized, fun, and
                                                    effective journey.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="heading_9">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_9" aria-expanded="false" aria-controls="collapse_9">
                                                <span>09</span>Can I track my child’s progress?
                                            </button>
                                        </h2>
                                        <div id="collapse_9" class="accordion-collapse collapse" aria-labelledby="heading_9" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: Absolutely! We provide detailed progress reports and regular updates, so parents
                                                    can follow their child’s journey step by step.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ep-faq__accordion-item ep-faq__accordion-item--style2">
                                        <h2 class="accordion-header" id="heading_10">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_10" aria-expanded="false" aria-controls="collapse_10">
                                                <span>10</span>How do I enroll my child?
                                            </button>
                                        </h2>
                                        <div id="collapse_10" class="accordion-collapse collapse" aria-labelledby="heading_10" data-bs-parent="#accordionExample">
                                            <div class="ep-faq__accordion-body">
                                                <p class="ep-faq__accordion-text">
                                                    A: It’s quick and simple! Just fill out the online registration form, and our team will
                                                    contact you immediately to guide you through the next steps.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Faq Area -->


            <!-- Start Event Area -->
            <section class="ep-blog section-gap position-relative" style="display: none;">
                <div class="ep-blog__shape-1 rotate-ani">
                    <img
                        src="assets/Landing_1/assets/images/blog/blog-1/shape-1.svg"
                        alt="shape-1"
                    />
                </div>
                <div class="ep-blog__shape-2 updown-ani">
                    <img
                        src="assets/Landing_1/assets/images/blog/blog-1/shape-2.svg"
                        alt="shape-2"
                    />
                </div>
                <div class="container ep-container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-xl-6 col-md-8 col-12">
                            <div class="ep-section-head text-center">
                    <span class="ep-section-head__sm-title ep2-color"
                    >Our Plogs </span
                    >
                                <h3 class="ep-section-head__big-title  left">
                                    Read Our Latest <span>Plogs </span> <br />Posts Discover
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Single Event Card -->
                        <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                            <div
                                class="ep-blog__card wow fadeInUp"
                                data-wow-delay=".3s"
                                data-wow-duration="1s"
                            >
                                <a href="event-details.html" class="ep-blog__img">
                                    <img
                                        src="assets/Landing_1/assets/images/blog/blog-1/1.png"
                                        alt="blog-img"
                                    />
                                </a>
                                <div class="ep-blog__info">
                                    <div class="ep-blog__date">
                                        25 <br />
                                        Dec
                                    </div>
                                    <div class="ep-blog__location">
                                        <i class="fi fi-rs-marker"></i>
                                        <span>Mirpur Bangladesh</span>
                                    </div>
                                    <div class="ep-blog__content">
                                        <a href="event-details.html" class="ep-blog__title">
                                            <h5>Education foundation</h5>
                                        </a>
                                        <p class="ep-blog__text">
                                            Education is the key to stude Unlock your horizons
                                            education
                                        </p>
                                        <div class="ep-blog__btn">
                                            <a href="event-details.html"
                                            >Read More
                                                <i class="fi fi-rs-arrow-small-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Event Card -->
                        <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                            <div
                                class="ep-blog__card wow fadeInUp"
                                data-wow-delay=".5s"
                                data-wow-duration="1s"
                            >
                                <a href="event-details.html" class="ep-blog__img">
                                    <img
                                        src="assets/Landing_1/assets/images/blog/blog-1/2.png"
                                        alt="blog-img"
                                    />
                                </a>
                                <div class="ep-blog__info">
                                    <div class="ep-blog__date">
                                        25 <br />
                                        Dec
                                    </div>
                                    <div class="ep-blog__location">
                                        <i class="fi fi-rs-marker"></i>
                                        <span>Mirpur Bangladesh</span>
                                    </div>
                                    <div class="ep-blog__content">
                                        <a href="event-details.html" class="ep-blog__title">
                                            <h5>Introduction to Psychology</h5>
                                        </a>
                                        <p class="ep-blog__text">
                                            Education is the key to stude Unlock your horizons
                                            education
                                        </p>
                                        <div class="ep-blog__btn">
                                            <a href="event-details.html"
                                            >Read More
                                                <i class="fi fi-rs-arrow-small-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Event Card -->
                        <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                            <div
                                class="ep-blog__card wow fadeInUp"
                                data-wow-delay=".7s"
                                data-wow-duration="1s"
                            >
                                <a href="event-details.html" class="ep-blog__img">
                                    <img
                                        src="assets/Landing_1/assets/images/blog/blog-1/3.png"
                                        alt="blog-img"
                                    />
                                </a>
                                <div class="ep-blog__info">
                                    <div class="ep-blog__date">
                                        25 <br />
                                        Dec
                                    </div>
                                    <div class="ep-blog__location">
                                        <i class="fi fi-rs-marker"></i>
                                        <span>Mirpur Bangladesh</span>
                                    </div>
                                    <div class="ep-blog__content">
                                        <a href="event-details.html" class="ep-blog__title">
                                            <h5>Principles of Economics</h5>
                                        </a>
                                        <p class="ep-blog__text">
                                            Education is the key to stude Unlock your horizons
                                            education
                                        </p>
                                        <div class="ep-blog__btn">
                                            <a href="event-details.html"
                                            >Read More
                                                <i class="fi fi-rs-arrow-small-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Event Area -->



        </main>
        <!-- Start Footer Area -->
        <footer class="ep-footer position-relative">
            <div class="container ">
                <div class="ep-footer__top">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="ep-footer__widget footer-about">
                                <div class="ep-footer__logo">
                                    <a href="index.html">
                                        <img src="assets/Landing_1/assets/images/new/3C.png" alt="footer-logo" />
                                    </a>
                                </div>
                                <p class="ep-footer__text">
                                    It is a long established fact that a reader will be distracted
                                </p>
                                <div class="ep-footer__contact">
                                    <div class="ep-footer__contact-single">
                                        <div class="ep-footer__contact-icon">
                                            <i class="fi fi-rs-marker"></i>
                                        </div>
                                        <div class="ep-footer__contact-info">
                                            <p>Address</p>
                                            <span>Egypt,oMAN, Saudi Arabia,EMIRATES</span>
                                        </div>
                                    </div>
                                    <div class="ep-footer__contact-single">
                                        <div class="ep-footer__contact-icon">
                                            <i class="fi fi-rr-phone-call"></i>
                                        </div>
                                        <div class="ep-footer__contact-info">
                                            <p>Phone Number</p>
                                            <a href="tel:+123-456-7890">+123-456-7890</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="ep-footer__widget footer-links">
                                <h4 class="ep-footer__widget-title">About Company</h4>
                                <ul class="ep-footer__links-list">
                                    <li>
                                        <a href="#">Service</a>
                                    </li>
                                    <li>
                                        <a href="#">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="#">Testimonial</a>
                                    </li>
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Portfolio</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="ep-footer__widget footer-services">
                                <h4 class="ep-footer__widget-title">Services</h4>
                                <ul class="ep-footer__links-list">
                                    <li>
                                        <a href="#"> <i class="fi fi-br-angle-double-small-right"></i>Reliable Rentals </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-br-angle-double-small-right"></i>Golden Key Properties </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-br-angle-double-small-right"></i>Swift Home Sales </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-br-angle-double-small-right"></i>Elite Realty Services </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fi fi-br-angle-double-small-right"></i>Dream Property Solutions </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="ep-footer__widget footer-newsletter">
                                <h4 class="ep-footer__widget-title">Latest Blog</h4>

                                <div class="latestBlog">
                                    <div class="Blogitm">
                                        <div class="BlogImage">
                                            <img src="assets/Landing_1/assets/images/blog/blog-1/1.png">
                                        </div>
                                        <div class="BlogData">
                                            <p class="ep-blog__location">
                                                <i class="fi fi-rs-marker"></i>
                                                <span>Mirpur Bangladesh</span>
                                            </p>
                                            <h2>Introduction to Psychology</h2>
                                        </div>
                                    </div>
                                    <div class="Blogitm">
                                        <div class="BlogImage">
                                            <img src="assets/Landing_1/assets/images/blog/blog-1/2.png">
                                        </div>
                                        <div class="BlogData">
                                            <p class="ep-blog__location">
                                                <i class="fi fi-rs-marker"></i>
                                                <span>Mirpur Bangladesh</span>
                                            </p>
                                            <h2>Introduction to Psychology</h2>
                                        </div>
                                    </div>
                                    <div class="Blogitm">
                                        <div class="BlogImage">
                                            <img src="assets/Landing_1/assets/images/blog/blog-1/3.png">
                                        </div>
                                        <div class="BlogData">
                                            <p class="ep-blog__location">
                                                <i class="fi fi-rs-marker"></i>
                                                <span>Mirpur Bangladesh</span>
                                            </p>
                                            <h2>Introduction to Psychology</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12" style="display: none;">
                            <div class="ep-footer__widget footer-newsletter">
                                <h4 class="ep-footer__widget-title">Newsletter</h4>
                                <form action="#" method="post" class="ep-footer__newsletter">
                                    <input type="email" name="email" placeholder="Your e-mail" required />
                                    <button type="submit">
                                        <i class="fi fi-ss-paper-plane"></i>
                                    </button>
                                </form>
                                <div class="ep-footer__social">
                                    <h5 class="ep-footer__social-title">Follow Us</h5>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="icofont-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icofont-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icofont-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icofont-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ep-footer__bottom">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="ep-footer__copyright">
                                <p>
                                    ©

                                    2024 | All Rights Reserved
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="ep-footer__bottom-link">
                                <ul>
                                    <li>
                                        <a href="#">Terms & Condition</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ep-footer__pattern">
                <img src="assets/Landing_1/assets/images/footer/footer-pattern.png" alt="footer-pattern" />
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
</div>

<!-- Jquery JS -->

</body>

