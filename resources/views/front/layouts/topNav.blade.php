<section class=" bg-blue  ">
    <div class="d-md-flex container justify-content-between p-3 tx-gray top-nav">

        <div class=" flex  py-1">
            <span>
                <i class="fa fa-envelope-open"></i>
                <a class="tx-gray ps-2" href="mailto:{{ $email }}"> {{ $email }}</a>
            </span>
            <span class="ps-5">
                <span>
                    <i class="fa fa-phone"></i>
                    <a class="tx-gray ps-1" href="tel:{{ $phone_one }}">{{ $phone_one }}</a>
                </span>
            </span>
        </div>

        <div class="py-1">
            @auth
                <span class="ps-1">
                    <a class="tx-gray" href="{{ route('admin.index') }}">admin panel</a>
                </span>
            @endauth
            <span class="ps-2">


                @php
                    $route_name = Route::currentRouteName();
                @endphp
                <form @if ($route_name == 'course.en' || $route_name == 'course.hu') class=  "d-none" @else
                class="d-inline" @endif
                    action="{{ route('changeLang') }}" method="POST">
                    @csrf
                    <input type="hidden" name="lang" value="en">
                    <button class="border-0 p-0 btn-flag" type="submit">
                        <img class="flag" width="50px" src="{{ asset('front/images/united-kingdom.png') }}"
                            alt="english" />
                    </button>

                </form>
                {{-- <a class="tx-gray" href="{{ route('landing.en') }}"><img class="flag" width="50px"
                        src="{{ asset('front/images/united-kingdom.png') }}" alt="english" />
                </a> --}}
            </span>
            <span class="ps-2">

                <form @if ($route_name == 'course.en' || $route_name == 'course.hu') class=  "d-none" @else
                class="d-inline" @endif
                    action="{{ route('changeLang') }}" method="POST">
                    @csrf
                    <input type="text" class="d-none" name="lang" value="hu">
                    <button class="border-0 p-0 btn-flag" type="submit"><img class="flag" width="50px"
                            src="{{ asset('front/images/hungary_flag.png') }}" alt="hungary" /></button>

                </form>
                {{-- <a class="tx-gray" href="{{ route('landing.hu') }}"><img class="flag " width="50px"
                        src="{{ asset('front/images/hungary_flag.png') }}" alt="hungary" />
                </a> --}}
            </span>
            {{-- <span class=" bg-green p-4 d-none d-xl-block">
            <a class="text-white font-bold" href="#">Suport hit</a>
        </span> --}}
        </div>
    </div>

</section>
