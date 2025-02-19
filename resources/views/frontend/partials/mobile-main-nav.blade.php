<nav class="mobile main-nav">
    <div class="close"><svg class="icon">
            <use xlink:href="/zento/assets/images/svg-icons.svg?v=1b89f44b98#close-icon"></use>
        </svg></div>
    <div class="logo"><a href="https://ghost.estudiopatagon.com/zento"><img src="{{ asset('front_assets') }}/images/logo-zento.svg" alt="Zento"
                width="170" height="60" decoding="async"></a></div>
    <ul class="menu underline-effect">
        <li class=" nav-home"><a href="https://ghost.estudiopatagon.com/zento/">Home</a></li>
        <li class=" nav-style-guide"><a href="https://ghost.estudiopatagon.com/zento/style-guide/">Style Guide ✨</a>
        </li>
        <li class=" nav-explore-our-tags"><a href="https://ghost.estudiopatagon.com/zento/explore-our-tags/">Explore
                our Tags</a></li>
        <li class=" nav-text-only-post"><a href="https://ghost.estudiopatagon.com/zento/text-only/">Text Only
                Post</a></li>
        <li class=" nav-classic-post-image"><a href="https://ghost.estudiopatagon.com/zento/classic/">Classic Post
                (image)</a></li>
        <li class=" nav-vertical-post"><a href="https://ghost.estudiopatagon.com/zento/vertical/">Vertical Post</a>
        </li>
        <li class=" nav-fullwidth-post"><a href="https://ghost.estudiopatagon.com/zento/fullwidth/">Fullwidth
                Post</a></li>
        <li class=" nav-no-sidebar-post"><a href="https://ghost.estudiopatagon.com/zento/nosidebar/">No Sidebar
                Post</a></li>
        <li class=" nav-home-demos"><a href="https://themes.estudiopatagon.com/selector/zento-ghost/">Home Demos
                🚀</a></li>
    </ul>


    <div class="account">
        @if (Route::has('login'))
            @auth
                <a
                    href="{{ route('dashboard.index') }}"
                    class="link-button"
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="link-button"
                >
                    Login
                </a>
            @endauth
        @endif

        <a href="https://ghost.estudiopatagon.com/zento/subscribe" class="epcl-button">
            Subscribe
        </a>
    </div>
</nav>
