<?php

if(!isset($_SESSION)){
session_start();
}

?>
<?php require 'header.php'; ?>
<?php

unset($_SESSION['product'][$_REQUEST['id']]);
echo '<div class="topmargin center">カートから商品を削除しました。</div>';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.html'; ?>
