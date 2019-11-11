<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

<?php
    $seireki = $_POST['seireki'];
    echo gengo($seireki);
    function gengo($seireki){
        if($seireki >= 1868 && $seireki <= 1911){
            $wareki = "明治";
        }
        if($seireki >= 1912 && $seireki <= 1925){
            $wareki = "大正";
        }
        if($seireki >= 1926 && $seireki <= 1988){
            $wareki = "昭和";
        }
        if($seireki >= 1989 && $seireki <= 2019){
            $wareki = "平成";
        }
        if($seireki > 2019){
            $wareki = "令和";
        }
        return $wareki;
    }
?>

</body>
</html>

