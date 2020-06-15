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
        
        <form method="post" action="mysetting_edit_done.php">
            <div class="status_content_edit">
                <p class="status_title">名前(姓)</p>
                <input type="text" name="last_name" value="{$rec['last_name']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">名前(名)</p>
                <input type="text" name="first_name" value="{$rec['first_name']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">カナ(姓)</p>
                <input type="text" name="last_kana" value="{$rec['last_kana']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">カナ(名)</p>
                <input type="text" name="first_kana" value="{$rec['first_kana']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">性別</p>
                <input type="text" name="sex" value="{$rec['sex']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">生年月日</p>
                <input type="date" name="birthday" value="{$rec['birthday']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">住所</p>
                <input type="text" name="address" value="{$rec['address']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">来店同期</p>
                <input type="text" name="bring" value="{$rec['bring']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">職業</p>
                <input type="text" name="profession" value="{$rec['profession']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">勤務先(任意)</p>
                <input type="text" name="workplace" value="{$rec['workplace']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">支店(任意)</p>
                <input type="text" name="branch" value="{$rec['branch']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">部署(任意)</p>
                <input type="text" name="department" value="{$rec['department']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">初回登録日</p>
                <p>{$created}</p>
                <input type="hidden" name="created" value="{$rec['created']}">
            </div>
            <div class="status_content_edit">
                <p class="status_title">現在のコース</p>
                <p>{$rec['current_course']}</p>
                <input type="hidden" name="current_course" value="{$rec['current_course']}">
            </div>
            <input type="submit" id="client_status_submit_btn" value="編集する">
        </form>
    </div>
</div>
<?php include('./common/footer.php');?>

EOM;

}catch(Exception $e){

    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();

}

?>

<?php include('./common/footer.php');?>