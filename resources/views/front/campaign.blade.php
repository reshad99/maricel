@extends('front.layouts.master')

@section('content')
<!--HOME SECTION========================-->
<!--HOME TEXT SECTION========================-->
<section class="company fix company-style-4 bg_image bg_image--12">
    <div class="container">
        <div class="row">
            <h3 class="contact_text wow animate__animated animate__fadeInDown" data-wow-delay="1s">KAMPANİYA</h3>
            <p class="wow animate__animated animate__fadeInUp" data-wow-delay="1s">Maricel Astara Residence yaşayış kompleksi Astarada tam şəhərin mərkəzində,
                göz oxşayan Astara bulvarının həmən yanında , tam dənizin kənarında yerləşir. Maricel Astara Residence - 7 mərtəbə - 70 mənzildən ibarət binamızda hovuz,
                dəniz , meşə mənzərəli olmaqla möhtəşəm mənzillərə sahib ola bilərsiniz.</p>
            <div class="image">
                @php
                    $second = 1;
                @endphp
                @foreach ($cards as $c)
                    <img class="wow animate__animated animate__fadeInUp card_image" data-id="{{$c->id}}" data-wow-delay="{{$second}}s" src="images/cards/{{$c->photo}}" alt="">
                    @php
                        $second = $second + 0.2;
                    @endphp
                @endforeach
            </div>
            @foreach ($cards as $c)
            @if ($loop->first)

            @if (app()->getLocale() == 'az')
            <h3 class="contact_text c5 wow animate__animated animate__fadeInUp card_name" data-wow-delay="1s">{{$c->name_az}}</h3>
            <p class="wow animate__animated animate__fadeInUp card_info" data-wow-delay="1s">{{$c->text_az}}</p>
            @elseif (app()->getLocale() == 'ru')
            <h3 class="contact_text c5 wow animate__animated animate__fadeInUp" data-wow-delay="1s">{{$c->name_ru}}</h3>
            <p class="wow animate__animated animate__fadeInUp" data-wow-delay="1s">{{$c->text_ru}}</p>
            @elseif (app()->getLocale() == 'en')
            <h3 class="contact_text c5 wow animate__animated animate__fadeInUp" data-wow-delay="1s">{{$c->name_en}}</h3>
            <p class="wow animate__animated animate__fadeInUp" data-wow-delay="1s">{{$c->text_en}}</p>
            @endif
                
            @endif 
            @endforeach
            
        </div>
    </div>
</section>
<!--HOME TEXT SECTION========================-->
<script>
    
</script>
@endsection
