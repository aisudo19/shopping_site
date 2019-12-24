<?php include('assets/header_member.php');?>

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
					include( 'assets/db_connect.php');

					$sql = 'SELECT code,name,price FROM mst_product WHERE 1';
					$stmt = $dbh->prepare($sql);
					$stmt->execute();

					$dbh = null;

					while (true) {
						$rec = $stmt->fetch(PDO::FETCH_ASSOC);

						if ($rec == false) {
							break;
						} else {

							echo '<tr><td><a href="./shop/shop_product.php?procode=' . $rec['code'] . '">';
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
		<a href="./shop/shop_cartlook.php">カートを見る</a><br>
		<a href="./shop/clear_cart.php">カートを空にする</a><br>
		<a href="./staff_login/staff_top.php">ショップ管理トップメニュー</a><br>

		<?php include( 'assets/footer.php');?>
