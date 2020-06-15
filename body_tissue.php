<?php include('./common/header.php');?>
<?php include('./common/mypage_header.php');?>

<?php
try{
    date_default_timezone_set('Asia/Tokyo');
    $member_code = 'ggg';
    $weight_data[] = ['',''];
    $wh_date = date('Y-m-d');
    
    
    if(empty($_GET['select_graph'])){
        $select_graph = 'weight'; 
    }else{
        $select_graph = $_GET['select_graph'];
    }
    
    include('./common/db_login.php');
    
    $sql = 'SELECT wh_date,weight FROM weight_history WHERE member_code=? ORDER BY wh_date ASC';
    $stmt = $dbh->prepare($sql);
    $data[] = $member_code;
    $stmt->execute($data);

    $dbh = null;
    
    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false){break;}
        $wh_date = date('m/d', strtotime($rec['wh_date']));
        $weight = (float)$rec['weight'];
        $weight_data[] = [$wh_date,$weight];
    }
    
    if(!empty($weight_data)){
        $weight_data = json_encode($weight_data);
        
        /* json_encodeされた二次元配列$weight_dataが必要 */
        /* 出力先 → <div id="weight_chart"></div> */
        include('./common/weight_chart.php');
    }

    echo<<<EOM
    <div class="bodytissue_main">
        <div id="training_top">
            <img src="img/body_upmate_logo_white.png">
        </div>

        <div class="weight_log_wrap">

            <div id="graph_wrap">
                <div id="weight_chart"></div>
            </div>

            <div id="graph_select_icon_wrap">
EOM;
                switch($select_graph){
                    case 'weight':
                        echo<<<EOM
                        <p><a id="current" href="body_tissue.php?select_graph=weight">体重</a></p>
                        <p><a href="body_tissue.php?select_graph=muscle">筋肉量</a></p>
                        <p><a href="body_tissue.php?select_graph=bmi">BMI</a></p>
                        <p><a href="body_tissue.php?select_graph=fat_par">体脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=vis_fat">内臓脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=blood_pressure">血圧</a></p>
                        <p><a href="body_tissue.php?select_graph=pulse">脈拍</a></p>
                        EOM;
                        break;
                        
                    case 'muscle':
                        echo<<<EOM
                        <p><a href="body_tissue.php?select_graph=weight">体重</a></p>
                        <p><a id="current" href="body_tissue.php?select_graph=muscle">筋肉量</a></p>
                        <p><a href="body_tissue.php?select_graph=bmi">BMI</a></p>
                        <p><a href="body_tissue.php?select_graph=fat_par">体脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=vis_fat">内臓脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=blood_pressure">血圧</a></p>
                        <p><a href="body_tissue.php?select_graph=pulse">脈拍</a></p>
                        EOM;
                        break;
                    
                    case 'bmi':
                        echo<<<EOM
                        <p><a href="body_tissue.php?select_graph=weight">体重</a></p>
                        <p><a href="body_tissue.php?select_graph=muscle">筋肉量</a></p>
                        <p><a id="current" href="body_tissue.php?select_graph=bmi">BMI</a></p>
                        <p><a href="body_tissue.php?select_graph=fat_par">体脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=vis_fat">内臓脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=blood_pressure">血圧</a></p>
                        <p><a href="body_tissue.php?select_graph=pulse">脈拍</a></p>
                        EOM;
                        break;
                        
                    case 'fat_par':
                        echo<<<EOM
                        <p><a href="body_tissue.php?select_graph=weight">体重</a></p>
                        <p><a href="body_tissue.php?select_graph=muscle">筋肉量</a></p>
                        <p><a href="body_tissue.php?select_graph=bmi">BMI</a></p>
                        <p><a id="current" href="body_tissue.php?select_graph=fat_par">体脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=vis_fat">内臓脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=blood_pressure">血圧</a></p>
                        <p><a href="body_tissue.php?select_graph=pulse">脈拍</a></p>
                        EOM;
                        break;
                        
                    case 'vis_fat':
                        echo<<<EOM
                        <p><a href="body_tissue.php?select_graph=weight">体重</a></p>
                        <p><a href="body_tissue.php?select_graph=muscle">筋肉量</a></p>
                        <p><a href="body_tissue.php?select_graph=bmi">BMI</a></p>
                        <p><a href="body_tissue.php?select_graph=fat_par">体脂肪</a></p>
                        <p><a id="current" href="body_tissue.php?select_graph=vis_fat">内臓脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=blood_pressure">血圧</a></p>
                        <p><a href="body_tissue.php?select_graph=pulse">脈拍</a></p>
                        EOM;
                        break;
                    
                    case 'blood_pressure':
                        echo<<<EOM
                        <p><a href="body_tissue.php?select_graph=weight">体重</a></p>
                        <p><a href="body_tissue.php?select_graph=muscle">筋肉量</a></p>
                        <p><a href="body_tissue.php?select_graph=bmi">BMI</a></p>
                        <p><a href="body_tissue.php?select_graph=fat_par">体脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=vis_fat">内臓脂肪</a></p>
                        <p><a id="current" href="body_tissue.php?select_graph=blood_pressure">血圧</a></p>
                        <p><a href="body_tissue.php?select_graph=pulse">脈拍</a></p>
                        EOM;
                        break;
                        
                    case 'pulse':
                        echo<<<EOM
                        <p><a href="body_tissue.php?select_graph=weight">体重</a></p>
                        <p><a href="body_tissue.php?select_graph=muscle">筋肉量</a></p>
                        <p><a href="body_tissue.php?select_graph=bmi">BMI</a></p>
                        <p><a href="body_tissue.php?select_graph=fat_par">体脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=vis_fat">内臓脂肪</a></p>
                        <p><a href="body_tissue.php?select_graph=blood_pressure">血圧</a></p>
                        <p><a id="current" href="body_tissue.php?select_graph=pulse">脈拍</a></p>
                        EOM;
                        break;
                }
    
    
            echo<<<EOM
            </div>

            <div class="weight_log_fillout_area">

                <form method="post" action="weight_add_check.php">
                    <div>
                        <input id="input_date" name="input_date" type="date" value="{$wh_date}">
                        <input id="input_value" name="input_weight" type="text" value="-">
                    </div>
                    <input class="submit" type="submit" value="OK">
                </form>

            </div>

        </div>

    </div>
EOM;
    
    
}catch(Exception $e){

    print 'ただ今障害により大変ご迷惑をおかけしております。';
    exit();

}

?>

<?php include('./common/footer.php');?>