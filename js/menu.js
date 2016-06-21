$(document).ready(function(){
  
  $('nav i').on('click', function(){
    $('.menu').animate({left: "0"},200);
  });
  
  $('.close i').on('click', function(){
    $('.menu').animate({left: "-355px"},200);
  });
});