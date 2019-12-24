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


	<div class="container">
		<div class="d-flex flex-row">
			<h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品一覧</h3>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">品目</th>
					<th scope="col">価格</th>
				</tr>
			</thead>
			<tbody>


				<?php

				try {
					$dsn='mysql:dbname=tqmsbzgg_shop;host=tqmsbzgg_shop;charset=utf8';
					$user='tqmsbzgg_shop';
					$password='%RdFsbr)I})8';
					$dbh = new PDO($dsn, $user, $password);
					$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$sql = 'SELECT code,name,price FROM mst_product WHERE 1';
					$stmt = $dbh->prepare($sql);
					$stmt->execute();

					$dbh = null;

					while (true) {
						$rec = $stmt->fetch(PDO::FETCH_ASSOC);

						if ($rec == false) {
							break;
						} else {

							echo '<tr><td><a href="shop_product.php?procode=' . $rec['code'] . '">';
							echo $rec['name'] . "</td><td>" . $rec['price'] . "円</a><br></td></tr>";
						}
					}
				} catch (Exception $e) {
					echo $e;
					exit();
				} ?>


			</tbody>

		</table>

		<br>
		<a href="shop_cartlook.php">カートを見る</a><br>
		<a href="clear_cart.php">カートを空にする</a><br>
		<a href="../staff_login/staff_top.php">ショップ管理トップメニュー</a><br>

	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>