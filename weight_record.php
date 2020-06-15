<?php include('./common/header.php');?>

<form method="post" action="weight_record_check.php">
    <p>体重を入力してください</p>
    <input type="text" name="weight">
    <p>当日以外の体重を入力する</p>
    <input type="date" name="select_date">
    <input type="text" name="select_weight">
    <input type="submit" value="OK">
</form>

<?php include('./common/footer.php');?>