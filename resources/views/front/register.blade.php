@extends('front.layouts.master')

@section('content')

<!--REGISTER SECTION========================-->
<section class="register register-style-4 bg_image bg_image--12">
    <div class="container-fluid">
        <div class="row">
            <h3 >Qeydiyyat</h3>
            <div class="res_left col-md-12">
                <form id="register_form" class="form_report" action="javascript:void(0)" method="POST">
                    <input type="text" placeholder="Ad, Soyad" name="name">
                    <input type="text" placeholder="Nömrəniz" name="phone">
                    <div class="inputBox">
                        <input type="text" class="indicator" id="email" name="email" onkeyup="validate();" placeholder="E-mail">
                    </div>
                    <span class="indicator"></span>
                    <select name="card_id">
                        <option value="">Kart növü</option>
                        @foreach ($cards as $c)
                        @if (app()->getLocale() == 'az')
                        <option value="{{$c->id}}">{{$c->name_az}}</option>
                        @elseif (app()->getLocale() == 'ru')
                        <option value="{{$c->id}}">{{$c->name_ru}}</option>
                        @elseif (app()->getLocale() == 'en')
                        <option value="{{$c->id}}">{{$c->name_en}}</option>
                        @endif
                        @endforeach
                    </select><br>
                    <span class="alert alert-danger error-text alert_validation" style="display: none"></span>
            </div>
        </div>
        <div class="res_btn col-md-4">
            <button type="submit" class="submit_register"><a >GÖNDƏR</a></button>
        </div>
    </form>
    </div>
</section>
<!--REGISTER SECTION========================-->

@endsection
