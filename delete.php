<?php session_start(); ?>
<?php require 'header.php'; ?>
<link rel="stylesheet"type="text/css" href="css/style_purchase-output.css">
<?php

$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'root', '');
$sql=$pdo->prepare('update purchase_detail set product_delete_flag=1 where purchase_id=? and product_id=?');
$sql->execute([$_REQUEST['id'],$_REQUEST['B']]);
echo '<hr>';
echo '<div class="center topmargin">キャンセルが完了いたしました。</div>';
echo '</br>';
?>

<div class="center returnlink"><a href="history.php">購入履歴に戻る</a></div>