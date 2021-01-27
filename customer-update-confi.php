<link rel="stylesheet"type="text/css" href="css/style_customer-update-confi.css">

<?php
echo '<p>以下の情報で登録情報を変更致します</p>';
echo "<hr>";
echo '<table class="main"><tr><td>名前</td>' . '<td>'  . htmlspecialchars($_REQUEST['name']) . '</td></tr>';
echo '<tr><td>住所</td>' . '<td>'  . htmlspecialchars($_REQUEST['address']) . '</td></tr>';
echo '<tr><td>電話番号</td>' . '<td>'  . htmlspecialchars($_REQUEST['tel']) . '</td></tr>';
echo '<tr><td>メールアドレス</td>' . '<td>'  . htmlspecialchars($_REQUEST['mail']) . '</td></tr>';
echo '<tr><td>ログイン名</td>' . '<td>'  . htmlspecialchars($_REQUEST['login']) . '</td></tr>';
echo '<tr><td>パスワード</td>' . '<td>'  . htmlspecialchars($_REQUEST['password']) . '</td></tr></table>';

$name=$_REQUEST['name'];
$address=$_REQUEST['address'];
$tel=$_REQUEST['tel'];
$mail=$_REQUEST['mail'];
$login=$_REQUEST['login'];
$password=$_REQUEST['password'];

echo '<form action="customer-update-output.php" method="post">';
echo '<input type="hidden" name="name" value="', $name, '">';
echo '<input type="hidden" name="address" value="', $address, '">';
echo '<input type="hidden" name="tel" value="', $tel, '">';
echo '<input type="hidden" name="mail" value="', $mail, '">';
echo '<input type="hidden" name="login" value="', $login, '">';
echo '<input type="hidden" name="password" value="', $password, '">';
echo '<input type="hidden" name="delete_flag" value="0">';
echo '<div class="login"><input type="submit" value="確定"></div>';
echo '</form>';
echo "<hr>";
echo '<div class="return"><a href="customer-input.php">登録内容の確認・変更・退会に戻る</a></div>'
?>