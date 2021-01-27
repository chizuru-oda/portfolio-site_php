<?php require 'header.php'; ?>
<link rel="stylesheet"type="text/css" href="css/style_logout_output.css">

<!--<?php // require '../header.php'; ?>
<?php // require 'menu.php'; ?>-->
<?php
if (isset($_SESSION['customer'])) {
	$_SESSION["login"]="ログアウト済み";
	unset($_SESSION['customer']);
	echo '<div class="top"><p>ログアウトしました。</p></div>';
	echo "<hr>";
	echo '<div class="top"><a href="index.php">TOPへ戻る</a></div>';
} else {
	echo '<div class="top"><p>すでにログアウトしています。</p></div>';
	echo "<hr>";
	echo '<div class="top"><a href="index.php">TOPへ戻る</a></div>';
}
?>
<?php require '../footer.php'; ?>
