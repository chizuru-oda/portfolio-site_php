<?php session_start(); ?>
<?php require 'header.php'; ?>
<link rel="stylesheet"type="text/css" href="css/style_purchase-output.css">
<?php

$pdo=new PDO('mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_c8976bcf9ae44a9;charset=utf8', 'b7c1df1ac314ad', '0a80227c');
$sql=$pdo->prepare('update purchase_detail set product_delete_flag=1 where purchase_id=? and product_id=?');
$sql->execute([$_REQUEST['id'],$_REQUEST['B']]);
echo '<hr>';
echo '<div class="center topmargin">キャンセルが完了いたしました。</div>';
echo '</br>';
?>

<div class="center returnlink"><a href="history.php">購入履歴に戻る</a></div>
