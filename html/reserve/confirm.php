<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 2016/05/01
 * Time: 16:49
 */

//予約が確定され、SIDとRIDが付与されてるとき
include_once("../../class/reserve/Reserve.php");
session_start();
$reserve = new Reserve();

$peopleNum = (int)$_SESSION['peopleNum'];
$reserve->setPeopleNum($peopleNum);
$reserve->setReservedTime(date("Y-m-d H:i:s"));
$reserve->setStartDay($_SESSION['StartDay']);
$reserve->setStartTime($_SESSION['startTime']);

//コース
$reserve->setCourse($_SESSION['course']);

if($reserve->getCourse() == 4) {
    $reserve->setCourse_flag(true);

    // Array処理が必要です。AMPとの調整が必要
    $dishName = array($_SESSION['dish'][0],$_SESSION['dish'][1],$_SESSION['dish'][2],$_SESSION['dish'][3]);
    $reserve->setCourse_4($dishName);
}

if(count($reserve->errCheck()) !== 0) {
    $arr = $reserve->errCheck();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="../../js/lib/jquery-2.2.3.min.js"></script>
    <script src="../../js/reserve/confirm.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/common/init.css">
    <link rel="stylesheet" type="text/css" href="../../css/common/header.css">
    <link rel="stylesheet" type="text/css" href="../../css/common/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/reserve/tableForm.css">
    <link rel="stylesheet" type="text/css" href="../../css/reserve/style.css">
    <title>ご予約内容のご確認</title>
</head>
<body>
<?php include_once('../../html/common/global_header.html'); ?>
<div id="wrapper">
    <?php
    if($_SESSION['stat'] == "Reserve") {
        echo "<h1>以上の内容でよろしいですか？</h1>";
    } else if($_SESSION['stat'] == "Change") {
        echo "<h1>以上の内容で変更よろしいですか？</h1>";
    }
    ?>
    <table class="design_table">
        <tr>
            <td>
                来店日時
            </td>
            <td>
                <?php
                echo $_SESSION['startTime'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                人数
            </td>
            <td>
                <?php echo $_SESSION["peopleNum"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                代表者氏名
            </td>
            <td>
                <?php echo $_SESSION["familyName"]." ".$_SESSION["firstName"]."(".$_SESSION['familyName_kana']." ".$_SESSION['firstName_kana'].")"; ?>
            </td>
        </tr>
        <tr>
            <td>
                電話番号
            </td>
            <td>
                <?php echo $_SESSION['phoneNumber']; ?>
            </td>
        </tr>
        <tr>
            <td>
                コース名
            </td>
            <td>
                <?php echo $_SESSION['course']."品"; ?>
            </td>
        </tr>
        <tr>
            <td id="no_under_white">
                メールアドレス
            </td>
            <td>
                <?php echo $_SESSION['mail']; ?>
            </td>
        </tr>
        <?php
        // 4品の場合、行を追加
        if($_SESSION['course_flag'] == true) {
            echo "<tr><td id='no_under_white'>料理選択</td><td>";

            for($i = 0; $i < count($_SESSION['dish']); $i++ ) {
                if( $i < 3 ) {
                    echo $_SESSION['dish'][$i].", ";
                } else {
                    echo "".$_SESSION['dish'][$i]."";
                }
            }

            echo "</td></tr>";
        }
        ?>
    </table>
    <div class="btns">
        <form action="./finishProcessing.php" method="Post">
            <span class='btn'><input type='submit' name='confirm'     value='確定' class='common_btn submit'></span>
            <span class='btn'><input type='submit' name='confirm'     value='修正' class='common_btn modify'></span>
        </form>
    </div>
</div>
<?php include_once('../../html/common/footer.html'); ?>
</body>
</html>
