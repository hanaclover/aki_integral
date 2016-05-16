$(function()
{
  //--------オブジェクト宣言---------------------------------------------------------
  var nav    = $('#nav1'),
      offset = nav.offset();

  $(window).scroll(function () {
    if($(window).scrollTop() > offset.top) {
      nav.addClass('fixed');
    } else {
      nav.removeClass('fixed');
    }
  });

});
