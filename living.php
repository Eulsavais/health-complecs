<?php 
	include_once('header.php');
?>

		<main class="main">

			<div class="living">
				<div class="_container">
					<div class="living_con">
						<div class="living_title">
							Проживание
						</div>

						<div class="rooms_container">
						<?php 

							require('connect.php');
							$query = "SELECT id_комната, название, площадь, питание, цена, обложка FROM rooms";
							$result = $mysqli -> query($query);

							while ($row = $result -> fetch_assoc()) {
							?>
							<div class="room_card">
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
									<a href="book.php?id_ком=<?php print $row["id_комната"]; ?>" class="book-btn_">Забронировать</a>
								</div>
							</div>
							<?php
							}
							?>

						</div>

					</div>
				</div>
			</div>

		</main>

<?php 
	include_once('footer.php');
?>