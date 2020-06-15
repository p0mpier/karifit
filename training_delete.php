<?php include('./common/header.php');?>
<?php
try{

    $training_id = $_GET['training_id'];

    include('./common/db_login.php');

    $sql = 'SELECT * FROM training_state WHERE training_id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $training_id;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $dbh = null;
    
    $training_name = $rec['training_name'];
    $training_discription = $rec['training_discription'];
    $training_datetime = $rec['training_datetime'];
    $trainer = $rec['trainer'];
    $parsonal_check = $rec['parsonal_check'];
    $zoom_url = $rec['zoom_url'];
    $zoom_id = $rec['zoom_id'];
    $zoom_password = $rec['zoom_password'];


}catch(Exception $e){
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();
}
?>

<form method="post" action="training_delete_done.php">
    <p>トレーニング名</p>
    <input type="text" name="training_name" value="<?php print $training_name;?>">
    <p>詳細</p>
    <input type="text" name="training_discription" value="<?php print $training_discription;?>">
    <p>開催日時</p>
    <input type="text" name="training_datetime" value="<?php print $training_datetime;?>">
    <p>担当トレーナー</p>
    <input type="text" name="trainer" value="<?php print $trainer;?>">
    <p>パーソナル</p>
    <input type="text" name="parsonal_check" value="<?php print $parsonal_check;?>">
    <p>ZOOM URL</p>
    <input type="text" name="zoom_url" value="<?php print $zoom_url;?>">
    <p>ZOOM ID</p>
    <input type="text" name="zoom_id" value="<?php print $zoom_id;?>">
    <p>ZOOM PASSWORD</p>
    <input type="text" name="zoom_password" value="<?php print $zoom_password;?>">
    <input type="hidden" name="training_id" value="<?php print $training_id;?>">
    <input type="submit" value="OK">
</form>

<?php include('./common/footer.php');?>