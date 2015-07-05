/*
  0 = -10
  10 = 30
  20 = 70
  25 = 90
  30 = 110
  40 = 150
  50 = 190
 */ 
$(function() {
  var angle;
  var min = 0;
  var max = 180;
  
  $('.intput_1').on('keyup', function() {
    angle = ($(this).val()/100)*180;
    
    $('.indicator_1').css({
        transform: 'rotate(' + angle + 'deg)'
    });

  });
});
$(function() {
  var angle;
  var min = 0;
  var max = 180;
  
  $('.intput_2').on('keyup', function() {
    angle = ($(this).val()/100)*180;
    
    $('.indicator_2').css({
        transform: 'rotate(' + angle + 'deg)'
    });

  });
});