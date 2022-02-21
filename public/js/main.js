window.addEventListener("load",function(){
  const loader = document.querySelector(".preloader");
  setTimeout(function () {
    $(".preloader").addClass("hidden");
  }, 750);
  
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
