<div class="mylink">
<link rel="stylesheet"type="text/css" href="css/style_mylink.css">
<?php
if(isset($_SESSION['customer'])){
	echo '<table>
<tr>
	<td><a href="customer-update.php"><img src="mypage_img/customer.png" alt="登録内容の確認・変更・退会"></a></td>
	<td><a href="history.php"><img src="mypage_img/purchase_detail.png" alt="購入履歴"></a></td>
	<td><a href="cartpage.php"><img src="mypage_img/cart.png" alt="カート"></a></td>
	<td><a href="logout-input.php"><img src="mypage_img/logout.png" alt="ログアウト"></a></td>	
</tr>
</table>';
}else{
	echo '<div class="error">ログインしてください</div>';
	require 'login-input.php';
}

?>
</div>