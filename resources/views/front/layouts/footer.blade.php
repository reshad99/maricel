<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 fotLeft col-md-12">
                <img src="img/logo/logo.png" alt="">
            </div>
            <div class="col-lg-6 fotRight col-md-12">
                <h6>Bütün hüquqlar qorunur 2022</h6>
                <img src="img/logo/corn-ag-logo 2.png" alt="">

            </div>
        </div>
    </div>
</footer>
<!--FOOTER SECTION========================-->
<!--UPDOWN SECTION========================-->
<!-- <div class="progress-bar fix" >
    <button class="back-to-top hidden wow animate__animated animate__bounceInDown animate__fast">
        <svg xmlns="http://www.w3.org/2000/svg" class="back-to-top-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
        </svg>
    </button>
</div> -->
<!--UPDOWN SECTION========================-->
<!--SCRIPTS SECTION========================-->

<script type="text/javascript" src="js/plugins/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/plugins/popper.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript"src="js/plugins/card-validator.js"></script>
<script type="text/javascript" src="js/plugins/wow.min.js"></script>
<script src="https://npmcdn.com/react@15.3.0/dist/react.min.js"></script>
<script src="https://npmcdn.com/react-dom@15.3.0/dist/react-dom.min.js"></script>
<script type="text/javascript" src="js/moment-with-locales.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="js/plugins/calendar.js"></script>
<!-- JavaScript Alertify -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!--MAIN JS========================-->
<script type="text/javascript" src="js/main.js"></script>


<script>

    $(function() {

        var unavailableDates;

        $('#card_id_reservation').change(function(){
            card_id = $(this).val();
            $.ajax({
            url: '/reserved-dates',
            type: 'post',
            data: {card_id:card_id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function(data){
                 unavailableDates = data;
            }
        })
        })

      $( "#datepicker" ).datepicker({
          minDate: 0,
          maxDate: "2022-05-31",
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
          beforeShowDay:function(d) {
            var year = d.getFullYear(),
            month = ("0" + (d.getMonth() + 1)).slice(-2),
            day = ("0" + (d.getDate())).slice(-2);

        var formatted = year + '-' + month + '-' + day;

        if ($.inArray(formatted, unavailableDates) != -1) {
            return [false,"","unAvailable"];
        } else{

            return [true, "","Available"];
        }
        }

    });


    });
    </script>

<script>

    $(function(){

        $('.card_image').click(function(){
            var id = $(this).data('id');
            $.ajax({
                url: '/card-details',
                type: 'post',
                data: {id:id},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data)
                {
                    $('.card_name').html(data.name);
                    $('.card_info').html(data.text);
                },
                error: function(data){
                    console.log(data);
                }
            })
        })




        $(document).on('submit', '#reserve_form', function(){
            var form = $(this).serialize();

            $.ajax({
                url: '/reserve/submit',
                type: 'post',
                data: form,
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function()
                {
                    $('.submit_reserve').html('<img src="/images/spinner/spinner3.png" style="width:35px">')
                    $('.submit_reserve').prop('disabled', true)
                    $('#reserve_form').css('opacity', '.4').css('transition', 'all .5s')
                    $('#reserve_form input').prop('disabled', true)
                },
                success: function(data){
                    console.log(data)
                    $('.submit_reserve').html('<a >GÖNDƏR</a>')
                    $('.submit_reserve').prop('disabled', false)
                    $('#reserve_form').css('opacity', '').css('transition', 'all .5s')
                    $('#reserve_form input').prop('disabled', false)
                    alertify.alert(data.message).set({title: 'Qeydiyyat uğurla tamamlandı!'});
                    $('.error-text').css('display', 'none')
                    $('#reserve_form').trigger('reset')
                },
                error: function(data){
                    console.log(data)
                    $('.submit_reserve').html('<a >GÖNDƏR</a>')
                    $('.error-text').css('display', 'none')
                    $('.submit_reserve').prop('disabled', false)
                    $('#reserve_form').css('opacity', '').css('transition', 'all .5s')
                    $('#reserve_form input').prop('disabled', false)
                    $('.error-text').css('display', 'block')
                    $('.error-text').html(data.responseJSON.error)


                }
            })
        })

        $('input[type=date]').change(function(){
            val = $(this).val();
            $(this)
        })



        $(document).on('submit', '#register_form', function(){
            var form = $(this).serialize();

            $.ajax({
                url: '/register/submit',
                type: 'post',
                data: form,
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function()
                {
                    $('.submit_register').html('<img src="/images/spinner/spinner3.png" style="width:35px">')
                    $('.submit_register').prop('disabled', true)
                    $('#register_form').css('opacity', '.4').css('transition', 'all .5s')
                    $('#register_form input').prop('disabled', true)
                    $('#register_form select').prop('disabled', true)
                },
                success: function(data){
                    console.log(data)
                    $('.submit_register').html('<a >GÖNDƏR</a>')
                    $('.submit_register').prop('disabled', false)
                    $('#register_form').css('opacity', '').css('transition', 'all .5s')
                    $('#register_form input').prop('disabled', false)
                    $('#register_form select').prop('disabled', false)
                    alertify.alert(data.message).set({title: 'Qeydiyyat uğurla tamamlandı!'});
                    $('.error-text').css('display', 'none')
                    $('#register_form').trigger('reset')
                },
                error: function(data){
                    $('.submit_register').html('<a >GÖNDƏR</a>')
                    $('.error-text').css('display', 'none')
                    $('.submit_register').prop('disabled', false)
                    $('#register_form').css('opacity', '').css('transition', 'all .5s')
                    $('#register_form input').prop('disabled', false)
                    $('#register_form select').prop('disabled', false)
                    if(data.responseJSON.status == 0)
                    {
                        console.log(data.responseJSON)
                        $('.error-text').css('display', 'block')
                        $('.error-text').html(data.responseJSON.error)

                    }


                    if(data.responseJSON.status == 1)
                    {
                        console.log(data)
                    }

                }
            })
        })
    })
</script>
</body>
</html>
