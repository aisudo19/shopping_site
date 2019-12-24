<?php include('../assets/header_no_name.php');?>

	<div class="container">
		<div class="d-flex flex-row">
			<h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ追加チェック</h3>
		</div>

<?php 
try{
    require_once("../common/common.php");
    $post = sanitize($_POST);
    
    $code = $post['code'];
    $pass = $post['pass'];
    $pass = md5($pass);

    include('../assets/db_connect.php');

    $sql='SELECT name,code FROM mst_staff WHERE code=? AND password=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$code;
    $data[]=$pass;
    $stmt->execute($data);
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);

    $dbh=null;
    
    if($rec == false){
        echo "スタッフコードかパスワードのどちらかが間違っています。<br>";
        echo '<a class="btn btn-secondary mt-3" href="staff_login.php">戻る</a>';
    }else{
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['staff_code'] = $rec['code'];
        $_SESSION['staff_name'] = $rec['name'];
        header('Location: staff_top.php');
        exit();
    }
    $staff_name=$rec['name'];
}
catch(Exception $e){
    echo $e;
    exit();
}
?>

</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

