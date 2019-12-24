<?php include('../assets/header_member.php');?>

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
    <?php include('../assets/footer.php');?>