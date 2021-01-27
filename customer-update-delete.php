<link rel="stylesheet"type="text/css" href="style_customer-delete.css">


<?php session_start(); ?>
<!--<?php // require '../header.php'; ?>
<?php // require 'menu.php'; ?>-->
<?php

$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'root', '');
$sql=$pdo->prepare('update customer set delete_flag=1 where id=?');
$sql->execute([$_REQUEST['id']]);

unset($_SESSION['customer']);

echo "<div class='text'><p>退会が完了いたしました。</p></div>";
echo '<hr>';
?>

<div class='text'><p><a href="index.php">TOPに戻る</a></p></div>