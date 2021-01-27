<?php session_start()?>
<?php require 'header.php'; ?> 
	<link rel = "stylesheet" href="css/style_detail.css">
		<hr>
	<div class="one_main">
		<div class="item">
			<div class="one_container">


<?php //詳細ページ css二つかかっている
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'root', '');
$sql=$pdo->prepare('select * from product where id=?');
$sql->execute([$_REQUEST['id']]);

foreach ($sql as $row) {
	echo '<p class="one_item"><img src="image/', $row['id'], '-1.png" class = "image-photo"></p>';
	echo '<form action="cart_append.php" method="post" class = "nav">';
	echo '<div class="one_item" ><nav><h1 class="title">商品名：', $row['product_name'], '</h1>';
	echo '<h2 class="title_in">商品詳細</h2><p>', $row['syousai'], '</p>';
	echo '<p class="pce">個数：<select name="count">';
	for ($i=1; $i<=10; $i++) {
		echo '<option value="', $i, '">', $i, '</option>';
	}
	echo '</select></p>';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<input type="hidden" name="product_name" value="', $row['product_name'], '">';
	echo '<input type="hidden" name="price" value="', $row['price'], '">';
	echo '<input type="submit" value="カートに追加">';
	echo '</nav></div></form>';
}
?>



<hr class="xyz">
 </div>
</div>
<a href="syouhinnkensaku_only.php" class="return">戻る</a>
</div>
<?php require 'footer.html'; ?>
