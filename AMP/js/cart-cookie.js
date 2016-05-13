var cartCookieFn = $(function()
{
  //cookie.jsというライブラリを使用するための初期設定
  $.cookie.json = true;


  //--------オブジェクト宣言--------------------------------------------------------
  var cartFlag
    , wordFlag
    , timer
    , idTarget
    , idCookie;
  //クッキーを読み込む
  var cart_arr = $.cookie('cart');
  if(!cart_arr) cart_arr=[];


  //--------addボタンとdelボタンを切り替える処理---------------------------------------------------------
  var changeButton = function(target,text){
    $("#"+target).html(text);
  }


  //--------クッキーを編集する---------------------------------------------------------
  var cookieEdit = function(type,cart_arr,idCookie){
    if(type==="del"){
      //配列の中にある任意の文字列を削除するメソッド
      cart_arr.some(function(val,i){
        if (val==idCookie) cart_arr.splice(i,1);
      });
    }else if(type==="add"){
      cart_arr.push(idCookie);
    }
    $.cookie('cart', cart_arr);
    cartNumChange();
  }


  //--------クッキーを更新するかどうかを司る---------------------------------------------------------
  var cookieControl = function(target){
    idTarget = target.attr('id');
    //buttonの文字を削除し、idの数字だけ拾ってくる。
    idCookie = idTarget.slice(6);

    //
    if(target.html()=="削除") {
      cookieEdit("del",cart_arr,idCookie);
      changeButton(idTarget,"追加");

    //カート内の商品が４つだったらaddできないように
    }else if(cart_arr.length === 4){
      return false;

    //
    }else if(target.html()=="追加"){
      cookieEdit("add",cart_arr,idCookie);
      changeButton(idTarget,"削除");
      if(cart_arr.length === 4){
        $("#overlay").fadeIn(500);
      }
    }
  }


  //--------カートの数字を書き換える---------------------------------------------------------
  var cartNumChange = function(){
    $('.label').html(cart_arr.length);
  }


  //--------オーバーレイボックスをコントロールするメソッド---------------------------------------------------------
  var windowChange = function(way,target,locate){
    if(way==="in"){
      $("#"+target+"lay").fadeIn();
      $(locate).css("background-color","#aaa");
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

  $(document).on("click" , '.list button' , function(){
    cookieControl($(this));
  });

  $('#close').click(function(){
    $("#overlay").fadeOut();
  });

  //ボックス外をクリックしたときにボックスを閉じる
  $(document).click(function(event) {
    if($.contains($(".navMenu>li:last-child")[0], event.target) || $(".textList i")[0] == event.target || $("#cartlay")[0] == event.target || $("#wordlay")[0] == event.target){
      return false;
    }
    console.log("a");
    closeControl();
  });

  $('.cartButton').click(function(){
    //指定した位置まで自動でスクロール
    $("html,body").animate({scrollTop:$('.navMenu').offset().top}, {duration: 100, complete: changeControl("cart")});
  });

  $('.textList i').click(function(){
    $("html,body").animate({scrollTop:$('.navMenu').offset().top}, {duration: 100, complete: changeControl("word")});
  });

  //ウインドウをスクロールするとオーバーレイボックスを閉じます。
  $(window).scroll(function() {
    closeControl();
  });

  //最初のアクセスでカートの数字を書き換える
  cartNumChange();

});
