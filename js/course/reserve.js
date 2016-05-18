//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<[$()ここから]>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$(function()
{
//-------もろもろ作成-------------------------------------------------------
    $.cookie.json = true;
    var cart_arr = $.cookie('cart');

    if( !cart_arr )
    {
        console.log("a");
        cart_arr = Array();
    };

    if(cart_arr.length <4)
    {
        $("button#confirm").css("display", "none");
    }
    else
    {
        $("button#list").css("display", "none");
    };

//--------cartの中身を表示------------------------------------------------------------
    var arr_category = new Array();
    var arrctg_s = new Array();
    for(var i = 0; i <  arrayData.length; i++)
    {
        for(var b in arrayData[i])
        {
            //cartにはいっているもののみ配列に追加
            if( b === "id" && jQuery.inArray(arrayData[i][b], cart_arr) !== -1 )
            {
                arr_category.push(arrayData[i]);
            }
        }
    };
    for(var i=0 ; i < arr_category.length ; i++)
    {
        for(var c in arr_category[i])
        {
            //imgのみタグつきで書き込む
            var name_s = arr_category[i][c].substr(0, arr_category[i][c].length-4);
            if(c === "img")
            {
                listMakeDel(arrctg_s, arr_category[i][c], name_s);
            }
        }
    };

    $("div#box").html(arrctg_s);

    //idからカナに変更してsessionに格納
    console.log(arr_category);
    var nameChange = new Array();
    for(var i=0 ; i < arr_category.length ; i++)
    {
        for(var d in arr_category[i])
        {
            var name_s = arr_category[i][d].substr(0, arr_category[i][d].length-4);
            if(d === "img")
            {
                nameChange.push(name_s);
            }
        }
    };

    console.log(nameChange);
///////カートと飲み放題の合計金額////////////////////////////////////
    var priceSum = 0;
    for( var j = 0; j < arr_category.length; j++)
    {
        for( var key in arr_category[j])
        {
            if( key === "price" )
            {
                priceSum = parseInt(arr_category[j][key]) + priceSum;
            }
        }
    };

    var priceSumAll = priceSum + parseInt(1500);
    $("p#gennka").text("合計金額は" + priceSumAll + "円のところ…");

///////idからkanaに変換///////////////////////////////////////////////////////////////////
/*    console.log(arrayData);
    console.log(cart_arr);
    var arrExchange = new Array();
    var arrName = new Array();

    for(var i = 0; i <  arrayData.length; i++)
    {
        for(var key2 in arrayData[i])
        {
            //cartにはいっているもののみ配列に追加
            if( key2 === "id" && jQuery.inArray(arrayData[i][key2], cart_arr) !== -1 )
            {
                arrExchange.push(arrayData[i]);
            }
        }
    };

    for(var i=0 ; i < arrExchange.length ; i++)
    {
        for(var key3 in arrExchange[i])
        {
            if( key3 === "kana" )
            {
                arrName.push(arrExchange[i][key3]);
            }
        }
    };

    //console.log(arrName);

    //$.cookie("cart", arrName);


    console.log($.cookie("cart"));
    */
////ajaxによるページ遷移///////////////////////////////////////////////////////////////////////
    //ページを書き換える箇所の設定(しなくてもいい)
/*	var $content = $('div#session');

		var link = "list_1.php";

				pageChange(link);


	//ページを取得してくる
    function pageChange(link){
    	$.ajax({
            type: 'GET',
            url: link,
            dataType: 'json',
            success: function(data){
                $content.html(data).fadeIn(600);
            },
            error:function(){
                alert('問題がありました。');
            }
    	});
    };
*/
//------カートに追加・削除----------------------------------------------------------------------------------
    $('button').on("click", function()
        {

        });

    function addButton(that)
    {
        var flg = $(that).attr('id');
        if(cart_arr == null)
        {
            cart_arr = $.cookie('cart');
        }
        else if(cart_arr.indexOf(flg) !=-1)
        {
            alert('既に登録されています');
        }
        else  if(cart_arr.length > 3)
        {
            alert('cart max!!');
        }
        else
        {
            console.log("a");
            cart_arr.push(flg);
            $(that).attr("class", "del");
            $(that).text("削除");
        };

    $.cookie('cart', cart_arr);
    };

    function delButton(that)
    {
        var flg    = $(that).attr('id');
        if(cart_arr == null)
        {
            cart_arr = $.cookie('cart');
        }
        else
        {
            console.log("d");
            cart_arr.some(function(v, i)
            {
                if (v==flg) cart_arr.splice(i,1);
            });
        $(that).attr("class", "add");
        $(that).text("追加");
        };
        $.cookie('cart', cart_arr);
    };

    function listMakeAdd(arrctg, arr, name )
    {
        arrctg.push('<p><img id="list"  src="./img/' +
        arr + '" width="200" height="200" /></a></p> <p><button type="button" id="' +
        name + '" class="add">追加</button></p> ');
    };

    function listMakeDel(arrctg, arr, name )
    {
        arrctg.push('<img id="list"  src="../../img/menu/' +
        arr + '" width="200" height="200" /> ');
    };

    function btnPos(arrctg, arr, name )
    {
        arrctg.push('<p><button type="button" id="' +
        name + '" class="add">追加</button></p> ');
    };

});
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<[$()ここまで]>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
