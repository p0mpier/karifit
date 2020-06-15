<?php include('./common/header.php');?>
<?php

try{
    require_once('./common/common.php');

    $post = sanitize($_POST);
    $training_name = $post['training_name'];
    $training_discription = $post['training_discription'];
    $training_id = $post['training_id'];
    $training_datetime = $post['training_datetime'];
    $trainer = $post['trainer'];
    $parsonal_check = $post['parsonal_check'];
    $zoom_url = $post['zoom_url'];
    $zoom_id = $post['zoom_id'];
    $zoom_password = $post['zoom_password'];
    $updated = date("Y/m/d H:i:s");
    
    include('./common/db_login.php');
    
    $sql = 'UPDATE training_state SET training_name=?,training_discription=?,training_datetime=?,trainer=?,parsonal_check=?,zoom_url=?,zoom_id=?,zoom_password=?,updated=? WHERE training_id=?';
    $stmt = $dbh->prepare($sql);
    $data = array($training_name,$training_discription,$training_datetime,$trainer,$parsonal_check,$zoom_url,$zoom_id,$zoom_password,$updated,$training_id);
    $stmt->execute($data);
    
    $dbh = null;
    

}catch(Exception $e){
    
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();
    
}
?>

<p>トレーニングを編集しました。</p>
<a href="training_add.php">別のトレーニングを登録する。</a>
<a href="training_top.php">トレーニング管理トップへ戻る</a>
<a href="staff_kanri.php">管理画面トップへ戻る</a>

<?php include('./common/footer.php');?>