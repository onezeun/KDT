$(document).ready(function () {
  $('.menu1').on('click', function (){
    $('.notice').show();
    $('.news').hide();
    $('.employ').hide();
    $(this).parent().addClass('menu_select');
    $(this).parent().siblings().removeClass('menu_select');
  });

  $('.menu2').on('click', function (){
    $('.news').show();
    $('.notice').hide();
    $('.employ').hide();
    $(this).parent().addClass('menu_select');
    $(this).parent().siblings().removeClass('menu_select');
  });

  $('.menu3').on('click', function (){
    $('.employ').show();
    $('.notice').hide();
    $('.news').hide();
    $(this).parent().addClass('menu_select');
    $(this).parent().siblings().removeClass('menu_select');
  });
});