<div class="menu-wrapper">

    <div class="grid-container">
        <div class="epcl-flex grid-wrapper">

            <!-- start: .main-nav -->
            <nav class="main-nav">
                <ul class="menu">
                    <li class="search-menu-item"><span class="link" data-ghost-search=""><svg
                                class="icon main-color large">
                                <use
                                    xlink:href="/zento/assets/images/svg-icons.svg?v=1b89f44b98#search-icon">
                                </use>
                            </svg> <span class="hide-on-mobile">Quick Search...</span></span></li>
                </ul>
            </nav>
            <!-- end: .main-nav -->

            <div class="logo"><a href="https://ghost.estudiopatagon.com/zento"><img src="{{ asset('front_assets') }}/images/logo-zento.svg"
                        alt="Zento" width="170" height="60" decoding="async"></a></div>

            <div class="account underline-effect hide-on-mobile hide-on-tablet hide-on-desktop-sm">
                    @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ route('dashboard.index') }}"
                            class="link-button epcl-login"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="link-button epcl-login"
                        >
                            Login
                        </a>
                    @endauth
                @endif
                <a href="https://ghost.estudiopatagon.com/zento/subscribe" class="epcl-button">Subscribe</a>
            </div>

            <div class="open-menu">
                <svg class="open icon ularge">
                    <use xlink:href="/zento/assets/images/svg-icons.svg?v=1b89f44b98#menu-icon"></use>
                </svg>
            </div>

            <div class="clear"></div>

        </div>

        <div class="clear"></div>
    </div>

</div>
