<footer class=" footer pt-5">

    <section class="container pb-5">
        <div class="row d-flex tx-gray">
            <div class="col-md-3">
                <ul class="">
                    <li>
                        <img width="100%" src="{{ asset($logo_color) }}" alt="Hungary institute of innovation">
                    </li>
                    <li class=" pt-4">
                        {{ $address }}
                    </li>

                    <a class="" href="tel:{{ $phone_one }}">
                        <li class="pt-3 text-white"> {{ $phone_one }}</li>
                    </a>

                    <a class="pt-3" href="tel:{{ $phone_two }}">
                        <li class="pt-1 text-white"> {{ $phone_two }}</li>
                    </a>

                    <a class=" pt-3" href="mailto:{{ $email }}">

                        <li class="pt-1 text-white"> {{ $email }}</li>
                    </a>

                    <hr class="divider-green">
                </ul>

            </div>

            <div class="col-md-3">
                <ul class="">
                    <li class="text-white font-bold tx-size-18">
                        <p>Our Campus</p>
                    </li>
                    <hr class="divider-green">
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Acedemic</a>
                    </li>
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Planning & Administration</a>
                    </li>

                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Campus Safety</a>
                    </li>
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Office of the Chancellor</a>
                    </li>
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Facility Services</a>
                    </li>
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Human Resources</a>
                    </li>
                </ul>

            </div>
            <div class="col-md-3">
                <ul class="">
                    <li class="text-white font-bold tx-size-18">
                        <p>Academics</p>
                    </li>
                    <hr class="divider-green">
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Acedemic</a>
                    </li>
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Planning & Administration</a>
                    </li>
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Campus Safety</a>
                    </li>
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Office of the Chancellor</a>
                    </li>
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Facility Services</a>
                    </li>
                    <li class=" pt-1">
                        <a class="tx-gray" href="#">Human Resources</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="">
                    <li class="text-white font-bold tx-size-18">
                        <p>Contact Us</p>
                    </li>
                    <hr class="divider-green">
                    <li class=" pt-5 text-center ">
                        <a href="{{ $instagram }}"> <i
                                class=" text-white fa-brands fa-instagram pe-3 tx-size-28"></i></a>
                        <a href="{{ $telegram }}"> <i
                                class=" text-white fa-brands fa-telegram pe-3 tx-size-28"></i></a>
                        <a href="{{ $twitter }}"> <i
                                class=" text-white fa-brands fa-twitter pe-3 tx-size-28"></i></a>
                        <a href="{{ $youtube }}"> <i
                                class=" text-white fa-brands fa-youtube pe-3 tx-size-28"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</footer>
