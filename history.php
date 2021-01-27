<?php session_start(); ?>
<?php  require 'header.php'; ?>
<?php // require 'menu.php'; ?>
<link rel="stylesheet"type="text/css" href="css/style_history.css">

<div class="history">
<p>購入履歴</p>
</div>

<?php
if (isset($_SESSION['customer'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
		'root', '');
	$sql_purchase=$pdo->prepare(
		'select * from purchase where customer_id=? order by id desc');
	$sql_purchase->execute([$_SESSION['customer']['id']]);
	foreach ($sql_purchase as $row_purchase) {
		$sql_detail=$pdo->prepare(
			'select * from purchase_detail,product '.
			'where purchase_id=? and product_id=id');
		$sql_detail->execute([$row_purchase['id']]);
		echo '<table class="his_table">';
		echo '<tr class=""><th>商品番号</th><th>商品名</th>', 
			'<th>価格</th><th>個数</th><th>小計</th><th></th></tr>';
		$total=0;
		foreach ($sql_detail as $row_detail) {
				echo '<tr>';
				echo '<td>', $row_detail['id'], '</td>';
				echo '<td><a class="his_name" href="detail.php?id=', $row_detail['id'], '">', 
					$row_detail['product_name'], '</a></td>';
				echo '<td>', $row_detail['price'], '</td>';
				echo '<td>', $row_detail['count'], '</td>';
				if($row_detail['product_delete_flag']==0){
					$subtotal=$row_detail['price']*$row_detail['count'];
				}else{
					$subtotal=$row_detail['price']*0;
				}
				$total+=$subtotal;
				echo '<td>', $subtotal, '</td>';
				$id = $row_purchase['id'];
				if($row_detail['product_delete_flag']==0){
					echo '<td><a class="his_name" href="delete.php?id=', $id, '&B=', $row_detail['id'],'">キャンセル</a></td>';
				}else{
					echo '<td>キャンセルしました</td>';
				}
				echo '</tr>';
		}
		echo '<tr><td>合計</td><td></td><td></td><td></td><td>', 
			$total, '</td><td></td></tr>';
		echo '</table>';
	}
} else {
	echo '購入履歴を表示するには、ログインしてください。';
}
?>
<hr>
<div class="mypage">
<a href="mypage.php">マイページに戻る</a>
</div>

<?php require '../footer.php'; ?>
