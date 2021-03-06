/*kont*/
<?php

//現在あるレコード数を取得
$sql = 'SELECT COUNT(*) FROM account_state';
$i2 = $dbh->query($sql)->fetchColumn();

//現在ある最後のレコードにあるidを取得
$sql = 'SELECT id FROM account_state WHERE id=(SELECT MAX(id) FROM account_state)';
$i3 = $dbh->query($sql)->fetchColumn();

//ポスト→サニタイズまで
require_once('./common/common.php');
$post = sanitize($_POST);


//DB呼び出しから終了まで
include('./common/db_login.php');

$sql = %%%;
$stmt = $dbh->prepare($sql);
$data[] = %%%;
$stmt->execute($data);

$dbh = null;


//try catch文
try{
    
    
    
}catch(Exception $e){

    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();

}

//OR これでも可
$sql = %%%;
$stmt = $dbh->prepare($sql);
$stmt->execute();


//INSERT文
$sql = 'INSERT INTO weight_history(record_datetime,wh_date,member_code,weight) VALUE (?,?,?,?)';
$stmt = $dbh->prepare($sql);
$data = array($record_datetime,$wh_date,$member_code,$weight);
$stmt->execute($data);


//SELECT文
$sql = 'SELECT * FROM training_state WHERE training_id=?';
$stmt = $dbh->prepare($sql);
$data[] = $training_id;
$stmt->execute($data);


//UPDATE文
$sql = 'UPDATE training_state SET training_name=?,training_discription=?,training_datetime=? WHERE training_id=?';
$stmt = $dbh->prepare($sql);
$data = array($training_name,$training_discription,$training_datetime,$training_id);
$stmt->execute($data);


//DELETE文
$sql = 'DELETE FROM training_state WHERE training_id=?';
$stmt = $dbh->prepare($sql);
$data[] = $training_id;
$stmt->execute($data);


//もらったデータをレコードに落とし込む
$rec = $stmt->fetch(PDO::FETCH_ASSOC);


//期日の割り出し
$from = new Datetime($rec['goal_date']);
$interval = $from->diff(new DateTime('now'));
$goal_date = $interval->format('%a');


//グラフに起こす
/* json_encodeされた二次元配列$weight_dataが必要 */
/* 出力先 → <div id="weight_chart"></div> */
include('./common/weight_chart.php');

?>
