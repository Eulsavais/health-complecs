<?php 
	include_once('header.php');
	
?>

		<main class="main">

			<div class="living">
				<div class="_container">
					<div class="living_con">
						<div class="living_title">
							Бронирование
						</div>
						

						<div class="book_res">

						<?php 
						if (session_status() == PHP_SESSION_NONE) {
							session_start();
						}
							

							$date_in_check = $_POST['date_in_check'];
							$date_out_check = $_POST['date_out_check'];
							$meal_option = $_POST['meal_option'];
							$id_комната = $_GET['id_ком'];

							$id_cookies = $_COOKIE["id_cookies"];

							require('connect.php');

							$stmt_count = $mysqli->prepare("SELECT COUNT(*) as count FROM booking_memory WHERE FK_room = ? and id_cookies=?");		
							$stmt_count->bind_param("is", $id_комната, $id_cookies);
							$stmt_count->execute();
							$stmt_count->bind_result($count_mem);
							$stmt_count->fetch();
							$stmt_count->close();

							$strSQL="SELECT * FROM booking_memory WHERE FK_room=".$id_комната." AND id_cookies='".$id_cookies."'";
							$result=$mysqli->query($strSQL) or die("Не могу выполнить запрос!");


							if ($row=$result->fetch_assoc()) {	
								 $stmt = $mysqli->prepare("UPDATE booking_memory SET check_in_date = ?, check_out_date = ?, meal_option = ? WHERE id_cookies = ? and FK_room = ?");
								 $stmt->bind_param("ssssi", $date_in_check, $date_out_check, $meal_option, $id_cookies, $id_комната);
								 $stmt->execute();
							} else {
								$stmt = $mysqli->prepare("INSERT INTO booking_memory (id_cookies, FK_room, check_in_date, check_out_date, meal_option) VALUES (?, ?, ?, ?, ?)");
								$stmt->bind_param("sisss", $id_cookies, $id_комната, $date_in_check, $date_out_check, $meal_option);
								$stmt->execute();
							}
							

							$stmt_price = $mysqli->prepare("SELECT цена, название, цена_питание FROM rooms WHERE id_комната = ?");
							$stmt_price->bind_param("i", $id_комната);
							$stmt_price->execute();
							$stmt_price->bind_result($total_price, $room_name, $meal_coast);
							$stmt_price->fetch();
							$stmt_price->close();

							$mysqli->close();

							if ($id_комната == '1' && $meal_option == 'включено') {
								$total_price += $meal_coast;
							} else if ($id_комната == '2' && $meal_option == 'включено') {
								$total_price += $meal_coast;
							} elseif ($id_комната == '3' && $meal_option == 'включено') {
								$total_price += $meal_coast;
							}

							$startDate = new DateTime($date_in_check);
							$endDate = new DateTime($date_out_check);

							// Разница между датами
							$interval = $startDate->diff($endDate);
							$nights = $interval->format('%a');
						?>

						<table class="iksweb">
									<tbody>
										<tr>
											<th colspan="6">
												<h2>Данные заказа</h2>
											</th>
										</tr>
										<tr>
											<th width="16.66%">Название</th>
											<th width="16.66%">Цена за ночь</th>
											<th width="16.66%">Питание</th>
											
											<th width="16.66%">Дата въезда</th>
											<th width="16.66%">Дата выезда</th>
											<th width="16.66%">Кол-во ночей</th>
											

										</tr>
										<tr>
											<td><?php print $room_name; ?></td>
											<td><?php print $total_price; ?> Р</td>
											<td><?php print $meal_option; ?></td>
											
											<td><?php print $date_in_check; ?></td>
											<td><?php print $date_out_check; ?></td>
											<td><?php print $nights; ?></td>
											
										</tr>
										<tr>
											
											<td colspan="3">ИТОГО:</td>
											<td colspan="3"><?php print $total_price*$nights; ?> P</td>
										
										</tr>
								
										</td>
										</tr>
									</tbody>
								</table>

								
						</div>
						<div class="neartable">
							<a href="dobook.php?id_ком=<?php print $id_комната ?>" class="checkout-btn">Забронировать</a>
							
							<a href="book.php?id_ком=<?php print $id_комната ?>" class="back-btn">Назад</a>
						</div>

					</div>
				</div>
			</div>

		</main>

<?php 
	include_once('footer.php');
?>