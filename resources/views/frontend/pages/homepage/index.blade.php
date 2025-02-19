@extends('frontend.layouts.master')

@section('content')

    <!-- start: .content-wrapper -->
    <div class="content-wrapper">
        <!-- start: .intro-text -->
        @include('frontend.partials.intro-text')
        <!-- end: .intro-text -->

        <section class="epcl-carousel epcl-post-carousel medium-section np-bottom aos-animate" data-aos="fade"
            id="epcl-post-carousel">
            <div class="grid-container grid-large np-tablet np-mobile">
                <h2 class="title bordered medium textcenter"><svg class="icon large secondary-color">
                        <use xlink:href="/zento/front_assets/images/svg-icons.svg?v=1b89f44b98#trending-icon"></use>
                    </svg> Featured Articles</h2>

                <!-- start: .slick-slider -->
                @include('frontend.partials.slick-slider')
                <!-- end: .slick-slider -->

                <div class="clear"></div>
            </div>
        </section>
        <div class="sticky-container section np-bottom grid-container">

            <!-- start: #sidebar -->
            @include('frontend.partials.sidebar')
            <!-- end: #sidebar -->

            <div class="center left-content grid-70">

                <!-- start: .articles -->
                @include('frontend.partials.articles')
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

@endsection
