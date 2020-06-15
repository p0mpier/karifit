<?php include('./common/header.php');?>
<?php include('./common/mypage_header.php');?>
<?php

try{
    date_default_timezone_set('Asia/Tokyo');
    require_once('./common/common.php');

    $post = sanitize($_POST);
    $first_name = $post['first_name'];
    $last_name = $post['last_name'];
    $first_kana = $post['first_kana'];
    $last_kana = $post['last_kana'];
    $sex = $post['sex'];
    $birthday = $post['birthday'];
    $address = $post['address'];
    $bring = $post['bring'];
    $profession = $post['profession'];
    $workplace = $post['workplace'];
    $branch = $post['branch'];
    $department = $post['department'];
    $created = $post['created'];
    $current_course = $post['current_course'];
    $updated = date("Y/m/d H:i:s");
    $member_code = '56';
    
    include('./common/db_login.php');
    
    //トレーニングのセット
    $sql = 'UPDATE account_state SET last_name=?,first_name=?,last_kana=?,first_kana=?,sex=?,birthday=?,address=?,bring=?,profession=?,workplace=?,branch=?,department=?,updated=? WHERE member_code=?';
    $stmt = $dbh->prepare($sql);
    $data = array($last_name,$first_name,$last_kana,$first_kana,$sex,$birthday,$address,$bring,$profession,$workplace,$branch,$department,$updated,$member_code);
    $stmt->execute($data);
    
    $dbh = null;
    
    echo <<< EOM
    <div class="setting_main">

        <div id="client_status_wrap">
            
            <p id="client_status_title">登録情報</p>

            <div class="status_content">
                <p class="status_title">名前</p>
                <p>{$last_name} {$first_name}</p>
            </div>
            <div class="status_content">
                <p class="status_title">カナ</p>
                <p>{$last_kana} {$first_kana}</p>
            </div>
            <div class="status_content">
                <p class="status_title">性別</p>
                <p>{$sex}</p>
            </div>
            <div class="status_content">
                <p class="status_title">生年月日</p>
                <p>{$birthday}</p>
            </div>
            <div class="status_content">
                <p class="status_title">住所</p>
                <p>{$address}</p>
            </div>
            <div class="status_content">
                <p class="status_title">来店同期</p>
                <p>{$bring}</p>
            </div>
            <div class="status_content">
                <p class="status_title">職業</p>
                <p>{$profession}</p>
            </div>
            <div class="status_content">
                <p class="status_title">勤務先(任意)</p>
                <p>{$workplace}</p>
            </div>
            <div class="status_content">
                <p class="status_title">支店(任意)</p>
                <p>{$branch}</p>
            </div>
            <div class="status_content">
                <p class="status_title">部署(任意)</p>
                <p>{$department}</p>
            </div>
            <div class="status_content">
                <p class="status_title">初回登録日</p>
                <p>{$created}</p>
            </div>
            <div class="status_content">
                <p class="status_title">現在のコース</p>
                <p>{$current_course}</p>
            </div>
        </div>
        
        <p id="client_status_info">上記の内容で変更しました</p>
        
    </div>
EOM;
    

}catch(Exception $e){
    
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();
    
}
?>

<?php include('./common/footer.php');?>