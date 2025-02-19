<!DOCTYPE html>
<!-- saved from url=(0162)https://preview.themeforest.net/item/zento-modern-lightweight-blog-for-ghost/full_screen_preview/50836414?_ga=2.25509178.661903386.1739842180-788667546.1697592415 -->
<html lang="en" class="no-js">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="turbo-visit-control" content="reload">
    <meta name="description"
        content="&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;IMPORTANT: this template is for Ghost CMS not Wordpress. We don’t offer re...">
    <meta name="robots" content="noindex, nofollow">
    <meta name="referrer" content="no-referrer-when-downgrade">

    <title>Zento (Page 1)</title>

    <link rel="shortcut icon" href="https://ghost.estudiopatagon.com/zento/favicon.ico">
    <link rel="canonical" href="https://ghost.estudiopatagon.com/zento/cta-carousel/">
    <link rel="next" href="https://ghost.estudiopatagon.com/zento/cta-carousel/page/2/">
    <link rel="alternate" type="application/rss+xml" title="Zento" href="https://ghost.estudiopatagon.com/zento/rss/">
    <link rel="dns-prefetch" href="https://s3.envato.com/">
    <link rel="webmention" href="https://ghost.estudiopatagon.com/zento/webmentions/receive/">

    <meta property="og:site_name" content="Zento">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Zento (Page 1)">
    <meta property="og:url" content="https://ghost.estudiopatagon.com/zento/cta-carousel/">
    <meta property="article:publisher" content="https://www.facebook.com/envato">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Zento (Page 1)">
    <meta name="twitter:url" content="https://ghost.estudiopatagon.com/zento/cta-carousel/">
    <meta name="twitter:site" content="@envato">
    <meta name="generator" content="Ghost 5.75">

    <link rel="stylesheet" type="text/css" href="{{ asset('front_assets') }}/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front_assets') }}/css/plugins.min.css" as="style"
        onload="this.rel='stylesheet';">
    <link rel="stylesheet" type="text/css" href="{{ asset('front_assets') }}/css/cards.min.css">
    <link rel="stylesheet"
        href="{{ asset('front_assets') }}/index-a9b4110996ce191cf79c3c3d4591a5bb3ada6179f9cdd9de9e89ba0bd13823e0.css"
        media="all">
    <link rel="stylesheet"
        href="{{ asset('front_assets') }}/index-457550c0311c719db250e79989e7462091be593549fb6bcb3801c9182189d1e5.css"
        media="all">

    <script>
        var site_url = 'https://ghost.estudiopatagon.com/zento';
        var theme_config = {
            masonry: 'on',
            sticky_sidebar: 'on',
            disqus_shortname: 'ghostexample'
        };
    </script>

    <script async src="{{ asset('front_assets') }}/analytics.js"></script>
    <script defer src="{{ asset('front_assets') }}/js/portal.min.js" data-i18n="false"
        data-ghost="https://ghost.estudiopatagon.com/zento/" data-key="3418b12091e67d20ee9d637bf3"
        data-api="https://ghost.estudiopatagon.com/zento/ghost/api/content/" crossorigin="anonymous"></script>
    <script defer src="{{ asset('front_assets') }}/js/sodo-search.min.js" data-key="3418b12091e67d20ee9d637bf3"
        data-styles="https://cdn.jsdelivr.net/ghost/sodo-search@~1.1/umd/main.css"
        data-sodo-search="https://ghost.estudiopatagon.com/zento/" crossorigin="anonymous"></script>
    <script defer src="{{ asset('front_assets') }}/js/cards.min.js"></script>
    <script defer src="{{ asset('front_assets') }}/js/comment-counts.min.js"
        data-ghost-comments-counts-api="https://ghost.estudiopatagon.com/zento/members/api/comments/counts/"></script>
    <script defer src="{{ asset('front_assets') }}/js/member-attribution.min.js"></script>
    <script src="{{ asset('front_assets') }}/'js/index-70.js'"></script>

    <script>
        var calcHeight = function() {
            var headerDimensions = document.querySelector('.preview__header').offsetHeight;
            document.querySelector('.full-screen-preview__frame').style.height = (window.innerHeight -
                headerDimensions) + 'px';
        }
        document.addEventListener('DOMContentLoaded', calcHeight);
        window.addEventListener('resize', calcHeight);
    </script>
</head>


<body class="full-screen-preview">

    <img loading="eager" fetchpriority="high" src="{{ asset('front_assets') }}/images/svg-icons.svg" alt="Social Icons"
        style="display:none;">

    <!-- start: .mobile.main-nav -->
    @include('frontend.partials.mobile-main-nav')

    <!-- end: .mobile.main-nav -->
    <div class="menu-overlay"></div>

    <!-- start: #wrapper -->
    <div id="wrapper">

        <!-- start: #header -->
        <header id="header" class="minimalist enable-sticky" style="height: 115.3px;">

            <!-- start: .menu-wrapper -->
            @include('frontend.partials.menu-wrapper')
            <!-- end: .menu-wrapper -->

            <div class="clear"></div>

        </header>
        <!-- end: #header -->

        {{-- start: Content --}}
        <main id="home" class="main">

            @yield('content')

        </main>
        {{-- end: Content --}}

        <div class="clear"></div>

        <!-- start: .epcl-cta -->
        @include('frontend.partials.cta')
        <!-- end: .epcl-cta -->

        <!-- start: #footer -->
        @include('frontend.partials.footer')
        <!-- end: #footer -->

    </div>
    <!-- end: #wrapper -->

    {{-- Setting --}}
    @include('frontend.partials.setting')

    <script defer="" src="{{ asset('front_assets') }}/js/scripts.min.js"></script>
    <script defer="" src="{{ asset('front_assets') }}/js/prism-core.min.js"></script>
    <script defer="" src="{{ asset('front_assets') }}/js/prism-autoloader.min.js"></script>
    <script defer="" src="{{ asset('front_assets') }}/js/prism-plugins.min.js"></script>

    <div id="ghost-portal-root"></div>
    <div id="sodo-search-root"></div>
    <script src="{{ asset('front_assets') }}/uc.js" data-cbid="d10f7659-aa82-4007-9cf1-54a9496002bf"
        data-georegions="{&quot;region&quot;:&quot;US&quot;,&quot;cbid&quot;:&quot;d9683f70-895f-4427-97dc-f1087cddf9d8&quot;}"
        async="async" id="Cookiebot" nonce="t/dnQgN7OHZ0lwFEYUZQfg=="></script>


</body>

</html>
