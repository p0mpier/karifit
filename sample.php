<?php include('./common/header.php');?>
<?php
$weight_data[] = ['','体重表'];
$weight_data[] = ['05/19',  61.5];
$weight_data[] = ['05/19',  61.5];
$weight_data[] = ['05/19',  61.5];
$weight_data[] = ['05/19',  61.5];
$weight_data[] = ['05/19',  61.5];
$weight_data[] = ['05/19',  61.5];
$weight_data[] = ['05/19',  61.5];
$weight_data[] = ['05/19',  61.5];
$weight_data = json_encode($weight_data);
?>

<div id="weight_chart" style="width: 80%; height: 400px;"></div>

<?php
/* json_encodeされた二次元配列$weight_dataが必要 */
/* 出力先 → <div id="weight_chart"></div> */
include('./common/weight_chart.php');
?>

<?php include('./common/footer.php');?>