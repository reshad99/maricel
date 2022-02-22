@extends('front.layouts.master')

@section('content')


<!--HEADER SECTION========================-->
<!--HOME SECTION========================-->
<section class="home home-style-4 bg_image bg_image--12 fix">
    <div class="container-fluid">
        <div class="row" >
            <div class="home_button">
                <button class="wow animate__animated animate__bounceInDown  animate__fast animate__delay-1s	" type="submit"><a href="/reservation">REZERVASİYA</a></button>

                <ul class="wow animate__animated animate__fadeInUp  animate__fast animate__delay-1s	">
                    <li>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</section>
<!--HOME SECTION========================-->
<!--HOME TEXT SECTION========================-->
<section class="home_bottom home_bottom-style-4 bg_image bg_image--12 fix">
    <div class="container-fluid">
        <div class="row" >
            <div class="bottom_content">
                @if (app()->getLocale() == 'az')
                <h1 class="wow animate__animated animate__fadeInLeft  animate__slow">{{$about->name_az}}</h1>
                <h2 class="wow animate__animated animate__fadeInLeft  animate__slower">{{$about->name_2_az}}</h2>
                <p class="wow animate__animated animate__fadeInUp  animate__slow">{!!$about->text_az!!}</p>
                @elseif (app()->getLocale() == 'en')
                <h1 class="wow animate__animated animate__fadeInLeft  animate__slow">{{$about->name_en}}</h1>
                <h2 class="wow animate__animated animate__fadeInLeft  animate__slower">{{$about->name_2_en}}</h2>
                <p class="wow animate__animated animate__fadeInUp  animate__slow">{!!$about->text_en!!}</p>
                @elseif (app()->getLocale() == 'ru')
                <h1 class="wow animate__animated animate__fadeInLeft  animate__slow">{{$about->name_ru}}</h1>
                <h2 class="wow animate__animated animate__fadeInLeft  animate__slower">{{$about->name_2_ru}}</h2>
                <p class="wow animate__animated animate__fadeInUp  animate__slow">{!!$about->text_ru!!}</p>
                @endif

            </div>

        </div>
    </div>
</section>
<!--HOME TEXT SECTION========================-->

<!--FOOTER SECTION========================-->

@endsection
