<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ろくまる農園</title>
    </head>
    <body>
        <?php 
        $gakuen = $_POST['gakuen'];
        switch($gakuen){
            case 1: echo '西校舎';
            break;
            case 2: echo '南校舎';
            break;
            case 3: echo '東校舎';
            break;
            default : echo 'あなたの校舎は3年生と同じです。';
            break;
        }
        
        ?>

        <br>
    </body>
</html>