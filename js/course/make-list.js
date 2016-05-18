var makeListFn = $(function()
{
  //--------オブジェクト宣言---------------------------------------------------------
  var arrHtml = new Array()
    , arrValue = new Array()
    , cart_arr = new Array();
    //, arrayData = JSON.parse('<?php echo json_encode($data); ?>');

  //cookie.jsの設定、魔法の言葉
  $.cookie.json = true;


  //--------リストをhtml出力するためのメソッド----------------------------------------------------------
  var makeHtmlList = function(arrValue){
    //論理削除の分岐
    if(arrValue["deleteflag"]!="1"){
      arrHtml.push(
        '<li>'
        + '<a href="detail.php?id=' + arrValue["id"] + '">'
        + '<img id="list" src="../../img/menu/' + arrValue["img"] + '">'
        + '</a>'
        + '<p>' + arrValue["name"] + '</p>'
        + '<button id="button' + arrValue["id"] + '">カートに追加</button>'
        + '</li>'
      );
    }
  }


  //--------クッキーの更新を取得してカートの数字を書き換えるメソッド----------------------------------------------------------
  var cookieUpdate = function(){
    cart_arr = $.cookie('cart');
    if(!cart_arr) cart_arr=[];
    //カートの数字を書き換える
    $('.label').html(cart_arr.length);
  }


  //--------クッキーの更新を取得してカートの数字を書き換えるメソッド----------------------------------------------------------
  var initButton = function(){
    cart_arr = $.cookie('cart');
    if(!cart_arr) cart_arr=[];
    var counter = 0;
    while (counter<cart_arr.length) {
      $("#button" + cart_arr[counter]).html("カートから削除");
      $("#button" + cart_arr[counter]).parent("li").addClass("liDel");
      counter++;
    }
  }


  //--------配列の要素の数だけループし、html出力につなげるメソッド----------------------------------------------------------
  var listControl = function(target){
    for(var i=0 ; i < arrayData.length ; i++){
      //makeHtmlListに配列を渡すために格納する処理。
      for(var cate in arrayData[i]){
        arrValue[cate]=arrayData[i][cate];
      }
      //allのときにはっ全部表示。検索ワードやカテゴリーソートの時は絞って表示
      if(target==="all"){
        makeHtmlList(arrValue);
      }else if (target == arrValue["category"] || arrValue["kana"].match(target)) {
        makeHtmlList(arrValue);
      }
    }
  }


  //--------ソートや検索が実行されたときのメソッド-----------------------------------------------------------
  var changeList = function(target){
    arrHtml = [];
    listControl(target);
    changeHtml("#jsList");
    initButton();
  }


  //--------htmlを出力するメソッド-----------------------------------------------------------
  var changeHtml = function(target){
    $(target).html(arrHtml).hide().fadeIn(800);
    cookieUpdate();
  }

  //--------パブリックメソッド-----------------------------------------------------------

  //デフォルト（全表示）のhtmlを出力する
  listControl("all");
  changeHtml("#jsList");
  initButton();

  //selectの値を変更したときにメソッド発動
  $('[name=category]').change(function() {
    changeList($('[name=category]').val());
    $('[type=text]').val("");
  });

  //検索が実行されたときに実行する
  $('[type=button]').click(function(){
    if ($('[type=text]').val()) {
      changeList($('[type=text]').val());
    }else{
      changeList('all');
    }
  });

  $('[type=text]').keypress(function(e){
  	if ( e.which == 13 ) {
      if ($('[type=text]').val()) {
        changeList($('[type=text]').val());
      }else{
        changeList('all');
      }
  	}
  });

  $('.textList p').click(function(){
    //console.log($(this).text());
    changeList($(this).text());
    $('[type=text]').val($(this).text());
  });

  //////autocomplete//////////////
  $("input#sw").autocomplete({
        source: "./autocomplete.php",
        autoFocus: true,
        delay: 500
    });
});
