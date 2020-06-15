<?php include('./common/header.php');?>
<?php include('./common/mypage_header.php');?>

<div class="traininglog_main">
    <div id="training_timetable_top">
        <img src="img/body_upmate_logo_white.png">
    </div>
    
<?php

date_default_timezone_set('Asia/Tokyo');
$today = date('Y-m-d H:i:s');

try{
    include('./common/db_login.php');

    $sql = 'SELECT * FROM training_state WHERE training_datetime >= ?';
    $stmt = $dbh->prepare($sql);
    $data[] = $today;
    $stmt->execute($data);

    $dbh = null;
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(empty($rec)){
        echo '<div id="err_msg"><p>現在、ご予約いただけるトレーニングがありません。</p></div>';
    }
    
    while(true){
        
        if($rec==false){
            break;
        }
        
        echo<<<EOM
        <div class="training_wrap">
            <p class="training_datetime">{$rec['training_datetime']}</p>
            <p class="training_name">トレーニング名: {$rec['training_name']}</p>
            <p class="trainer">担当トレーナー: {$rec['trainer']}</p>
            <p class="training_discription">トレーニング詳細: {$rec['training_discription']}</p>
            <a class="training_link" href="training_discription.php?training_id={$rec['training_id']}">早速トレーニングを受ける</a>
        </div>
        EOM;
    }

}catch(Exception $e){
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    echo $sql;
    exit();
}
?>

</div>
    
<?php include('./common/footer.php');?>