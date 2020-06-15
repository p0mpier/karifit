<!-- AJAX API のロード -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

  // Visualization API と折れ線グラフ用のパッケージのロード
  google.load("visualization", "1", {packages:["corechart"]});

  // Google Visualization API ロード時のコールバック関数の設定
  google.setOnLoadCallback(drawChart);

  // グラフ作成用のコールバック関数
  function drawChart() {
      
    // データテーブルの作成
    var data = google.visualization.arrayToDataTable(<?php print $weight_data ?>);

    // グラフのオプションを設定
    var options = {
        legend: {position: 'none'},
        chartArea: {width: '80%'},
        lineWidth: 4,
        pointSize: 6,
        hAxis:{
            gridlines:{color: 'none', count:5}, 
            baselineColor: 'none',
        },
        vAxis:{
            gridlines:{color: 'lightgray', count:5},
            baselineColor: 'none',
        },
        };

    // LineChart のオブジェクトの作成
    var chart = new google.visualization.LineChart(document.getElementById('weight_chart'));
    // データテーブルとオプションを渡して、グラフを描画
    chart.draw(data, options);
  }
</script>