<?php include('./common/header.php');?>
<?php include('./common/staff_kanri_header.php');?>
<div id="training_add" class="main_area">

    <form method="post" action="training_add_check.php">
        <p>トレーニング名</p>
        <input type="text" name="training_name">
        <p>詳細</p>
        <input type="text" name="training_discription">
        <p>開催日時</p>
        <input type="text" name="training_datetime">
        <p>担当トレーナー</p>
        <input type="text" name="trainer">
        <p>パーソナル</p>
        <input type="text" name="parsonal_check">
        <p>ZOOM URL</p>
        <input type="text" name="zoom_url">
        <p>ZOOM ID</p>
        <input type="text" name="zoom_id">
        <p>ZOOM PASSWORD</p>
        <input type="text" name="zoom_password">
        <input id="submit_btn" type="submit" value="OK">
    </form>
    
</div>
<?php include('./common/footer.php');?>