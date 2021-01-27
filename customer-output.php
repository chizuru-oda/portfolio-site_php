<?php session_start(); ?>
<!-- <?php // require '../header.php'; ?>
<?php // require 'menu.php'; ?> -->
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'root', '');
$sql=$pdo->prepare('select * from customer where login=?');
$sql->execute([$_REQUEST['login2']]);

$name=$_REQUEST['name2'];
$address=$_REQUEST['address2'];
$tel=$_REQUEST['tel2'];
$mail=$_REQUEST['mail2'];
$login=$_REQUEST['login2'];
$password=$_REQUEST['password2'];

//変更点↓ 新規会員登録する際にdelete_flagに0を入力
$delete_flag=$_REQUEST['delete_flag2'];

if (empty($sql->fetchAll())) {
	$sql=$pdo->prepare('insert into customer values(null,?,?,?,?,?,?,?)');
	if (preg_match('/^.+$/s',$name and $address and $tel and $mail and $login and $password)){
		$sql->execute([
			$_REQUEST['name2'], $_REQUEST['address2'], $_REQUEST['tel2'], $_REQUEST['mail2'],
			$_REQUEST['login2'], $_REQUEST['password2'], 
			//変更点↓ 新規会員登録する際にdelete_flagに0を入力
			 $_REQUEST['delete_flag2']]);
		$sql_login=$pdo->prepare('select * from customer where delete_flag=0 and login=? and password=?');
		$sql_login->execute([htmlspecialchars($_REQUEST['login2']), htmlspecialchars($_REQUEST['password2'])]);
		foreach ($sql_login as $row) {
			$_SESSION['customer']=[
			'id'=>$row['id'],
			'name'=>$row['name'], 
			'address'=>$row['address'],
			'login'=>$row['login'], 
			'password'=>$row['password'],
			'tel'=>$row['tel'],
			'mail'=>$row['mail']];
		}
	} else {
		echo '入力されていない項目があります。';
		echo "</br>";
		echo '会員登録情報をすべて入力してください。';
		echo "<hr>";
	require('signup_page.php');
	}
} else {
	echo 'ログイン名が既に使用されていますので、変更してください。';
	echo "<hr>";
	require('signup_page.php');
}

if (isset($_SESSION['customer'])) {
	$_SESSION["login"]="ログイン済み";
	require('mypage.php');
}
?>