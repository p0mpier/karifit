<?php include('./common/header.php');?>
<?php include('./common/mypage_header.php');?>
<?php
try{
    
$member_code = '56';

include('./common/db_login.php');

$sql = 'SELECT * FROM account_state WHERE member_code=?';
$stmt = $dbh->prepare($sql);
$data[] = $member_code;
$stmt->execute($data);

$dbh = null;

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$birthday = date('Y年m月d日',strtotime($rec['birthday']));
$created = date('Y年m月d日',strtotime($rec['created']));

echo <<< EOM
<div class="setting_main">
    
    <div id="client_status_wrap">
        
        <p id="client_status_title">登録情報</p>
        
        <div class="status_content">
            <p class="status_title">名前</p>
            <p>{$rec['last_name']} {$rec['first_name']}</p>
        </div>
        <div class="status_content">
            <p class="status_title">カナ</p>
            <p>{$rec['last_kana']} {$rec['first_kana']}</p>
        </div>
        <div class="status_content">
            <p class="status_title">性別</p>
            <p>{$rec['sex']}</p>
        </div>
        <div class="status_content">
            <p class="status_title">生年月日</p>
            <p>{$birthday}</p>
        </div>
        <div class="status_content">
            <p class="status_title">住所</p>
            <p>{$rec['address']}</p>
        </div>
        <div class="status_content">
            <p class="status_title">来店同期</p>
            <p>{$rec['bring']}</p>
        </div>
        <div class="status_content">
            <p class="status_title">職業</p>
            <p>{$rec['profession']}</p>
        </div>
        <div class="status_content">
            <p class="status_title">勤務先(任意)</p>
            <p>{$rec['workplace']}</p>
        </div>
        <div class="status_content">
            <p class="status_title">支店(任意)</p>
            <p>{$rec['branch']}</p>
        </div>
        <div class="status_content">
            <p class="status_title">部署(任意)</p>
            <p>{$rec['department']}</p>
        </div>
        <div class="status_content">
            <p class="status_title">初回登録日</p>
            <p>{$created}</p>
        </div>
        <div class="status_content">
            <p class="status_title">現在のコース</p>
            <p>{$rec['current_course']}</p>
        </div>
    </div>
    
    <a id="client_status_btn" href="mysetting_edit.php">編集</a>
</div>
EOM;

}catch(Exception $e){

    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();

}

?>

<?php include('./common/footer.php');?>