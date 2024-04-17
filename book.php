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
						

						<div class="booking_block">
							<div class="room_card_">
								<?php
								if (session_status() == PHP_SESSION_NONE) {
									session_start();
								}

								$id_room = $_GET['id_ком'];
								require('connect.php');

								$query = "SELECT id_комната, название, площадь, питание, цена, обложка FROM rooms WHERE id_комната=".$id_room;
								$result = $mysqli -> query($query);

								while ($row = $result -> fetch_assoc()) {
								?>

								<div class="room_image_con"><img src="img/rooms/<?php print $row["обложка"]; ?>" alt=""></div>
								<div class="room">
									<div class="room_name"><?php print $row["название"]; ?></div>
									<div class="room_desc">
										<div class="desc">
											<div class="desc-title">ПЛОЩАДЬ НОМЕРА</div>
											<div class="desc-text"><?php print $row["площадь"]; ?> м²</div>
										</div>
										<div class="desc">
											<div class="desc-title">ПИТАНИЕ</div>
											<div class="desc-text"><?php print $row["питание"]; ?></div>
										</div>
										<div class="price">от <?php print $row["цена"]; ?> ₽</div>
									</div>

								</div>
								<?php
								}
								$mysqli->close();
								?>

							</div>

							<?php 
								require('connect.php');

								$id_cookies = $_COOKIE["id_cookies"];

								// $stmt_count = $mysqli->prepare("SELECT COUNT(*) as count FROM booking_memory WHERE id_cookies=?");		
								// $stmt_count->bind_param("s", $id_cookies);
								// $stmt_count->execute();
								// $stmt_count->bind_result($count_mem);
								// $stmt_count->fetch();
								// $stmt_count->close();

								$stmt = $mysqli->prepare("SELECT COUNT(*) as count FROM booking_memory WHERE id_cookies = ? AND FK_room = ?");
								if ($stmt === false) {
									die("Ошибка подготовки запроса: " . htmlspecialchars($mysqli->error));
								}
								$stmt->bind_param("si", $id_cookies, $id_room);
								// Выполнение запроса
								$stmt->execute();
								$stmt->bind_result($count);
								// Получение результатов
								$stmt->fetch();
								// Закрытие запроса
								$stmt->close();

								if($count) {
									$stmt_booking_mem = $mysqli->prepare("SELECT FK_room, check_in_date, check_out_date, meal_option FROM booking_memory WHERE FK_room = ? and id_cookies = ?");		
									$stmt_booking_mem->bind_param("is", $id_room, $id_cookies);
									$stmt_booking_mem->execute();
									$stmt_booking_mem->bind_result($FK_room, $check_in_date, $check_out_date, $meal_option);
									$stmt_booking_mem->fetch();
									$stmt_booking_mem->close();
								}
								$mysqli->close();
								
							?>

							<div class="do_booking">
								<form action="book_res.php?id_ком=<?php print $id_room ?>" method="post">
								<div class="form_item">
									<a href="living.php" class="back-btn res">Назад</a>
								</div>
									<div class="form_item">
										<label for="date_in_check" class="form_label">Заед:</label>
										<input class="date" type="date" id="date_in_check" name="date_in_check" value="<?php echo $check_in_date;?>" required>
									</div>
									<div class="form_item">
										<label for="date_out_check" class="form_label">Выезд:</label>
										<input class="date" type="date" id="date_out_check" name="date_out_check" value="<?php echo $check_out_date;?>" required>
									</div>
									<div class="form_item">
										<label class="form_label" for="meal_option">Питание:</label>
										<select name="meal_option" id="meal_option" class="select" value="<?php $meal; ?>" required>
											<option id="отсутствует" <?php if (isset($meal_option) && $meal_option == 'отсутствует') echo "selected";?>>отсутствует</option>
											<option id="включено" <?php if (isset($meal_option) && $meal_option == 'включено') echo "selected";?>>включено</option>
										</select>
									</div>
								

									<input type="submit" value="Расчитать сумму" class="form_button_task">
								</form>
							</div>
						</div>



					</div>
				</div>
			</div>

		</main>

<?php 
	include_once('footer.php');
?>