@extends('front.layouts.master')

@section('content')

<!--RESERVATION SECTION========================-->
<section class="reservation_section">
    <div class="container">
        <div class="textC">
            <h3 class="contact_text wow animate__animated animate__fadeInDownBig animate__delay-100ms  animate__fast">REZERVASİYA</h3>
        </div>
        <div class="row">
            <div class="res_left col-lg-6 col-md-12 wow animate__animated animate__fadeInLeft animate__delay-400ms  animate__fast">
                <form action="javascript:void(0)" id="reserve_form" method="post">
                <input type="text" placeholder="Ad, Soyad" name="name">
                <input type="text" placeholder="Nömrəniz" name="phone">
                <input type="text" placeholder="E-mail" name="email">
                <div class="card_number" id="card-container">
                    <input type="tel" class="input" name="card_number" id="card" placeholder="Kart nömrəsi">
                    <div id="logo"></div>
                </div>
                <input type="text" id="datepicker" name="date" placeholder="Tarix" autocomplete="off"> <br>
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
