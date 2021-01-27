<?php session_start()?>
<?php require 'header.php'; ?>
<?php
if(isset($_SESSION['customer'])){
	echo '<div class="center topmargin">';
	echo $_SESSION['customer']['name'] . 'さん';
	echo "</br>";
	echo 'ログアウトしますか？';
	echo "</br>";
	echo '<br><a href="logout-output.php" class="csslink">ログアウト</a></div>';
}else{
	echo '<div class="center">ようこそゲストさん';
	echo "</br>";
	echo '会員登録がされていません。</div>';
	require('customer-input.php');
}
?>

<?php require '../footer.php'; ?>
