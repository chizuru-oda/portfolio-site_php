<?php require 'header.php'; ?>
<link rel="stylesheet"type="text/css" href="css/style_purchase-output.css">
<?php

if(!isset($_SESSION)){
session_start();
}

?>
<?php
$pdo=new PDO('mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_c8976bcf9ae44a9;charset=utf8', 'b7c1df1ac314ad', '0a80227c');
$purchase_id=1;

foreach ($pdo->query('select max(id) from purchase') as $row) {
	$purchase_id=$row['max(id)']+1; //最新から表示
}
$sql=$pdo->prepare('insert into purchase values(?,?,?)');
if ($sql->execute([$purchase_id, $_SESSION['customer']['id'], date("Y/m/d H:i:s")])) {
	foreach ($_SESSION['product'] as $product_id=>$product) {
		$sql=$pdo->prepare('insert into purchase_detail values(?,?,?,0)');
		$sql->execute([$purchase_id, $product_id, $product['count']]);
	}
	unset($_SESSION['product']);

	//↑注文処理　↓注文番号等
	echo '<div class="main"><h1>発送先</h1>';
	echo '<hr>';
	echo '<p>お名前：', $_SESSION['customer']['name'], '</p>';
	echo '<p>ご住所：', $_SESSION['customer']['address'], '</p>';
	echo '<hr>';

	//会社情報
	echo '<p>遠堂</p>';
	echo "愛知県名古屋市中村区椿町21-2 第2太閤ビル5F<br>";

	echo "TEL:052-485-8407<br>";
	echo "FAX:052-485-8408<br>";

	echo 'この度は「遠堂」にてお買い上げいただき、ありがとうございました。</div>';



//購入履歴
if (isset($_SESSION['customer'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
		'root', '');
	$sql_purchase=$pdo->prepare(
		'select * from purchase where customer_id=? order by id ASC');
	$sql_purchase->execute([$_SESSION['customer']['id']]);

	echo '<div class="main"><h1>注文明細</h1>';
	echo '<hr>';
	// echo '<p>※キャンセルされたものについては、こちらに反映されません。</p>';
	echo '<table class="basket">';
	echo '<th>商品名</th>', 
		'<th>価格</th><th>個数</th><th>小計</th><th></th></tr>';
		$total=0;

	foreach ($sql_purchase as $row_purchase) {
}
		$sql_detail=$pdo->prepare(
			'select * from purchase_detail,product '.
			'where purchase_id=? and product_id=id');
		$sql_detail->execute([$row_purchase['id']]);
	foreach ($sql_detail as $row_detail) {

		echo '<div class="main"><tr>';
		echo '<td><a href="detail.php?id=', $row_detail['id'], '">', 
			$row_detail['product_name'], '</a></td>';
		echo '<td>', $row_detail['price'], '</td>';
		echo '<td>', $row_detail['count'], '</td>';
		$subtotal=$row_detail['price']*$row_detail['count'];
		$total+=$subtotal;
		echo '<td>', $subtotal, '</td>';
		$id = $row_purchase['id'];
		echo '<td></td>';
		echo '</tr></div>';
	}

	echo '<tr><td>合計</td><td></td><td></td><td></td><td>', 
		$total, '</td></tr>';
	echo '</table></div>';
	// echo '<hr>';

} else {
	echo '<div class="error">購入履歴を表示するには、ログインしてください。</div>';
	// echo '<hr>';
}



} else {
	echo '<div class="error">購入手続き中にエラーが発生しました。申し訳ございません。</div>';
}
?>

<?php require 'footer.html'; ?>


