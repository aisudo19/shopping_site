<?php include('../assets/header_staff.php'); ?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ追加</h3>
        </div>

<form action="staff_add_check.php" method="post">
    スタッフ名を入力してください。<br>
    <input type="text" name="name"><br>
    パスワードを入力してください。<br>
    <input type="text" name="pass1"><br>
    パスワードをもう一度入力してください。<br>
    <input type="text" name="pass2"><br><br>
    <input class="btn btn-secondary mt-3"type="button" onclick="history.back()" value="戻る">
    <input class="btn btn-primary mt-3" type="submit" value="送信する">
</form>
<?php include('../assets/footer.php');?>
