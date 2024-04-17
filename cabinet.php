<?php 
	include_once('header.php');
?>

		<main class="main">

			<div class="cabinet">
				<div class="_container">
					<div class="cabinet_con">
						<div class="cabinet_title">
							Личный кабинет
						</div>
						<div class="personal_cab">
							<?php 
							if (session_status() == PHP_SESSION_NONE) {
								session_start();
							}
						
							
							$user_id = $_SESSION["user_id"];
							$login = $_SESSION["login"];

							require('connect.php');

							$stmt_logged = $mysqli->prepare("SELECT login, email, name, surname FROM users WHERE user_id = ?");		
							$stmt_logged->bind_param("i", $user_id);
							$stmt_logged->execute();
							$stmt_logged->bind_result($login, $email, $name, $surname);
							$stmt_logged->fetch();
							$stmt_logged->close();
														
							?>

							<form action="change.php" method=post>


								<table class="personalAccTable">
									<tbody>
										<tr>
											<th colspan="4">
												<h2>Ваши личные данные</h2>
											</th>
										</tr>
										<tr>
											<th>Логин:</th>
											<th>E-mail:</th>
											<th>Имя:</th>
											<th>Фамилия:</th>
										</tr>
										<tr>
											<td><input type=text name=login value="<?php print $login; ?>"></td>
											<td><input type=text name=email value="<?php print $email ?>"></td>
											<td><input type=text name=name value="<?php print $name ?>"></td>
											<td><input type=text name=surname value="<?php print $surname ?>"></td>
										</tr>
										<tr>
											<td colspan="4">
												<input class="btn-cart-pa" type="submit" value="сохранить изменения">
											</td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>

						<h2 align=center>Ваши заказы</h2>


						<table class="iksweb">
							<tbody>
							<colgroup>
								<col style="width: 14%;">
								<col style="width: 14%;">
								<col style="width: 14%;">
								<col style="width: 14%;">
								<col style="width: 14%;">
								<col style="width: 14%;">
								<col style="width: 14%;">
							</colgroup>
								<tr>
									<th>№ Брони</th>
									<th>Название: </th>
									<th>Питание: </th>
									<th>Цена за ночь: </th>
									<th>Ночей: </th>
									<th>Дата заезда: </th>
									<th>Дата выезда: </th>
								</tr>
						<?php
							if (session_status() == PHP_SESSION_NONE) {
								session_start();
							}
							$user_id = &$_SESSION["user_id"];
							$id_mem = $_COOKIE["id_cookies"];

							require('connect.php');
							

							$strSQL1="SELECT id_booking, FK_room, check_in_date, check_out_date, nights, meal_option, total_price FROM bookings WHERE FK_покупатель=$user_id";
							$result1=$mysqli->query($strSQL1) or die("Не могу выполнить запрос1!"); 

							while($row1=$result1->fetch_assoc()) {
								
								$stmt_room_name = $mysqli->prepare("SELECT название, цена FROM rooms WHERE id_комната = ?");		
								$stmt_room_name->bind_param("i", $row1['FK_room']);
								$stmt_room_name->execute();
								$stmt_room_name->bind_result($room_name, $coast_per_night);
								$stmt_room_name->fetch();
								$stmt_room_name->close();
							

						?>
							<tr>
								<td><?php print $row1["id_booking"]?></td>
								<td><?php print $room_name;?></td>
								<td><?php print $row1["meal_option"];?></td>
								<td><?php print $coast_per_night;?> P</td>
								<td><?php print $row1["nights"];?></td>
								<td><?php print $row1["check_in_date"];?></td>
								<td><?php print $row1["check_out_date"];?></td>
							</tr>
						
							<tr>
								
								<td style="background: #35cc95;" colspan=7>ИТОГО: <?php print $row1["total_price"];?> P</td>
								
							</tr>
							<?php
							}
							
						?>
						</tbody>
						</table>
					</div>
				</div>
			</div>

		</main>

<?php 
	include_once('footer.php');
?>