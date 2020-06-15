<?php include('./common/header.php');?>
<?php include('./common/mypage_header.php');?>

<?php
try{
    
$member_code = '56';

include('./common/db_login.php');

$sql = 'SELECT * FROM account_state WHERE member_code=?';
$stmt = $dbh->prepare($sql);
$data[] = $member_code;
$stmt->execute($data);

$dbh = null;

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$from = new Datetime($rec['goal_date']);
$interval = $from->diff(new DateTime('now'));
$goal_date = $interval->format('%a');
$icon_state_g = 'status_icon_contents';
$icon_state_d = 'status_icon_contents';
$icon_state_p = 'status_icon_contents';
$icon_state_c = 'status_icon_contents';
$icon_state_highllight = 'status_icon_contents_highlight';

if(!empty($rec['group_check'])){$icon_state_g = $icon_state_highllight;}
if(!empty($rec['diet_check'])){$icon_state_d = $icon_state_highllight;}
if(!empty($rec['parsonal_check'])){$icon_state_p= $icon_state_highllight;}
if(!empty($rec['company_check'])){$icon_state_c= $icon_state_highllight;}


echo <<< EOM
<div class="mypage_main">

    <div class="name_area">
        <p id="client_name">{$rec['last_name']}  {$rec['first_name']}さん</p>
        <p id="client_point">logポイント {$rec['log_point']}pt</p>
    </div>

    <div class="status_area">
        <p id="status_text">現在のステータス</p>
        <div id="status_icon">
            <div class="status_icon_set">
                <p class="{$icon_state_g}">グループ</p>
                <p class="{$icon_state_p}">パーソナル</p>
            </div>
            <div class="status_icon_set">
                <p class="{$icon_state_d}">ダイエット</p>
                <p class="{$icon_state_c}">企業</p>
            </div>
        </div>
    </div>

    <div class="weight_area">
        <p id="target_weight">目標体重 {$rec['goal_weight']}kg</p>
        <p id="deadline">期日 {$goal_date}日</p>
    </div>
            
    <div class="contents_area">

        <!-- トレーニングタイムテーブル -->
        <div class="contents_wrap">

            <div class="contents_img">
                <img src="./img/timetable.png">
            </div>

            <div class="contents_text">
                <p class="contents_title">トレーニングタイムテーブル</p>
                <p class="contents_sentens">オンライントレーニングのタイムテーブルとZOOMログインURLの発行</p>
            </div>

            <div class="click_area">
                <p><a id="blue" href="training_timetable.php">＞</a></p>
            </div>

        </div>

        <!-- トレーニングログ -->
        <div class="contents_wrap">

            <div class="contents_img">
                <img src="./img/traininglog.png">
            </div>

            <div class="contents_text">
                <p class="contents_title">トレーニングログ</p>
                <p class="contents_sentens">今までのトレーニングの記録を確認できます</p>
            </div>

            <div class="click_area">
                <p><a id="green" href="training_log.php">＞</a></p>
            </div>

        </div>

        <!-- 体組織ログ -->
        <div class="contents_wrap">

            <div class="contents_img">
                <img src="./img/bodylog.png">
            </div>

            <div class="contents_text">
                <p class="contents_title">体組織ログ</p>
                <p class="contents_sentens">目標設定・体重・体脂肪・血圧等の管理</p>
            </div>

            <div class="click_area">
                <p><a id="red" href="body_tissue.php">＞</a></p>
            </div>

        </div>

        <!-- イベント -->
        <div class="contents_wrap">

            <div class="contents_img">
                <img src="./img/event.png">
            </div>

            <div class="contents_text">
                <p class="contents_title">イベント</p>
                <p class="contents_sentens">大人の身体測定・アンケート・ストレスチェック・ポイントイベントなど</p>
            </div>

            <div class="click_area">
                <p><a id="yellow" href="###">＞</a></p>
            </div>

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