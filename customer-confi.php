<link rel="stylesheet"type="text/css" href="css/style_customer-confi.css">

<?php
echo '<p>以下の情報で新規登録します</p>';
echo "<hr>";
echo '<table class="main"><tr><td>名前</td>' . '<td>' . $_REQUEST['name2'] . '</td></tr>';
echo '<tr><td>住所</td>' . '<td>' . $_REQUEST['address2'] . '</td></tr>';
echo '<tr><td>電話番号</td>' . '<td>' . $_REQUEST['tel2'] . '</td></tr>';
echo '<tr><td>メールアドレス</td>' . '<td>' . $_REQUEST['mail2'] . '</td></tr>';
echo '<tr><td>ログイン名</td>' . '<td>' . $_REQUEST['login2'] . '</td></tr>';
echo '<tr><td>パスワード</td>' . '<td>' . $_REQUEST['password2'] . '</td></tr></table>';


$name=$_REQUEST['name2'];
$address=$_REQUEST['address2'];
$tel=$_REQUEST['tel2'];
$mail=$_REQUEST['mail2'];
$login=$_REQUEST['login2'];
$password=$_REQUEST['password2'];

echo '<form action="customer-output.php" method="post">';
echo '<input type="hidden" name="name2" value="', $name, '">';
echo '<input type="hidden" name="address2" value="', $address, '">';
echo '<input type="hidden" name="tel2" value="', $tel, '">';
echo '<input type="hidden" name="mail2" value="', $mail, '">';
echo '<input type="hidden" name="login2" value="', $login, '">';
echo '<input type="hidden" name="password2" value="', $password, '">';
echo '<input type="hidden" name="delete_flag2" value="0">';
echo '<br>';
echo '<div class="login"><input type="submit" value="確定"></div>';
echo '</form></div>';
echo "<hr>";
echo '<div class="return"><a href="signup_page.php">新規会員登録画面に戻る</a><div>'
?>