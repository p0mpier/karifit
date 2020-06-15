<?php include('./common/header.php');?>
<?php include('./common/mypage_header.php');?>

<?php

if(!empty($_POST['input_date']) && !empty($_POST['input_weight'])){
    
    require_once('./common/common.php');
    $post = sanitize($_POST);
    $weight = $post['input_value'];
    $wh_date = $post['input_date'];
    
    echo<<<EOM
    <div id="weight_add_check">
        <form method="post" action="weight_add_done.php">
            <div>
                <p>{$wh_date}</p>
                <input type="hidden" name="wh_date" value="{$wh_date}">
            </div>
            <div>
                <p>体重</p>
                <p>{$weight}kg</p>
                <input type="hidden" name="weight" value="{$weight}">
            </div>
            <p>登録してもよろしいですか？</p>
            <input class = "weight_add_btn" type="submit" value="OK">
            <input class = "weight_add_btn" type="button" onclick="history.back()" value="戻る">
        </form>
    </div>
EOM;
    
}else{
    
    echo <<<EOM
    <div id="weight_add_check">
        <p>数値を正しく入力してください</p>
        <input class="weight_add_btn" type="button" onclick="history.back()" value="戻る">
    </div>
EOM;
    
}

?>
<?php include('./common/footer.php');?>