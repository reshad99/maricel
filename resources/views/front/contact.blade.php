@extends('front.layouts.master')

@section('content')

<!--CONTACT SECTION========================-->
<section class="contact contact-style-4 bg_image bg_image--12">
    <div class="container-fluid">
        <div class="row">
            <h3 class="contact_text">ƏLAQƏ</h3>
            <div class="contact_center col-md-12">
                @if (app()->getLocale() == 'az')
                <h3 class="loc">{{$contact->address_az}}</h3>
                @elseif (app()->getLocale() == 'en')
                <h3 class="loc">{{$contact->address_en}}</h3>
                @elseif (app()->getLocale() == 'ru')
                <h3 class="loc">{{$contact->address_ru}}</h3>            
                @endif
                <h3 class="num" ><a href="tel:+994512016702">{{$contact->phone1}}</a></h3>
                <h3 class="mail"><a href="mailto:info@maricel.az">{{$contact->email}}</a></h3>
            </div>
            <div class="map col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3124.5092590793884!2d48.87645561560693!3d38.452802780631906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40223fba9a2c9b3f%3A0xce02ee574090bff5!2sMaricel%20Astara%20Resort!5e0!3m2!1str!2s!4v1644313113530!5m2!1str!2s"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        
    </div>
</section>
<!--CONTACT SECTION========================-->
@endsection
