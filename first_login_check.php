<?php include('./common/header.php'); ?>

<div id="first_login_check" class="main_area">

<?php

require_once('./common/common.php');

$post = sanitize($_POST);
$mail = $post['mail'];
$password = $post['password'];
$password2 = $post['password2'];
$last_name = $post['last_name'];
$first_name = $post['first_name'];
$last_kana = $post['last_kana'];
$first_kana = $post['first_kana'];
$sex = $post['sex'];
$birthday = $post['birthday'];
$address = $post['address'];
$bring = $post['bring'];
$profession = $post['profession'];
$workplace = $post['workplace'];
$branch = $post['branch'];
$department = $post['department'];
$information ='';
$check_counter = 0;


// 入力チェック
if($mail==''){
    $information .= '<p class="alt_info">メールアドレスを入力してください</p>';
    $check_counter++;
}

if($password==''||$password2==''){
    $information .= '<p class="alt_info">パスワードを入力してください</p>';
    $check_counter++;
}

if($password!=$password2){
    $information .= '<p class="alt_info">パスワードが一致しません</p>';
    $check_counter++;
}

if($last_name==''||$first_name==''||$last_kana==''||$first_kana==''){
    $information .= '<p class="alt_info">名前とカナを入力して下さい</p>';
    $check_counter++;
}

if($sex==''){
    $information .= '<p class="alt_info">性別を選択してください</p>';
    $check_counter++;
}

if($birthday==''){
    $information .= '<p class="alt_info">生年月日を入力してください</p>';
    $check_counter++;
}

if($bring==''){
    $information .= '<p class="alt_info">来店同期を入力してください</p>';
    $check_counter++;
}

if($profession==''){
    $information .= '<p class="alt_info">ご職業を入力してください</p>';
    $check_counter++;
}

// 入力に問題があった場合
if($check_counter!=0){
    echo <<<EOM
    <div id="info_wrap">
        {$information}
    </div>
    EOM;
    print '<form method="post" action="first_login_check.php">
            <p>メールアドレス</p>
            <input type="text" name="mail" value="'.$mail.'">
            <p>パスワード</p>
            <input type="password" name="password">
            <p>パスワード(確認用)</p>
            <input type="password" name="password2">
            <div class="lf_name_kanji">
                <p>名前(姓)</p>
                <input type="text" name="last_name" value="'.$last_name.'">
                <p>名前(名)</p>
                <input type="text" name="first_name" value="'.$first_name.'">
            </div>
            <div class="lf_name_kana">
                <p>カナ(姓)</p>
                <input type="text" name="last_kana" value="'.$last_kana.'">
                <p>カナ(名)</p>
                <input type="text" name="first_kana" value="'.$first_kana.'">
            </div>
            <p>性別</p>
            <input type="text" name="sex" value="'.$sex.'">
            <p>生年月日</p>
            <input type="date" name="birthday" value="'.$birthday.'">
            <p>住所</p>
            <input type="text" name="address" value="'.$address.'">
            <p>来店同期</p>
            <input type="text" name="bring" value="'.$bring.'">
            <p>職業</p>
            <input type="text" name="profession" value="'.$profession.'">
            <p>勤務先(任意)</p>
            <input type="text" name="workplace" value="'.$workplace.'">
            <p>所属支店(任意)</p>
            <input type="text" name="branch" value="'.$branch.'">
            <p>所属部署(任意)</p>
            <input type="text" name="department" value="'.$department.'">
            <input class="submit_btn" type="submit" value="OK">
        </form>';
}

// 入力に問題がない場合
if($check_counter==0){
    print ' <p id="korede_txt">これで良いですか？</p>
        <form method="post" action="first_login_done.php">
            <p>メールアドレス</p>
            <input type="text" name="mail" value="'.$mail.'">
            <p>パスワード</p>
            <input type="hidden" name="password" value="'.$password.'">
            <div class="lf_name_kanji">
                <p>名前(姓)</p>
                <input type="text" name="last_name" value="'.$last_name.'">
                <p>名前(名)</p>
                <input type="text" name="first_name" value="'.$first_name.'">
            </div>
            <div class="lf_name_kana">
                <p>カナ(姓)</p>
                <input type="text" name="last_kana" value="'.$last_kana.'">
                <p>カナ(名)</p>
                <input type="text" name="first_kana" value="'.$first_kana.'">
            </div>
            <p>性別</p>
            <input type="text" name="sex" value="'.$sex.'">
            <p>生年月日</p>
            <input type="date" name="birthday" value="'.$birthday.'">
            <p>住所</p>
            <input type="text" name="address" value="'.$address.'">
            <p>来店同期</p>
            <input type="text" name="bring" value="'.$bring.'">
            <p>職業</p>
            <input type="text" name="profession" value="'.$profession.'">
            <p>勤務先(任意)</p>
            <input type="text" name="workplace" value="'.$workplace.'">
            <p>所属支店(任意)</p>
            <input type="text" name="branch" value="'.$branch.'">
            <p>所属部署(任意)</p>
            <input type="text" name="department" value="'.$department.'">
            <input class="submit_btn" type="submit" value="OK">
        </form>';
}
    
?>
</div>
<?php include('./common/footer.php');?>