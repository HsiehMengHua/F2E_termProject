$(document).ready(function(){

  $('.block-container li').on('click', function(){
    $(this).find("i").css({"display": "none"});
    $(this).find(".block-data").css({"display": "flex"});
    $(this).find(".block-title p").css({"display": "none"});
    $(this).find(".send-data").css({"display": "flex"});
  });
});
