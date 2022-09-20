<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
    @php
        $route_name = Route::currentRouteName();
    @endphp
</div>
<div class="site-navbar-wrap">
    <div class="site-navbar site-navbar-target js-sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <a href="{{ app()->getLocale() == 'hu' ? route('landing.hu') : route('landing.en') }}" class="col-1">
                    <img class="d-none d-lg-block" width="300px" src="{{ asset($logo) }}" alt="hit">

                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                            class="site-menu-toggle js-menu-toggle ">
                            <span class="icon-menu text-dark">
                            </span>
                        </a>
                    </div>
                </a>

                <div class="col-11">
                    <nav class="site-navigation text-right" role="navigation">
                        <div class="container">


                            <ul class="site-menu main-menu js-clone-nav d-none d-lg-block text-end">
                                <li class="@if ($route_name == 'landing.en' || $route_name == 'landing.hu') active @endif">
                                    <a href="{{ app()->getLocale() == 'hu' ? route('landing.hu') : route('landing.en') }}"
                                        class="nav-link">Home
                                    </a>
                                </li>
                                <li class="@if ($route_name == 'admissions.en' || $route_name == 'admissions.hu') active @endif">
                                    <a href="{{ app()->getLocale() == 'hu' ? route('admissions.hu') : route('admissions.en') }}"
                                        class="nav-link">{{ __('admissions') }}
                                    </a>
                                </li>

                                <li class="has-children pl-4">
                                    <a class="@if ($route_name == 'courses.en' ||
                                        $route_name == 'courses.hu' ||
                                        $route_name == 'course.en' ||
                                        $route_name == 'course.hu') active @endif"
                                        href="{{ app()->getLocale() == 'hu' ? route('courses.hu') : route('courses.en') }}"
                                        class="nav-link arrow-collapse">
                                        {{ __('courses') }}
                                    </a>
                                    <ul class="dropdown arrow-top text-right">
                                        @foreach ($courses as $course)
                                            <li>
                                                <a href="{{ $course->lang == 'hu' ? route('course.hu', $course->slug) : route('course.en', $course->slug) }}"
                                                    class="nav-link">{{ $course->title }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li class="@if ($route_name == 'about.en' || $route_name == 'about.hu') active @endif"><a
                                        href="{{ app()->getLocale() == 'hu' ? route('about.hu') : route('about.en') }}"
                                        class="nav-link"> {{ __('About us') }} </a>
                                </li>

                                <li class="@if ($route_name == 'why.en' || $route_name == 'why.hu') active @endif"><a
                                        href="{{ app()->getLocale() == 'hu' ? route('why.hu') : route('why.en') }}"
                                        class="nav-link"> {{ __('why hit') }} </a>
                                </li>

                                <li class="@if ($route_name == 'contact_us.en' || $route_name == 'contact_us.hu') active @endif"><a
                                        href="{{ app()->getLocale() == 'hu' ? route('contact_us.hu') : route('contact_us.en') }}"
                                        class="nav-link"> Contact </a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
