<?php include('../assets/header_staff.php'); ?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品追加</h3>

        </div>
        <?php
        ?>
        <form action="pro_add_check.php" method="post" enctype="multipart/form-data">
            商品名を入力してください。<br>
            <input type="text" name="name"><br>
            価格を入力してください。<br>
            <input type="text" name="kakaku"><br>
            画像を選択してください。<br>
            <input type="file" name="gazou" style="width: 400px"><br>
            <input class="btn btn-secondary mt-3" type="button" onclick="history.back()" value="戻る">
            <input class="btn btn-primary mt-3" type="submit" value="送信する">
        </form>
        <?php include('../assets/footer.php'); ?>