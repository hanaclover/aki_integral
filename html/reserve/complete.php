<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/common/init.css">
    <link rel="stylesheet" type="text/css" href="../../css/common/header.css">
    <link rel="stylesheet" type="text/css" href="../../css/common/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/reserve/style.css" />
    <script src="../../js/lib/jquery-2.2.3.min.js"></script>
    <script src="../../js/reserve/confirm.js"></script>
</head>
<body>
<?php include_once('../../html/common/global_header.html'); ?>
<div id="wrapper">
    <h1>
        御予約ありがとうございました。<br>
        ご来店をお待ちしております。<br>
    </h1>
    <form action="../../index.php" method="get">
        <input type="submit" name="GoHome" value="ホームへ" class="common_btn"/>
    </form>
</div>
<?php include_once('../../html/common/footer.html'); ?>
</body>
</html>
