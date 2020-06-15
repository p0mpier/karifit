<?php include('./common/header.php');?>
<?php

$karino = '4TEM6f3i';

try{
    include('./common/db_login.php');

    $sql = 'SELECT * FROM training_state WHERE training_id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $karino;
    $stmt->execute($data);

    $dbh = null;
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!empty($rec)){
        echo 'はいってます';
    }else{
        echo 'はいってません';
    }
    
}catch(Exception $e){

    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();

}

?>

<div id="weight_chart" style="width: 80%; height: 400px;"></div>

<?php include('./common/footer.php');?>