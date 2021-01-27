<?php session_start()?>
<?php require 'header.php'; ?>
<link rel="stylesheet"type="text/css" href="css/style_purchase-output.css">
<?php
echo '<hr><div class="topmargin center">';
if (!isset($_SESSION['customer'])) {
	echo '購入手続きを行うにはログインしてください。';
} else 
if (empty($_SESSION['product'])) {
	echo 'カートに商品がありません。';
	echo '<div class="returnlink"><a href="syouhinnkensaku_only.php">商品一覧に戻る</a></div></div>';
} else {
	echo '<p>お名前：', $_SESSION['customer']['product_name'], '</p>';
	echo '<p>ご住所：', $_SESSION['customer']['address'], '</p>';
	echo '<hr>';
	require 'cart.php';
	echo '<hr>';
	echo '<p>内容をご確認いただき、購入を確定してください。</p>';
	echo '<a href="purchase-output.php">購入を確定する</a>';
}
?>
<?php require 'footer.html'; ?>
