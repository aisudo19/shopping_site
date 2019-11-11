<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

<?php
    $tsuki = $_POST['tsuki'];
    $shun = array('', 'ブロッコリー','カリフラワー','レタス','みつば','アスパラガス','セロリ','なす','ピーマン','オクラ','さつまいも','大根','ほうれん草');

    echo $tsuki."月は".$shun[$tsuki]."が旬です。";
?>

</body>
</html>

