<?php //顧客データの現在の体重にレコード登録するのも追加?>
<?php include('./common/header.php');?>
<?php

try{
    require_once('./common/common.php');
    $post = sanitize($_POST);
    $weight = $post['weight'];
    $wh_date = $post['wh_date'];
    $record_datetime = date('Y/m/d H:i:s');
    $member_code = 'ggg';

    include('./common/db_login.php');
    
    $sql = 'INSERT INTO weight_history(record_datetime,wh_date,member_code,weight) VALUE (?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data = array($record_datetime,$wh_date,$member_code,$weight);
    $stmt->execute($data);
    
    $dbh = null;
    

}catch(Exception $e){
    
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();
    
}
?>

<p>体重を登録しました。</p>
<p><a href="weight_record.php">別日の体重を入力する。</a></p>

<?php include('./common/footer.php');?>