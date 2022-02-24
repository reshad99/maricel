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
            $('#datepicker').fadeIn()
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
                $('#datepicker').fadeOut()
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
