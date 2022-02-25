
const html = document.querySelector("html");
html.classList.add("remove");
window.addEventListener("load",function(){
  const loader = document.querySelector(".preloader");
  setTimeout(function () {
    $(".preloader").addClass("hidden");
    $("html").removeClass("remove");
  }, 1000);

})
function validate(){
  const form =document.querySelector('.form_report');
  const email =document.getElementById('email').value;
  const pattern =/^[^ ]+@[^ ]+\.[a-z]{2,3}$/

  if(email.match(pattern)){
      form.classList.add('valid');
      form.classList.remove('invalid');
  }else{
      form.classList.add('invalid');
      form.classList.remove('valid');
  }
  if(email===""){
      form.classList.remove('invalid');
      form.classList.remove('valid');
  }
}
$(function () {
  wow = new WOW({
    animateClass: 'animated',
    offset: 100
});
wow.init();

    "use strict";
    /** NAVBAR------------------------------------*/
    $(window).on("scroll",function(){
        if($(this).scrollTop()>50){
            $('.header').addClass('fixed-header');
        }
        else{
            $('.header').removeClass('fixed-header');
        }
    });
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
                // console.log(data);
            }
        })
    })


    // $(function () {
    //   // Set form height on document ready
    //   $('.reservation_section .cc-number').formatCardNumber();
    // });
    const navToggler = document.querySelector(".navbar-toggler");
    navToggler.addEventListener("click",toggleNav);


    function toggleNav(){
        navToggler.classList.toggle("active");
    };

    $( ".navbar-toggler").click(function() {
      $(".vs-menu-wrapper").toggleClass("vs-body-visible");
});
$( ".vs-menu-toggle" ).click(function() {
  $(".vs-menu-wrapper").removeClass("vs-body-visible");
});

    /**NAVBAR-----------------------------------------*/

});
