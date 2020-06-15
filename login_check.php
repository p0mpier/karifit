<?php

try{
    
    require_once('./common/common.php');
    
    $post = sanitize($_POST);
    $mail = $post['mail'];
    $pass = $post['password'];
    
    $pass = md5($pass);
    
    print $mail;
    print $pass;
    
    include('./common/db_login.php');
    
    $sql = 'SELECT * FROM account_state WHERE mail=? AND password=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $mail;
    $data[] = $pass;
    $stmt->execute($data);
    
    $dbh = null;
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($rec==false){
        print 'スタッフコードかパスワードが間違っています。<br>';
        print '<a href="login.php">戻る</a>';
    }else{
        header('Location:staff_kanri.php');
    }
    
}catch(Exception $e){
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();
}

?>