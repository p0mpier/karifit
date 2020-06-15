<?php include('./common/header.php');?>
<?php include('./common/staff_kanri_header.php');?>

<?php

try{
    require_once('./common/common.php');

    $post = sanitize($_POST);
    $training_name = $post['training_name'];
    $training_discription = $post['training_discription'];
    $training_datetime = $post['training_datetime'];
    $trainer = $post['trainer'];
    $parsonal_check = $post['parsonal_check'];
    $zoom_url = $post['zoom_url'];
    $zoom_id = $post['zoom_id'];
    $zoom_password = $post['zoom_password'];
    $created = date("Y/m/d H:i:s");
    $updated = date("Y/m/d H:i:s");
    $training_id = rnd_str(8);
    
    include('./common/db_login.php');
    
    //トレーニングIDの重複チェック
    while(true){
        $sql = 'SELECT * FROM training_state WHERE training_id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $training_id;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($rec)){
            $training_id = rnd_str(8);
        }else{
            break;
        }
    }
    
    //トレーニングのセット
    $sql = 'INSERT INTO training_state(training_name,training_discription,training_id,training_datetime,trainer,parsonal_check,zoom_url,zoom_id,zoom_password,created,updated) VALUE (?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data = array($training_name,$training_discription,$training_id,$training_datetime,$trainer,$parsonal_check,$zoom_url,$zoom_id,$zoom_password,$created,$updated);
    $stmt->execute($data);
    
    $dbh = null;
    

}catch(Exception $e){
    
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();
    
}
?>

<div id="training_add_done" class="main_area">
    <p>トレーニングを登録しました。</p>
    <a href="training_add.php">別のトレーニングを登録する</a>
    <a href="training_top.php">トレーニング管理トップへ戻る</a>
</div>

<?php include('./common/footer.php');?>