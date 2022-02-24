@extends('front.layouts.master')

@section('content')

<!--RESERVATION SECTION========================-->
<section class="reservation_section">
    <div class="container">
        <div class="textC">
            <h3 class="contact_text wow animate__animated animate__fadeInDownBig animate__delay-100ms  animate__fast">{{ __('nav.reservation2') }}</h3>
        </div>
        <div class="row">
            <div class="res_left col-lg-6 col-md-12 wow animate__animated animate__fadeInLeft animate__delay-400ms  animate__fast">
                <form action="javascript:void(0)" id="reserve_form" method="post">
                <input type="text" placeholder="{{ __('home.name') }}, {{ __('home.surname') }}" name="name">
                <input type="text" placeholder="{{ __('home.phone') }}" name="phone">
                <input type="text" placeholder="{{ __('home.email') }}" name="email">

                <div class="card_number" id="card-container">
                    <input type="tel" class="input" name="card_number" id="card" placeholder="{{ __('validation.attributes.card_number') }}">
                    <div id="logo"></div>
                </div>
                <select name="card_id" id="card_id_reservation">
                    <option value="">{{ __('validation.attributes.card_id') }}</option>
                    @foreach ($cards as $c)
                    @if (app()->getLocale() == 'az')
                    <option value="{{ $c->id }}">{{ $c->name_az }}</option>
                    @elseif (app()->getLocale() == 'ru')
                    <option value="{{ $c->id }}">{{ $c->name_ru }}</option>
                    @elseif (app()->getLocale() == 'en')
                    <option value="{{ $c->id }}">{{ $c->name_en }}</option>
                    @endif
                    @endforeach
                </select>
                <input type="text" id="datepicker" name="date" placeholder="{{ __('home.date') }}" autocomplete="off"> <br>

                <span class="alert alert-danger error-text alert_validation" style="display: none"></span>
            </div>

            <div class="res_right col-lg-6 col-md-12 wow animate__animated animate__fadeInRight animate__delay-40ms  animate__fast" style="display: none">
                <div id="calendar"></div>
            </div>

            </div>
            <div class="res_btn">
                <button class="wow animate__animated animate__fadeInUp animate__slow submit_reserve" type="submit"><a>GÖNDƏR</a></button>
            </form>
        </div>

    </div>
</section>
<!--RESERVATION SECTION========================-->

@endsection
