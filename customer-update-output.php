<link rel="stylesheet"type="text/css" href="style_customer-update-output.css">

<?php session_start(); ?>
<!--<?php // require '../header.php'; ?>
<?php // require 'menu.php'; ?>-->
<?php
$pdo=new PDO('mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_c8976bcf9ae44a9;charset=utf8', 'b7c1df1ac314ad', '0a80227c');

$id=$_SESSION['customer']['id'];
$sql=$pdo->prepare('select * from customer where id!=? and login=?');
$sql->execute([$id, $_REQUEST['login']]);

$name=$_REQUEST['name'];
$address=$_REQUEST['address'];
$login=$_REQUEST['login'];
$password=$_REQUEST['password'];
$tel=$_REQUEST['tel'];
$mail=$_REQUEST['mail'];

if (empty($sql->fetchAll())) {
	$sql=$pdo->prepare('update customer set name=?, address=?, '.
		'login=?, password=?, tel=?, mail=? where id=?');
	if (preg_match('/^.+$/s',$name and $address and $login and $password and $tel and $mail)){
		$sql->execute([
			$_REQUEST['name'], $_REQUEST['address'], 
			$_REQUEST['login'], $_REQUEST['password'], $_REQUEST['tel'], $_REQUEST['mail'], $id]);
		$_SESSION['customer']=[
			'id'=>$id, 'name'=>$_REQUEST['name'], 
			'address'=>$_REQUEST['address'], 'login'=>$_REQUEST['login'], 
			'password'=>$_REQUEST['password'], 'tel'=>$_REQUEST['tel'], 'mail'=>$_REQUEST['mail']];
		echo '<div class="top"><p>お客様情報を更新しました。</p></div>';
		echo '<hr>';
		echo '<div class="top"><a href="customer-update.php">登録内容の確認・変更・退会に戻る</a></div>';
	} else {
		echo '<div class="top"><p>入力されていない項目があります。</p></div>';
		echo '<div class="top"><p>会員登録情報をすべて入力してください。</p></div>';
		echo '<hr>';
		echo '<div class="top"><a href="customer-update.php">登録内容の確認・変更・退会に戻る</a></div>';
	}
} else {
	echo '<div class="top"><p>ログイン名がすでに使用されていますので、変更してください。</p></div>';
	echo '<hr>';
	echo '<div class="top"><a href="customer-update.php">登録内容の確認・変更・退会に戻る</a></div>';
}
?>
<!--<?php // require '../footer.php'; ?>-->
