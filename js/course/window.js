$(function()
{
  //--------オブジェクト宣言--------------------------------------------------------
  var cartFlag
    , wordFlag;

  //--------オーバーレイボックスをコントロールするメソッド---------------------------------------------------------
  var windowChange = function(way,target,locate){
    if(way==="in"){
      $("#"+target+"lay").fadeIn();
      $(locate).css("background-color","#f7f3e8");
      eval(target+"Flag=1;");
    }else if (way==="out") {
      $("#"+target+"lay").hide();
      $(locate).css("background-color","");
      eval(target+"Flag=0;");
    }
  }

  var changeControl = function(way){
    //setTimeoutを使うのはスクロールが完了してからメニューを表示させるためです。
    setTimeout(function(){
      if(way=="cart"){
        if(cartFlag!==1){
          windowChange("in","cart",".navMenu>li:last-child");
        }else {
          windowChange("out","cart",".navMenu>li:last-child");
        }
      }else if(way=="word"){
        if(wordFlag!==1){
          windowChange("in","word",".textList i");
        }else{
          windowChange("out","word",".textList i");
        }
      }
    },150);
  }

  //このメソッドが呼び出されると、表示中のオーバーレイボックスを閉じます。
  var closeControl = function(){
    if($('#wordlay').css('display') !== 'none'){
      windowChange("out","word",".textList i")
    }
    if($('#cartlay').css('display') !== 'none'){
      windowChange("out","cart",".navMenu>li:last-child")
    }
  }


  //--------パブリックメソッド---------------------------------------------------------

  //ボックス外をクリックしたときにボックスを閉じる
  $(document).click(function(event) {
    if($.contains($(".navMenu>li:last-child")[0], event.target) || $(".textList i")[0] == event.target || $("#cartlay")[0] == event.target || $("#wordlay")[0] == event.target){
      return false;
    }
    closeControl();
  });

  //ウインドウをスクロールするとオーバーレイボックスを閉じます。
  $(window).scroll(function() {
    closeControl();
  });

  //カート及びキーワードリストのボタンがクリックされたら発動する
  $('.cartButton').click(function(){
    //指定した位置まで自動でスクロール
    $("html,body").animate({scrollTop:$('.subNav').offset().top}, {duration: 100, complete: changeControl("cart")});
  });
  $('.textList i').click(function(){
    $("html,body").animate({scrollTop:$('.subNav').offset().top}, {duration: 100, complete: changeControl("word")});
  });

  //オーバーレイボックスをとじるメソッド
  $('#close').click(function(){
    $("#overlay").fadeOut();
  });
});
