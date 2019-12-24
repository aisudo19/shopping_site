<?php include('../assets/header_no_name.php');?>

    <?php
             session_start();
            //  $_SESSION = array();
            //  if (isset($_COOKIE[session_name()]) == true) {
            //      setcookie(session_name(), '', time() - 42000, '/');
            //  }
            //  session_destroy();
            unset($_SESSION['cart']);
            ?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">カートを空にしました</h3>
        </div>

        <a class="btn btn-secondary mt-3" href="../index.php">お店トップページへ</a>

        <?php include('../assets/footer.php'); ?>