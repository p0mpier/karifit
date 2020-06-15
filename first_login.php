<?php include('./common/header.php'); ?>

<div id="first_login" class="main_area">
    <form method="post" action="first_login_check.php">
        <p>メールアドレス</p>
        <input type="text" name="mail">
        <p>パスワード</p>
        <input type="password" name="password">
        <p>パスワード(確認用)</p>
        <input type="password" name="password2">
        <div class="lf_name_kanji">
            <p>名前(姓)</p>
            <input type="text" name="last_name">
            <p>名前(名)</p>
            <input type="text" name="first_name">
        </div>
        <div class="lf_name_kana">
            <p>カナ(姓)</p>
            <input type="text" name="last_kana">
            <p>カナ(名)</p>
            <input type="text" name="first_kana">
        </div>
        <p>性別</p>
        <input type="text" name="sex">
        <p>生年月日</p>
        <input type="date" name="birthday">
        <p>住所</p>
        <input type="text" name="address">
        <p>来店同期</p>
        <input type="text" name="bring">
        <p>職業</p>
        <input type="text" name="profession">
        <p>勤務先(任意)</p>
        <input type="text" name="workplace">
        <p>所属支店(任意)</p>
        <input type="text" name="branch">
        <p>所属部署(任意)</p>
        <input type="text" name="department">
        <input class="submit_btn" type="submit" value="OK">
    </form>
</div><!--#first_login .main_area END-->
<?php include('./common/footer.php');?>