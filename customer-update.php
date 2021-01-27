<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php // require 'menu.php'; ?>
<div class="update">
<div class="login">
<div class="center">登録内容の確認・変更・退会</div>

<?php
$name=$address=$login=$password=$tel=$mail='';
if (isset($_SESSION['customer'])) {
	$id=$_SESSION['customer']['id'];
	$name=$_SESSION['customer']['name'];
	$address=$_SESSION['customer']['address'];
	$login=$_SESSION['customer']['login'];
	$password=$_SESSION['customer']['password'];
	$tel=$_SESSION['customer']['tel'];
	$mail=$_SESSION['customer']['mail'];
echo '<form action="customer-update-confi.php" method="post">';
echo 'お名前<br>';
echo '<input type="text" name="name" value="', $name, '">';
echo 'ご住所';
echo '<input type="text" name="address" value="', $address, '">';
echo 'ログイン名';
echo '<input type="text" name="login" value="', $login, '">';
echo 'パスワード';
echo '<input type="password" name="password" value="', $password, '">';
echo '電話番号(ハイフンなし)';
echo '<input type="text" name="tel" value="', $tel, '">※半角数字で入力してください。';
echo 'メールアドレス';
echo '<input type="text" name="mail" value="', $mail, '">';
echo '<div class="center"><br><input type="submit" value="変更">';
echo '</form>';
echo '<br><br><a href="customer-update-delete.php?id=', $id, '" class="csslink2">退会</a></div>';
}else{
	echo '<div class="error">ログインしてください</div>';
	require 'login-input.php';
}
?>
</div></div>
<!--<?php // require '../footer.php'; ?>-->