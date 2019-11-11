<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>
ダウンロードしたい注文日を選んでください。<br>
<form action="order_download_done.php" method="post">
    <select name="year">
        <?php for($i=2017;$i <= 2020;$i++){ ?>
            <option value="<?php echo $i?>"><?php echo $i?></option>
        <?php }?>
    </select>
    <select name="month">
        <?php for($i=1;$i <= 12;$i++){ 
            if($i < 10){
                $month = "0".$i;
            }else{
                $month = $i;
            }?>
            <option value="<?php echo $month?>"><?php echo $month?></option>
        <?php }?>
    </select>
    <select name="day">
        <?php for($i=1;$i <= 31;$i++){ 
            if($i < 10){
                $day = "0".$i;
            }else{
                $day = $i;
            }?>
            <option value="<?php echo $day?>"><?php echo $day?></option>
        <?php }?>
    </select><br>
    
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="ダウンロードする">
</form>
</body>
</html>

