@extends('front.layouts.master')


@section('content')

<!--HOME SECTION========================-->
<!--HOME TEXT SECTION========================-->
<section class="home_bottom home_bottom-style-4 bg_image bg_image--12 about_page">
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

@endsection
