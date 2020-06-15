<?php include('./common/header.php');?>
<?php include('./common/staff_kanri_header.php');?>

<?php
    
try{
    
    date_default_timezone_set('Asia/Tokyo');
    $today = date('Y-m-d H:i:s');
    
    echo '<div id="training_top" class="main_area">';
    echo '<a href="training_add.php">トレーニングを登録する</a>';

    include('./common/db_login.php');

    $sql = 'SELECT * FROM training_state WHERE training_datetime >= ?';
    $stmt = $dbh->prepare($sql);
    $data[] = $today;
    $stmt->execute($data);

    $dbh = null;

    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($rec==false){
            break;
        }
        
        echo <<<EOM
        <div class="training_info_wrap">
            <p>[トレーニング名]<br>{$rec['training_name']}</p>
            <p><br>[詳細] -----<br>{$rec['training_discription']}<br>------------</p>
            <p>ID：{$rec['training_id']}</p>
            <p>日時：{$rec['training_datetime']}</p>
            <p>担当トレーナー：{$rec['trainer']}</p>
            <p>-----<br>ZOOM URL：{$rec['zoom_url']}</p>
            <p>ZOOM ID：{$rec['zoom_id']}</p>
            <p>ZOOM PASSWORD：{$rec['zoom_password']}<br>-----</p>
            <p>最終更新日：{$rec['updated']}</p>
            <div class="training_info_btn_wrap">
                <a href="training_edit.php?training_id={$rec['training_id']}">編集</a>
                <a href="training_delete.php?training_id={$rec['training_id']}">削除</a>
            </div>
        </div>
        EOM;
        
    }
    echo '</div><!--#training_top .main_area END-->';

}catch(Exception $e){
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();
}
?>

<?php include('./common/footer.php');?>