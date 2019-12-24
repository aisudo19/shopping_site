<?php include('../assets/header_no_name.php');?>

<div class="container">
    <div class="d-flex flex-row">
        <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフログイン</h3>
    </div>

    <form class="mb-3" action="staff_login_check.php" method="post">

        スタッフコード<br>
        <input type="text" name="code"><br>
        パスワード<br>
        <input type="text" name="pass"><br>
        <small>スタッフコード:1 パスワード:1</small><br>
        <input class="btn btn-primary mt-3" type="submit" value="ログイン">

    </form>
    <?php include('../assets/footer.php'); ?>