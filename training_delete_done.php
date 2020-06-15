<?php include('./common/header.php');?>
<?php

try{
    require_once('./common/common.php');

    $post = sanitize($_POST);
    $training_id = $post['training_id'];
    
    include('./common/db_login.php');
    
    $sql = 'DELETE FROM training_state WHERE training_id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $training_id;
    $stmt->execute($data);
    
    $dbh = null;
    

}catch(Exception $e){
    
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();
    
}
?>

<p>トレーニングを削除しました。</p>
<a href="training_add.php">別のトレーニングを登録する。</a>
<a href="training_top.php">トレーニング管理トップへ戻る</a>
<a href="staff_kanri.php">管理画面トップへ戻る</a>

<?php include('./common/footer.php');?>