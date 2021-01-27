    <?php require 'header.php' ?>
    <link rel="stylesheet"type="text/css" href="css/style_product.css">
    <form action="sort.php" method="post" class="search" autocomplete="off">

  <!-- 商品名を入力してください。 -->
  <div class="textarea center">
    <input type="text" name="keyword" placeholder="キーワードを入力してください。" class="t_box">
    <input type="submit" value="検索">
</div>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
  'root', '');
if (isset($_REQUEST['keyword'])) {
  $_SESSION['keyword']=htmlspecialchars($_REQUEST['keyword']);
}
?>
  </form><br>
<div class="center">
    <select id="sort" name="vsort" class="cp_ipselect cp_sl01">
    	<option value="standard">並び替え</option>
    	<option value="price_asc">価格の低い順</option>
    	<option value="price_desc">価格の高い順</option>
    </select>
  <br>
    <div class="container center" id="disp">
      </div>

    <script>



    <!--
    	var req = new XMLHttpRequest();

                req.open('GET','all_list.php',true);
              req.onreadystatechange = function(){
      if((req.readyState == 4) && (req.status == 200)){
        // 返却されたテキストをjavascriptのオブジェクトに変換
        console.log(req.responseText)
        var data= JSON.parse(req.responseText);
        // 結果を表示するエリアを取得
        var disp = document.getElementById("disp");
        // dataを見やすいように加工する
        var htmlStr = "";
        for(var i in data){
          htmlStr +='<div class="item"><div class="img"><a href="detail.php?id=' + data[i].id + '"><img src="image/' + data[i].id + '-1.png" class="detail_img"></a></div><br><div class="name"><a href="detail.php?id=' + data[i].id + '">' + data[i].product_name + '</a></div><p class="key">' + data[i].keywords +'</p><div class="price"><span>価格</span>' + data[i].price + '円</div></div>';
        }
        // 結果を表示
        disp.innerHTML = htmlStr;
      }
    };
    req.send("");
    $(function() {
     
      //セレクトボックスが切り替わったら発動
      $('select').change(function() {
     
        //選択したvalue値を変数に格納
        var val = $(this).val();
     
        //選択したvalue値をp要素に出力
        switch (val) {
            case "price_asc":
            	req.open('GET','price_asc.php',true);
            	req.onreadystatechange = function(){
      if((req.readyState == 4) && (req.status == 200)){
        // 返却されたテキストをjavascriptのオブジェクトに変換
        console.log(req.responseText)
        var data= JSON.parse(req.responseText);
        // 結果を表示するエリアを取得
        var disp = document.getElementById("disp");
        // dataを見やすいように加工する
        var htmlStr = "";
        for(var i in data){
          htmlStr +='<div class="item"><div class="img"><a href="detail.php?id=' + data[i].id + '"><img src="image/' + data[i].id + '-1.png" class="detail_img"></a></div><br><div class="name"><a href="detail.php?id=' + data[i].id + '">' + data[i].product_name + '</a></div><p class="key">' + data[i].keywords +'</p><div class="price"><span>価格</span>' + data[i].price + '円</div></div>';
        }
        // 結果を表示
        disp.innerHTML = htmlStr;
      }
    };
    req.send("");
              break;
            case "price_desc":
            	req.open('GET','price_desc.php',true);
            	req.onreadystatechange = function(){
      if((req.readyState == 4) && (req.status == 200)){
        // 返却されたテキストをjavascriptのオブジェクトに変換
        console.log(req.responseText)
        var data= JSON.parse(req.responseText);
        // 結果を表示するエリアを取得
        var disp = document.getElementById("disp");
        // dataを見やすいように加工する
        var htmlStr = "";
        for(var i in data){
          htmlStr +='<div class="item"><div class="img"><a href="detail.php?id=' + data[i].id + '"><img src="image/' + data[i].id + '-1.png" class="detail_img"></a></div><br><div class="name"><a href="detail.php?id=' + data[i].id + '">' + data[i].product_name + '</a></div><p class="key">' + data[i].keywords +'</p><div class="price"><span>価格</span>' + data[i].price + '円</div></div>';
        }
        // 結果を表示
        disp.innerHTML = htmlStr;
      }
    };
    req.send("");

              break;
            default:
    			req.open('GET','all_list.php',true);
    			req.onreadystatechange = function(){
      if((req.readyState == 4) && (req.status == 200)){
        // 返却されたテキストをjavascriptのオブジェクトに変換
        console.log(req.responseText)
        var data= JSON.parse(req.responseText);
        // 結果を表示するエリアを取得
        var disp = document.getElementById("disp");
        // dataを見やすいように加工する
        var htmlStr = "";
        for(var i in data){
          htmlStr +='<div class="item"><div class="img"><a href="detail.php?id=' + data[i].id + '"><img src="image/' + data[i].id + '-1.png" class="detail_img"></a></div><br><div class="name"><a href="detail.php?id=' + data[i].id + '">' + data[i].product_name + '</a></div><p class="key">' + data[i].keywords +'</p><div class="price"><span>価格</span>' + data[i].price + '円</div></div>';
        }
        // 結果を表示
        disp.innerHTML = htmlStr;
      }
    };
    req.send("");
          }
       });
    });

          

    //-->
    </script>
    </div>
    </div>