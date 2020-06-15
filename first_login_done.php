<?php include('./common/header.php');?>
<?php

try {
    
    require_once('./common/common.php');
    
    $post = sanitize($_POST);
    $mail = $post['mail'];
    $pass = $post['password'];
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
    $created = date("Y/m/d H:i:s");
    $updated = date("Y/m/d H:i:s");
    
    $pass = md5($pass);
    
    include('./common/db_login.php');
    
    $sql = 'SELECT id FROM account_state WHERE id=(SELECT MAX(id) FROM account_state)';
    $i3 = $dbh->query($sql)->fetchColumn();
    $member_code = str_pad($i3,5,0,STR_PAD_LEFT)+1;
    
    $sql = 'INSERT INTO account_state(mail,password,member_code,last_name,first_name,last_kana,first_kana,sex,birthday,address,bring,profession,workplace,branch,department,created,updated) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data = array($mail,$pass,$member_code,$last_name,$first_name,$last_kana,$first_kana,$sex,$birthday,$address,$bring,$profession,$workplace,$branch,$department,$created,$updated);
    $stmt->execute($data);
    
    $dbh = null;

    echo <<< EOM
    <div id="first_login_done" class="main_area">
        <p>{$last_name} さんを追加しました。</p>
        <a href="login.php">戻る</a>
    </div>
    EOM;

}catch(Exception $e){
    
    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();
    
}

?>
<?php include('./common/footer.php');?>