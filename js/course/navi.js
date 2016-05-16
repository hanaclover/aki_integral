$(function()
{
  //--------オブジェクト宣言---------------------------------------------------------
  var nav    = $('#nav1'),
      offset = nav.offset();

  $(window).scroll(function () {
    if($(window).scrollTop() > offset.top) {
      nav.addClass('fixed');
      nav.css("background-color","#eee");
    } else {
      nav.removeClass('fixed');
      nav.css("background-color","");
    }
  });

});
