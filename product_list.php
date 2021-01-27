<?php require 'header.php' ?>
<link rel="stylesheet"type="text/css" href="css/style_product.css">
<form action="sort.php" method="post" class="search" autocomplete="off"> <!--後で豆phpに移動 作れなければ2枚構成にチェンジ-->

<!-- 商品名を入力してください。 -->
<div class="textarea center">
	<input type="text" name="keyword" placeholder="キーワードを入力してください。" class="t_box">

<!-- 検索方法を選択してください。 -->
<!-- 	<input type="radio" name="search" value="all">すべての商品を表示 -->
	<!-- <input type="radio" name="search" value="price_asc" checked>価格の安い順番 -->
	<!-- <input type="radio" name="search" value="price_desc" >価格の高い順番 -->
	<input type="submit" value="検索">
</div>

</form>
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

                req.open('GET','allproduct_list.php',true);
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
            	req.open('GET','allprice_asc.php',true);
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
            	req.open('GET','allprice_desc.php',true);
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
    			req.open('GET','allproduct_list.php',true);
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

<!-- // 商品を出力する
/*if (isset($_REQUEST['search'])) {
	echo '<div class="container">';
	//一時テーブルの作成
	$tmpt=$pdo->prepare('create temporary table tmp as select * from product where product_name like ?');
	$tmpt->execute(['%'.$_REQUEST[keyword].'%']);
	//ここまで一時テーブルの作成
	/*switch ($_REQUEST['search']) {
	// 	case 'all':
	// 		$sql=$pdo->prepare('select * from product where product_name like ? order by price asc');
	// 		$sql->execute(['%'.$_REQUEST['keyword'].'%']);
	// 		foreach ($sql as $row) {
	// 		$id=$row['id'];
	// echo '<div class="item">','<a href="detail.php?id=', $id, '"><img src="image/', htmlspecialchars($row['id']), '.jpg"class="detail_img"></a>','<br>';

	// echo '<a href="detail.php?id=', $id, '">', htmlspecialchars($row['product_name']), '</a>','<p>', htmlspecialchars($row['price']),'円','</p>','</div>';
	// 		}
	// 		break;

		case 'price_asc':
			//一時テーブルの作成
			$$pdo->prepare('create temporary table tmp as select * from product where product_name like ?');
			$sql->execute(['%'.$_REQUEST[keyword].'%']);
			//ここまで一時テーブルの作成
			$sql=$pdo->prepare('select * from product where product_name like ? order by price asc');
			$sql->execute(['%'.$_REQUEST['keyword'].'%']);
			foreach ($sql as $row) {
			$id=$row['id'];
	echo '<div class="item">','<div class="img"><a href="detail.php?id=', $id, '"><img src="image/', htmlspecialchars($row['id']), '-1.png"class="detail_img"></a></div>','<br>';

	echo '<div class="name"><a href="detail.php?id=', $id, '">', htmlspecialchars($row['product_name']), '</a></div>','<p class="key">', htmlspecialchars($row['keywords']),'<div class="price"><span>価格</span>', htmlspecialchars($row['price']),'円','</div>','</div>';
			}
			break;

		case 'price_desc':
			$sql=$pdo->prepare('select * from product where product_name like ? order by price desc');
			$sql->execute(['%'.$_REQUEST['keyword'].'%']);
				foreach ($sql as $row) {
			$id=$row['id'];
	echo '<div class="item">','<div class="img"><a href="detail.php?id=', $id, '"><img src="image/', htmlspecialchars($row['id']), '-1.png"class="detail_img"></a></div>','<br>';

	echo '<div class="name"><a href="detail.php?id=', $id, '">', htmlspecialchars($row['product_name']), '</a></div>','<p class="key">', htmlspecialchars($row['keywords']),'<div class="price"><span>価格</span>', htmlspecialchars($row['price']),'円','</div>','</div>';
				}
				break;

		case 'portion':
			$sql=$pdo->prepare('select * from product where product_name like ?');
			$sql->execute(['%'.$_REQUEST['keyword'].'%']);
			foreach ($sql as $row) {
			$id=$row['id'];
	echo '<div class="item">','<div class="img"><a href="detail.php?id=', $id, '"><img src="image/', htmlspecialchars($row['id']), '-1.png"class="detail_img"></a></div>','<br>';

	echo '<div class="name"><a href="detail.php?id=', $id, '">', htmlspecialchars($row['product_name']), '</a></div>','<p class="key">', htmlspecialchars($row['keywords']),'<div class="price"><span>価格</span>', htmlspecialchars($row['price']),'円','</div>','</div>';
			}
			break;

		default:
			break;
	}
} //-->

</div>
<?php require 'footer.html'; ?>