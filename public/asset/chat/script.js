$(function(){
  $('.fa-minus').click(function(){    $(this).closest('.chatbox').toggleClass('chatbox-min');
  });
  $('.fa-close').click(function(){
    $(this).closest('.chatbox').hide();
  });
});