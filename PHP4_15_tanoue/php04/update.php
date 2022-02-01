<?php
//1. POSTデータ取得
$b_name   = $_POST['b_name'];
$b_url  = $_POST['b_url'];
$b_comment = $_POST['b_comment'];
$id     = $_POST['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_bm_table SET b_name=:b_name,b_url=:b_url,b_comment=b_comment,WHERE id=:id;');
$stmt->bindValue(':b_name',   $b_name,   PDO::PARAM_STR);
$stmt->bindValue(':b_url',  $b_url,  PDO::PARAM_STR);
$stmt->bindValue(':b_comment', $b_comment, PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
