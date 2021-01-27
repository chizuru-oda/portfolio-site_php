<?php session_start(); ?>

<?php

try {
    $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
  'root', '');
  $sql=$pdo->prepare('select id,product_name,price,keywords from product where product_name like ? order by price desc');
  $sql->execute(['%'.$_SESSION['keyword'].'%']);

    // 問い合わせ結果を配列に格納
    while ($row = $sql->fetch(PDO::FETCH_BOTH)) {
        $kekka[] = array(
                      "id"=>$row[0],
                      "product_name"=>$row[1],
                      "price"=>$row[2],
                  	  "keywords"=>$row[3]);
    }
    echo json_encode($kekka,JSON_UNESCAPED_UNICODE);  // 配列などの値をJSON形式にした文字列で返す
} catch (PDOException $e) {
    echo 'ERROR:'.$e->getMessage();
    die();
}
?>