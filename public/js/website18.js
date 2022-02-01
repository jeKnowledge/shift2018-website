const toggleBurger=()=>{document.querySelector('.navbar-menu').classList.toggle('is-active');$(document).ready(function(){$("#navbar-nav a").click(function(e){var isActive=$(this).hasClass('is-active');$('.is-active').removeClass('is-active');if(!isActive){$(this).addClass('is-active');}});});};

$(document).ready(function(){
  $(function(){
    var stickyHeaderTop=$('#navbar').offset().top;
    $(window).scroll(function(){
      if($(window).scrollTop()>stickyHeaderTop){
        $('#navbar').css({position:'fixed',top:'0px'});
      }
      else {
        $('#navbar').css({position:'absolute',top:'0px'});
      }
    });
  });


$('#form-email').on('submit',function(e){document.getElementById("subscribe-button").classList.add('is-loading');document.getElementById("message-mailchimp").innerHTML="";$.ajaxSetup({header:$('meta[name="_token"]').attr('content')})
e.preventDefault(e);$.ajax({type:"POST",url:'/mailchimp',data:$(this).serialize(),dataType:'json',success:function(data){if(data.status==='subscribed')document.getElementById("message-mailchimp").innerHTML="Be aware of Shift APPens news!";else if(data.status===400&&data.detail==='Please provide a valid email address.')document.getElementById("message-mailchimp").innerHTML="Ups! Almost catch us! Provide one valid email!";else if(data.status===400)document.getElementById("message-mailchimp").innerHTML="You can already know everything about us!";else document.getElementById("message-mailchimp").innerHTML="You can obviously come back later...";document.getElementById("subscribe-button").classList.remove('is-loading');},error:function(data){document.getElementById("subscribe-button").classList.remove('is-loading');document.getElementById("message-mailchimp").innerHTML="You can obviously come back later...";}})});$(function(){$('div.navbar-start a').bind('click',function(event){var $anchor=$(this);$('html, body').stop().animate({scrollTop:$($anchor.attr('href')).offset().top},800,'easeInOutExpo');event.preventDefault();});$('div.arrow-position a').bind('click',function(event){var $anchor=$(this);$('html, body').stop().animate({scrollTop:$($anchor.attr('href')).offset().top},800,'easeInOutExpo');event.preventDefault();})
$('div.navbar-brand a').bind('click',function(event){var $anchor=$(this);$('html, body').stop().animate({scrollTop:$($anchor.attr('href')).offset().top},800,'easeInOutExpo');event.preventDefault();})});});

