<!DOCTYPE html>
<?php

if(!isset($_SESSION)){
session_start();
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>遠堂</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
		<!-- Google Hosted LibrariesからjQuery取得 -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- ▲ローカルに保存したjQuery本体へのリンクでももちろんOK -->
		<link rel="shortcut icon" href="image/favicon.ico">
	    <link rel="apple-touch-icon" href="image/apple-touch-icon.png">
	    <link rel="icon" type="image/png" href="image/android-chrome-256x256.png">
		</head>
	<body>
		<div class="wrapper">
			<header>
			<div class="fix-menu">
				<div class="menu">
					<div class="title hover">
						<a href="index.php"><img src="logo.png"></a>
					</div>
					<div class="navi">
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
			</div>
			</header>
		</div>
		<main>