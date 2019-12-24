<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-5 mb-3 bg-white border-bottom shadow-sm">
    <h2 class="my-0 mr-md-auto font-weight-normal"><a href="../shop/index.php" class="">八百屋のすどう</a></h2>
        <div class="flex-row-reverse">
            <?php
            session_start();
            session_regenerate_id(true);//合言葉を都度変える。セッションハイジャック対策。
            
            if(isset($_SESSION['login']) == false){
                echo "ログインされていません。<br>";
                echo '<a href="../staff_login/staff_login.php">ログインする</a><br>';
                exit();
            }else{
                echo '管理者モード<br>'.$_SESSION['staff_name']."さんログイン中<br>";
            }

            ?>
        </div>
    </div>
    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">注文書ダウンロード画面</h3>
        </div>

        ダウンロードしたい注文日を選んでください。
<br>
<form action="order_download_done.php" method="post" class="mb-3">
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
    
    <input class="btn btn-secondary mt-3" type="button" onclick="history.back()" value="戻る">
    <input class="btn btn-primary mt-3" type="submit" value="ダウンロードする">
</form>

<a href="../staff/staff_list.php">スタッフ管理</a><br>
<a href="../product/pro_list.php">商品管理</a><br>
<a href="../index.php">商品一覧</a><br>
<a href="../order/order_download.php">注文書ダウンロード</a><br>
<a href="../staff_login/staff_logout.php">ログアウト</a>


</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

