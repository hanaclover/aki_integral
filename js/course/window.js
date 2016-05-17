$(function()
{
  //--------オブジェクト宣言----------------------------------------------------------------------------
  var cartFlag
    , wordFlag;

  //--------オーバーレイボックスをコントロールするメソッド----------------------------------------------
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
    
    //ここでliを大量生産(相馬がいじったとこ)--------------------------------------------------
        cart_arr = $.cookie('cart');
        if(!cart_arr) cart_arr=[];
        var cartChange = new Array();
        var nameChange = new Array();
        var arrLi = new Array();
        for( var i = 0 ; i < arrayData.length ; i++ ){
            for(var key in  arrayData[i] ){
                if( key ==="id" && $.inArray(arrayData[i][key], cart_arr) !== -1){
                    cartChange.push(arrayData[i]);
                }
            }
        };
        for( var i = 0 ; i < cartChange.length ; i++ ){
            for(var key1 in  cartChange[i] ){
                if( key1 ==="name" ){
                    nameChange.push(cartChange[i][key1]);
                }
            }
        };
        //名前の配列になってます(例:チャンジャ、たこわさ)
        nameChange;
        //HTML文章を作ります
        for( var i = 0 ; i < nameChange.length ; i++ ){
            arrLi.push('<li id="'+ nameChange[i] +'">' + nameChange[i] 
                    + '<button id="' + nameChange[i] + '" class="cartDel">削除</button></li>');
        };
       $('#cartButtonList').html(arrLi);
    //--------------------------------------------------------------------
  });

  $('.textList i').click(function(){
    $("html,body").animate({scrollTop:$('.subNav').offset().top}, {duration: 100, complete: changeControl("word")});
  });

  //オーバーレイボックスをとじるメソッド
  $('#close').click(function(){
    $("#overlay").fadeOut();
  });

  //-----cartBottunList上での削除-------------------------------------------
  /*$(document).on('click', 'button.cartDel', function(){
    console.log("a");
    //クリックされたボタンの親要素のliごと消す
    $(this).prev().remove();
  });
*/

  //------------------------------------------------------------------------

});
