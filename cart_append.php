<?php require 'header.php'; ?>
<link rel="stylesheet"type="text/css" href="css/style_cart.css">
<?php

if(!isset($_SESSION)){
session_start();
}

?>
<?php
$id=$_REQUEST['id'];
if (!isset($_SESSION['product'])) {
	$_SESSION['product']=[]; //productという空の箱を用意している
}
$count=0;
if (isset($_SESSION['product'][$id])) {
	$count=$_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=[ //3次元配列　productの→idの→箱
	'product_name'=>$_REQUEST['product_name'], 
	'price'=>$_REQUEST['price'], 
	'count'=>$count+$_REQUEST['count'] //↑countは、選択した個数がはいる　　　　sessionに入れると情報は消えない
];
echo '<div class="center topmargin"><p>カートに商品を追加しました。</p>';
echo '<div class="returnlink"><a href="syouhinnkensaku_only.php">商品一覧に戻る</a></div>';
echo '<hr>';
require 'cart.php';

?>
<!-- <?php require 'footer.php'; ?> -->
