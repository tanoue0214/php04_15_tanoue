<?php
//1. POSTデータ取得
$b_name   = $_POST['b_name'];
$b_url  = $_POST['b_url'];
$b_comment = $_POST['b_comment'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_bm_table(b_name,b_url,b_comment,datetime)VALUES(:b_name,:b_url,:b_comment,sysdate());');
$stmt->bindValue(':b_name', $b_name, PDO::PARAM_STR);
$stmt->bindValue(':b_url', $b_url, PDO::PARAM_STR);
$stmt->bindValue(':b_comment', $b_comment, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
