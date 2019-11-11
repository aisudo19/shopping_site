<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

<?php
    $gakunen = $_POST['gakunen'];
    switch($gakunen){
        case 1: 
            echo "your class is south.";
            break;
        case 2:
            echo "your class is north.";
            break;
        case 3:
            echo "your class is west.";
            break;
        default: 
            echo "your class is same as 3rd grade students.";
            break; 
    }
?>

</body>
</html>

