@extends('frontend.layouts.master')

@section('content')

    <img loading="eager" fetchpriority="high" src="{{ asset('assets') }}/images/svg-icons.svg" alt="Social Icons" style="display:none;">

    <!-- start: .mobile.main-nav -->
    @include('frontend.layouts.pages.partials.mobile-main-nav')

    <!-- end: .mobile.main-nav -->
    <div class="menu-overlay"></div>

    <!-- start: #wrapper -->
    <div id="wrapper">

        <!-- start: #header -->
        <header id="header" class="minimalist enable-sticky" style="height: 115.3px;">

            <!-- start: .menu-wrapper -->
            @include('frontend.layouts.pages.partials.menu-wrapper')
            <!-- end: .menu-wrapper -->

            <div class="clear"></div>

        </header>
        <!-- end: #header -->

        <main id="home" class="main">

            <!-- start: .content-wrapper -->
            <div class="content-wrapper">

                <!-- start: .intro-text -->
                @include('frontend.layouts.pages.partials.intro-text')
                <!-- end: .intro-text -->

                <section class="epcl-carousel epcl-post-carousel medium-section np-bottom aos-animate" data-aos="fade"
                    id="epcl-post-carousel">
                    <div class="grid-container grid-large np-tablet np-mobile">
                        <h2 class="title bordered medium textcenter"><svg class="icon large secondary-color">
                                <use xlink:href="/zento/assets/images/svg-icons.svg?v=1b89f44b98#trending-icon"></use>
                            </svg> Featured Articles</h2>

                        <!-- start: .slick-slider -->
                        @include('frontend.layouts.pages.partials.slick-slider')
                        <!-- end: .slick-slider -->

                        <div class="clear"></div>
                    </div>
                </section>
                <div class="sticky-container section np-bottom grid-container">

                    <!-- start: #sidebar -->
                    @include('frontend.layouts.pages.partials.sidebar')
                    <!-- end: #sidebar -->

                    <div class="center left-content grid-70">

                        <!-- start: .articles -->
                        @include('frontend.layouts.pages.partials.articles')
                        <!-- end: .articles -->

                        <nav class="epcl-pagination section np-bottom">
                            <div class="nav">
                                <span class="page-number">Page 1 of 3</span>
                                <a class="next epcl-button"
                                    href="https://ghost.estudiopatagon.com/zento/cta-carousel/page/2/">Next</a>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
            <!-- end: .content-wrapper -->

        </main>

        <div class="clear"></div>

        <!-- start: .epcl-cta -->
        @include('frontend.layouts.pages.partials.cta')
        <!-- end: .epcl-cta -->

        <!-- start: #footer -->
        @include('frontend.layouts.pages.partials.footer')
        <!-- end: #footer -->

    </div>
    <!-- end: #wrapper -->

    {{-- Setting --}}
    @include('frontend.layouts.pages.partials.setting')

    <script defer="" src="{{ asset('assets') }}/js/scripts.min.js"></script>
    <script defer="" src="{{ asset('assets') }}/js/prism-core.min.js"></script>
    <script defer="" src="{{ asset('assets') }}/js/prism-autoloader.min.js"></script>
    <script defer="" src="{{ asset('assets') }}/js/prism-plugins.min.js"></script>

    <div id="ghost-portal-root"></div>
    <div id="sodo-search-root"></div>

@endsection
