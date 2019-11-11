<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

<?php
    $mbango = $_POST['mbango'];
    $hoshi = array('M1'=>'カニ星雲','M31'=>'アンドロメダ星雲','M42'=>'オリオン大星雲','M45'=>'すばる','M57'=>'ドーナツ星雲');

    echo "あなたが選んだ星は".$hoshi[$mbango]."です。<br>";
    foreach($hoshi as $key =>$val){
        echo $key.'は'.$val.'<br>';
    }
?>

</body>
</html>

