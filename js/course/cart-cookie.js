var cartCookieFn = $(function()
{
  //cookie.jsというライブラリを使用するための初期設定
  $.cookie.json = true;


  //--------オブジェクト宣言--------------------------------------------------------
  var timer
    , idTarget
    , idCookie;
  //クッキーを読み込む
  var cart_arr = $.cookie('cart');
  if(!cart_arr) cart_arr=[];


  //--------addボタンとdelボタンを切り替える処理---------------------------------------------------------
  var changeButton = function(target,text){
    $("#"+target).html(text);
    if(text=="カートから削除"){
      $("#"+target).parent("li").addClass("liDel");
    }else if(text=="カートに追加"){
      $("#"+target).parent("li").removeClass("liDel");
    }
  }


  //--------クッキーを編集する---------------------------------------------------------
  var cookieEdit = function(type,cart_arr,idCookie){
    if(type==="del"){
      //配列の中にある任意の文字列をカートから削除するメソッド
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
    //buttonの文字をカートから削除し、idの数字だけ拾ってくる。
    idCookie = idTarget.slice(6);

    //カートから削除のボタンが押された実行する
    if(target.html()=="カートから削除" || target.html()=="削除") {
      cookieEdit("del",cart_arr,idCookie);
      changeButton(idTarget,"カートに追加");

    //カート内の商品が４つだったらaddできないように
    }else if(cart_arr.length === 4){
      return false;

    //カートに追加ボタンが押されたら実行
    }else if(target.html()=="カートに追加"){
      cookieEdit("add",cart_arr,idCookie);
      changeButton(idTarget,"カートから削除");
      //カートの中身が４つに達したらオーバーレイボックスを表示
      if(cart_arr.length === 4){
        $("#overlay").fadeIn(500);
      }
    }
  }


  //--------カートの数字を書き換える---------------------------------------------------------
  var cartNumChange = function(){
    $('.label').html(cart_arr.length);
  }


  //--------パブリックメソッド---------------------------------------------------------
  //後からカートに追加された要素に対してイベントを設定するためには、document.onにすべし
  $(document).on("click" , '#jsList button' , function(){
    cookieControl($(this));
  });
  $(document).on("click" , '#cartButtonList button' , function(){
    cookieControl($(this));
  });


  //最初のアクセスでカートの数字を書き換える
  cartNumChange();

});
