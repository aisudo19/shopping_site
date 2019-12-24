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
            session_regenerate_id(true); //合言葉を都度変える。セッションハイジャック対策。

            if (isset($_SESSION['member_login']) == true) {
                echo "ようこそ" . $_SESSION['member_name'] . "様<br>";
                // echo $_SESSION['staff_name']."さんログイン中<br>";
                echo '<a href="member_logout.php">ログアウト</a><br><br>';
            } else {
                echo "ようこそゲスト様<br>";
                echo '<a href="./member_login.php">会員ログイン</a><br>';
            }

            ?>
        </div>
    </div>

    <div class="container mb-5">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">お客様情報入力画面</h3>
        </div>

        <form action="shop_form_check.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">名前</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="氏名" name="name" >

        </div>
        <div class="form-group">
            <label for="FormControlInput1">メールアドレス</label>
            <input type="mail" class="form-control" id="FormControlInput1" placeholder="name@example.com" name="email" >
        </div>
        <div class="form-group">
            <label for="FormControlInput1">郵便番号</label>
            <input type="text" class="" id="FormControlInput1" placeholder="XXX" name="postal1"> -
            <input type="text" class="" id="FormControlInput1" placeholder="XXXX" name="postal2">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">住所</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="住所" name="address">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">電話番号</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="0000000000" name="tel" >
            <br>
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">会員登録しますか？</label><br>
            <input id="exampleFormControlSelect1" type="radio" name="chumon" value="chumontouroku" checked>はい
            <input id="exampleFormControlSelect1" type="radio" name="chumon" value="chumonkonkai">いいえ<br>
            <br>
        </div>
        
        <div class="">
            ※会員登録する場合、以下の項目も入力必須となります。<br>
            <div class="form-group">
                <label for="exampleFormControlInput1">パスワードを入力してください。</label>
                <input id="exampleFormControlInput1" type="password" name="pass"><br>
                <label for="exampleFormControlInput2">パスワードをもう一度入力してください。</label>
                <input id="exampleFormControlInput2" type="password" name="pass2"><br>
            </div>
            <div class="form-group">
            <label for="exampleFormControlInput1" class="strong">性別</label><br>
                <input id="exampleFormControlInput1" type="radio" name="danjo" value="dan" checked>男性
                <input id="exampleFormControlInput1" type="radio" name="danjo" value="jo">女性<br>
            </div>
            <div class="form-group">
                <label for="">生まれ年</label>        
                <select name="birth" id="exampleFormControlInput1">
                    <?php for ($i = 1910; $i < 2010; $i += 10) { ?>
                        <?php if ($i == 1980) { ?>
                            <option value="<?php echo $i ?>" selected><?php echo $i ?>年代</option>
                        <?php } else { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?>年代</option>
                    <?php }
                    } ?>
                </select><br>
            </div>
        </div>
        <input class="btn btn-secondary" type="button" onclick="history.back()" value="戻る">
        <input class="btn btn-primary" type="submit" value="送信する">
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>