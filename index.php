<?php session_start()?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>遠堂</title>
		<link rel="stylesheet" type="text/css" href="style2.css">
		<!-- Google Hosted LibrariesからjQuery取得 -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- ▲ローカルに保存したjQuery本体へのリンクでももちろんOK -->
		<link rel="shortcut icon" href="image/favicon.ico">
	    <link rel="apple-touch-icon" href="image/apple-touch-icon.png">
	    <link rel="icon" type="image/png" href="image/android-chrome-256x256.png">
		</head>
	<body>
		<div class="wrapper">
			<div class="topflex">
				<div class="menu2">
					<div class="title2 hover">
						<a href="index.php"><img src="image/title.png"></a>
					</div>
					<div class="navi2">
						<ul>
							<?php
							if(!isset($_SESSION['customer'])){
								echo '<li><a href="login-page.php" class="csslink">ログイン</a></li>
							<li><a href="signup_page.php" class="csslink">新規登録</a></li>';
							}
							?>
							<?php
							if(isset($_SESSION['customer'])){
								echo '<li><a href="logout-input.php" class="csslink">ログアウト</a></li>';
							}
							?>
							<li><a href="mypage.php" class="csslink">マイページ</a></li>
							<li><a href="product_list.php" class="csslink">商品一覧</a></li>
							<li><a href="cartpage.php" class="csslink">カート</a></li>
							<?php
							if(isset($_SESSION['customer'])){
								echo '<li><a href="history.php" class="csslink">購入履歴</a></li>';
							}
							?>
						</ul>
					</div>
				</div>
				<div class="topimg topfleximg">
					<img src="topimage.jpeg">
				</div>
			</div>

</div>

<div class="topflex">
	<div class="aboutimg"><img src="aboutimg.jpeg"></div>
	<div class="abouttext" id="fadein"><span>一</span>皿の料理のような一粒を。<br>他にはない厳選した材料から作られる、特別な一粒をお届けします。</div>
</div>
<script>
<!--
$('#fadein').css('visibility','hidden');
$(window).scroll(function(){
	var windowHeight = $(window).height(),
	topWindow = $(window).scrollTop();
	$('#fadein').each(function(){
		var targetPosition = $(this).offset().top;
		if(topWindow > targetPosition - windowHeight + 200){
			$(this).addClass("fadeInDown");
		}
	});
});
//-->
</script>
<div class="subtitle">
<a href="product_list.php" class="csslink3">商品一覧</a>
</div>
<div class="topprd">
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'root', '');
$product=$pdo->query('select * from product');
$i=1;
foreach ($product as $row) {
	if($i >= 7){
        break;
    }
	echo '<div class="topprd-item itemheight',$i,'"><a href="detail.php?id=',$i,'"><img src="image/',$row['id'],'-1.png" class="hover"><br><div class="topprd-title">',$row['product_name'],'</a></div></div>';
	$i++;
}
?>
</div>
<?php require 'footer.html'?>