<?php include('./common/header.php');?>
<?php

if($_POST['select_date']!='' && $_POST['select_weight']!=''){
    
    require_once('./common/common.php');
    $post = sanitize($_POST);
    $weight = $post['select_weight'];
    $wh_date = $post['select_date'];
    
    echo<<<EOM
    <p>これでよろしいですか？</p>
    <form method="post" action="weight_record_done.php">
        <p>{$wh_date} の体重 {$weight} kg</p>
        <input type="hidden" name="weight" value="{$weight}">
        <input type="hidden" name="wh_date" value="{$wh_date}">
        <input type="submit" value="OK">
    </form>
    
    
    EOM;
    
}else if($_POST['select_date']!='' || $_POST['select_weight']!=''){
    
    print '<p>数値を正しく入力してください</p>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    
}else{
    
    require_once('./common/common.php');
    $post = sanitize($_POST);
    $weight = $post['weight'];
    $wh_date = date('Y-m-d');
    
}

?>

<?php include('./common/footer.php');?>