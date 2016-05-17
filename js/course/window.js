$(function()
{
  //--------オブジェクト宣言----------------------------------------------------------------------------
  var cartFlag
    , cart_arr
    , arrHtml = new Array()
    , wordFlag;

  //--------クッキーの更新を取得----------------------------------------------------------
  var cookieUpdate = function(){
    cart_arr = $.cookie('cart');
    if(!cart_arr) cart_arr=[];
  }


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


  //--------カートリストのhtmlをつくる---------------------------------------------------------
  var cartListMake = function(key){
    arrHtml.push(
      '<li>'
      + '<img id="list" src="../../img/menu/' + arrayData[key]["img"] + '" width="30">'
      + '<span>' + arrayData[key]["name"] + '</span>'
      + '<button id="button' + arrayData[key]["id"] + '">削除</button>'
      + '</li>'
    );
  }

  //--------カートリストのhtmlをつくる---------------------------------------------------------
  var cartListControl = function(time){
    arrHtml = [];
    for( var i = 0 ; i < arrayData.length ; i++ ){
      for( var j = 0 ; j < cart_arr.length ; j++ ){
        if(arrayData[i]['id']==cart_arr[j]){
          // console.log(arrayData[i]['name']);
          cartListMake(i);
        }
      }
      $('#cartButtonList').html(arrHtml).hide().fadeIn(time);
    }
  }




  //--------パブリックメソッド---------------------------------------------------------
  //ボックス外をクリックしたときにボックスを閉じる
  $(document).click(function(event) {
    console.log($(event.target).parents("#cartlay").length);
    if($.contains($(".navMenu>li:last-child")[0], event.target) || $(".textList i")[0] == event.target || $(event.target).closest("#cartlay").length>0 || $(event.target).closest("#wordlay").length>0){
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
    cookieUpdate();
    //カートの中身がない場合クリックしても何も起こらない。
    if(cart_arr.length<1){
      return false;
    }
    //指定した位置まで自動でスクロール
    $("html,body").animate({scrollTop:$('.subNav').offset().top}, {duration: 100, complete: changeControl("cart")});

    //カートリストの中身を書き換える
    cartListControl(100);
  });

  $(document).on("click" , '#cartButtonList button' , function(){
    cookieUpdate();
    cartListControl(100);
    changeControl("cart");
  });

  $('.textList i').click(function(){
    $("html,body").animate({scrollTop:$('.subNav').offset().top}, {duration: 100, complete: changeControl("word")});
  });

  //オーバーレイボックスをとじるメソッド
  $('#close').click(function(){
    $("#overlay").fadeOut();
  });

  //オーバーレイボックスをとじるメソッド
  $('.cartWrapper').hover(
    function(){
      $(".cartWrapper").css("background-color","#ddd").css("border-top","1px solid #ddd");
    },
    function () {
      $(".cartWrapper").css("background-color","").css("border","none");
    }
  );

});
