<?php session_start(); ?>

<?php

try {
    $pdo=new PDO('mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_c8976bcf9ae44a9;charset=utf8', 'b7c1df1ac314ad', '0a80227c');
  $sql=$pdo->query('select id,product_name,price,keywords from product order by price desc');

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
