<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php // require 'menu.php'; ?> 
<?php
unset($_SESSION['customer']);
$pdo=new PDO('mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_c8976bcf9ae44a9;charset=utf8', 'b7c1df1ac314ad', '0a80227c');
$sql=$pdo->prepare('select * from customer where delete_flag=0 and login=? and password=?');
$sql->execute([htmlspecialchars($_REQUEST['login']), htmlspecialchars($_REQUEST['password'])]);
foreach ($sql as $row) {
	$_SESSION['customer']=[
		'id'=>$row['id'],
		'name'=>$row['name'], 
		'address'=>$row['address'],
		'login'=>$row['login'], 
		'password'=>$row['password'],
		'tel'=>$row['tel'],
		'mail'=>$row['mail']];
}
if (isset($_SESSION['customer'])) {
	$_SESSION["login"]="ログイン済み";
	require('mylink.php');
} else {
	echo '<div class="error">ログイン名またはパスワードが違います。';
	echo "</br>";
	echo '(退会をされた方は再度、新規会員登録を行なってください。)</div>';
	require('login-input.php');
}
?>
<!--<?php // require '../footer.php'; ?>-->
