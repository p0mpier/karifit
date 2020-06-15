<?php include('./common/header.php');?>
<?php include('./common/staff_kanri_header.php');?>

<?php

try{
    
    include('./common/db_login.php');

    $sql = 'SELECT * FROM account_state WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;
    
    echo <<< EOM
        <div id="client_top">
            <form method="post" action="client_disp.php">
                <p>顧客No.<input type="text" name="member_code"></p>
                <input id="submit_btn" type="submit" value="検索">
            </form>
        </div><!--#client_top END-->

        <div id="client_all_disp">
EOM;

    while(true){

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if($rec==false){break;}

        echo <<< EOM
            <div class="client_card">
                <p>{$rec['member_code']} : {$rec['last_name']} {$rec['first_name']}</p>
                <form method="post" action="client_disp.php">
                    <input type="hidden" name="member_code" value="{$rec['member_code']}">
                    <input class="client_all_submit_btn" type="submit" value="詳細を見る">
                </form>
            </div><!--.client_card END-->
        EOM;

    }
    
    echo '</div><!--#client_all_disp END-->';

}catch(Exception $e){

    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();

}

?>

<?php include('./common/footer.php');?>