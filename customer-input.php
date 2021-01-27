<!-- <?php // require '../header.php'; ?>
<?php // require 'menu.php'; ?> -->
<div class="login">
<div class="center">新規会員登録</div>
<?php
echo '<form action="customer-confi.php" method="post">';
echo 'お名前<br>';
echo '<input type="text" name="name2">';
echo 'ご住所<br>';
echo '<input type="text" name="address2">';
echo '電話番号(ハイフンなし)<br>';
echo '<input type="text" name="tel2">';
echo 'メールアドレス<br>';
echo '<input type="text" name="mail2">';
echo 'ログイン名<br>';
echo '<input type="text" name="login2">';
echo 'パスワード<br>';
echo '<input type="password" name="password2">';

//変更点↓ 新規会員登録する際にdelete_flagに0を入力
echo '<input type="hidden" name="delete_flag2" value="0">';
echo '<br><br><div class="center"><input type="submit" value="確定"></div>';
echo '</form></div>';
?>
