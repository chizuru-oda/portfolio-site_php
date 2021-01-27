<link rel="stylesheet"type="text/css" href="css/style_cart.css">

<?php
if (!empty($_SESSION['product'])) {
	echo '<table class="basket">';
	echo '<th>商品名</th>';
	echo '<th>価格</th><th>個数</th><th>小計</th><th></th>';
	$total=0;
	foreach ($_SESSION['product'] as $id=>$product) {
		echo '<tr>';
		echo '<td><a class="product" href="detail.php?id=', $id, '">', 
			$product['product_name'], '</a></td>';
		echo '<td>', $product['price'], '</td>';
		echo '<td>', $product['count'], '</td>';
		$subtotal=$product['price']*$product['count'];
		$total+=$subtotal;
		echo '<td>', $subtotal, '</td>';
		echo '<td><a class="product" href="cart_delete.php?id=', $id, '">削除</a></td>';
		echo '</tr>';
	}
	echo '<tr><td>合計</td><td></td><td></td><td>', $total, 
		'</td><td></td></tr>';
	echo '</table>';
		//住所　名前
	if(isset($_SESSION['customer'])){
	echo '<div class="address"><h1>発送先</h1>';
	echo "<hr>";
	echo '<p>お名前：', $_SESSION['customer']['name'], '</p>';
	echo '<p>ご住所：', $_SESSION['customer']['address'], '</p>';
	echo '<hr>';
	echo '<p>内容をご確認いただき、購入を確定してください。</p>';
	echo '<a class="confirm" href="purchase-output.php">購入を確定する</a></div>';
}else{
	echo '<br><div class="center topmargin">ログインしてからご購入ください。</div><br>';
	require 'login-input.php';
}


} else {
	echo '<hr><div class="center topmargin">カートに商品がありません。</div>';
}
?>