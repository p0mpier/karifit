<?php include('./common/header.php');?>
<?php include('./common/staff_kanri_header.php');?>
<div id="training_add_check" class="main_area">
    
<?php
require_once('./common/common.php');

$post = sanitize($_POST);
$training_name = $post['training_name'];
$training_discription = $post['training_discription'];
$training_datetime = $post['training_datetime'];
$trainer = $post['trainer'];
$parsonal_check = $post['parsonal_check'];
$zoom_url = $post['zoom_url'];
$zoom_id = $post['zoom_id'];
$zoom_password = $post['zoom_password'];
$created = date("Y/m/d H:i:s");
$updated = date("Y/m/d H:i:s");
$check = true;

if($training_name==''||$training_discription==''||$training_datetime==''||$trainer==''||$parsonal_check==''||$zoom_url==''||$zoom_id==''||$zoom_password==''){
    print '<p>情報を正しく入力してください</p>';
    $check=false;
}

print '
<div class="training_info_wrap">
    <p>[トレーニング名]<br>'.$training_name.'</p>
    <p><br>[詳細]-----<br>:'.$training_discription.'<br>----------</p>
    <p>開催日時:'.$training_datetime.'</p>
    <p>担当トレーナー:'.$trainer.'</p>
    <p>パーソナル:'.$parsonal_check.'<br>-----</p>
    <p>ZOOM URL:'.$zoom_url.'</p>
    <p>ZOOM ID:'.$zoom_id.'</p>
    <p>ZOOM PASSWORD:'.$zoom_password.'</p>
    <p id="kakunin_txt">これでよろしいですか？</p>
</div>
';

print '
<form method="post" action="training_add_done.php">
    <input type="hidden" name="training_name" value="'.$training_name.'">
    <input type="hidden" name="training_discription" value="'.$training_discription.'">
    <input type="hidden" name="training_datetime" value="'.$training_datetime.'">
    <input type="hidden" name="trainer" value="'.$trainer.'">
    <input type="hidden" name="parsonal_check" value="'.$parsonal_check.'">
    <input type="hidden" name="zoom_url" value="'.$zoom_url.'">
    <input type="hidden" name="zoom_id" value="'.$zoom_id.'">
    <input type="hidden" name="zoom_password" value="'.$zoom_password.'">
    <div class="submit_btn_wrap">
        <input class="submit_btn" type="button" onclick="history.back()" value="戻る">
        <input class="submit_btn" type="submit" value="OK">
    </div>
</form>
';

?>
</div>
<?php include('./common/footer.php');?>