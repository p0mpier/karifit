<?php include('./common/header.php');?>

<div id="login" class="main_area">
    
    <form method="post" action="login_check.php">
        
        <p>メールアドレス</p>
        <input type="text" name="mail">
        
        <p>パスワード</p>
        <input type="password" name="password">
        
        <div class="login_button_wrap">
            
            <input class="submit_btn" type="submit" value="ログイン">
            
            <a href="first_login.php">はじめての方はコチラ</a>
            
        </div><!--.login_button_wrap END-->
        
    </form>
    
</div><!--#login .main_area END-->

<?php include('./common/footer.php');?>