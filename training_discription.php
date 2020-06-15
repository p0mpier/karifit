<?php include('./common/header.php');?>
<?php include('./common/mypage_header.php');?>

<?php
try{

date_default_timezone_set('Asia/Tokyo');
$training_id =$_GET['training_id'];
    
include('./common/db_login.php');

$sql = 'SELECT * FROM training_state WHERE training_id=?';
$stmt = $dbh->prepare($sql);
$data[] = $training_id;
$stmt->execute($data);

$dbh = null;

//トレーニング日時をフォーマット
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$training_datetime = date('Y年m月d日 H時i分',strtotime($rec['training_datetime']));
    
//現在の時刻と予定日を照らし合わせて何時間差分かを判断
$from = strtotime($rec['training_datetime']);
$to = time();
$diff_time = ($to - $from)/60;
if($diff_time>=-60){
    $time_check = true;
}else{
    $time_check = false;
}

echo <<< EOM
<div class="trainingdiscription_main">

    <div id="training_timetable_top">
        <img src="img/body_upmate_logo_white.png">
    </div>
    
    <div id="discription_wrap">
        <p id="training_datetime">{$training_datetime}</p>
        <p id="training_name">トレーニング名: {$rec['training_name']}</p>
        <p id="trainer">担当トレーナー: {$rec['trainer']}</p>
        <p id="training_discription">トレーニング詳細: {$rec['training_discription']}</p>
EOM;
        
if($time_check==true){
    echo <<<EOM
        <p id="zoom_url">ZOOM URL: {$rec['zoom_url']}></p>
        <p id="zoom_id">ZOOM ID: {$rec['zoom_id']}</p>
        <p id="zoom_pass">ZOOM PASS: {$rec['zoom_password']}</p>
        <a id="zoom_start" href="{$rec['zoom_url']}">ZOOMを起動する</a>
EOM;
}else{
    echo <<< EOM
        <p id="training_warning">現在トレーニングのURLを発行できません。<br>開始時間1時間前にもう一度お試し下さい。</p>
EOM;
}

echo <<< EOM
        </div>
    </div>
EOM;
    
}catch(Exception $e){

    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();

}
?>
    
<?php include('./common/footer.php');?>