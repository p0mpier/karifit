<?php include('./common/header.php');?>
<?php
try{
    $member_code = 'ggg';
    $weight_data[] = ['',''];
    
    include('./common/db_login.php');

    $sql = 'SELECT wh_date,weight FROM weight_history WHERE member_code=? ORDER BY wh_date ASC';
    $stmt = $dbh->prepare($sql);
    $data[] = $member_code;
    $stmt->execute($data);

    $dbh = null;
    
    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false){break;}
        $wh_date = date('m/d', strtotime($rec['wh_date']));
        $weight = (float)$rec['weight'];
        $weight_data[] = [$wh_date,$weight];
    }
    $weight_data = json_encode($weight_data);
    /* json_encodeされた二次元配列$weight_dataが必要 */
    /* 出力先 → <div id="weight_chart"></div> */
    include('./common/weight_chart.php');
    
}catch(Exception $e){

    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();

}

?>

<div id="weight_chart" style="width: 80%; height: 400px;"></div>

<?php include('./common/footer.php');?>