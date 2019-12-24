<?php include('../assets/header_member.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">会員ログイン</h3>
        </div>

        <form action="member_login_check.php" method="post">
            <div class="form-group">
                <label for="InputEmail">登録メールアドレス</label>
                <input type="email" name="email" class="form-control"  id="InputEmail" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="InputPassword1">パスワード</label>
                <input type="password" class="form-control" id="InputPassword1" name="pass">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


        <?php include('../assets/footer.php');?>