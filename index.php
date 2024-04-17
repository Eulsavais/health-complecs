<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HealtCare</title>

</head>

<body>
	<?php
	include_once('header.php')
	?>

		<main class="main">

			<section class="main-block">
				<div class="_container">
					<div class="main-block_about">
						<div class="section-title">
							<h1>За счастьем в центр Сибири</h1>
						</div>
						<div class="section-subtitle">
							Сибирь - это особенное место на берегу реки Пышма рядом с рукотворным озером, где уединенный отдых и
							лечение в окружении чарующей природы и бескрайних просторов в низинной равнине Западной Сибири,
							представляющую собой обширную глубокую впадину, обрамленную с востока и юго-запада горно-складчатыми
							сооружениями Саяно-Алтайской системы, Полярного и Приполярного Урала приносят положительный эффект.
						</div>
					</div>

					<a href="living.php" class="book-btn">ЗАБРОНИРОВАТЬ</a>

				</div>
			</section>

			<div class="slider-bg">
				<div class="_container-slide">
					<div class="container">
						<div class="slide" style="background-image: url('assets/relax.jpg');">
							<h3 class="slide_label">Mineral SPA и Терморелакс</h3>
						</div>
						<div class="slide" style="
									background-image: url('assets/sport.jpg');
								">
							<h3 class="slide_label">Спортивный зал</h3>
						</div>
						<div class="slide" style="
									background-image: url('assets/child.jpg');
								">
							<h3 class="slide_label">Детская игровая комната</h3>
						</div>
						<div class="slide" style="
									background-image: url('assets/beach.jpg');
								">
							<h3 class="slide_label">Пляж</h3>
						</div>
						<div class="slide" style="
									background-image: url('assets/biblioteka.jpg');
								">
							<h3 class="slide_label">Библиотека</h3>
						</div>
					</div>
				</div>
			</div>

			<section class="waitings">
				<div class="_container">
					<div class="waitings_con">
						<div class="waiting_title">
							<h2>ЧТО МЕНЯ ОЖИДАЕТ В SIBERIA RESORT & SPA</h2>
						</div>
						<div class="waiting_subtitle">
							<p>Добро пожаловать в siberia resort & spa - место, где вы сможете насладиться отдыхом на 69 гектарах
								территории! Мы предлагаем широкий выбор номеров для проживания в историческом корпусе и Конференц и СПА
								корпусе с термальным комплексом.</p> <br>

							<p>Конференц и СПА корпус (Корпус №1) - это 5 этажное здание, которое включает три категории номеров:
								Студии,
								Люксы и Гранд Люксы. исторический корпус (Корпус №2) на 9 этажей находится рядом. Здесь вы найдете
								Стандарты и Студии, а также Стандарты улучшенные и Студии улучшенные улучшенные на 5-9 этажах. Оба
								корпуса
								соединены теплым переходом для вашего удобства.</p> <br>

							<p>Не забудьте изучить карту территории, чтобы узнать расположение корпусов и инфраструктуру. Мы с
								нетерпением ждем вас в siberia resort & spa, чтобы сделать ваш отдых незабываемым!</p> <br>
						</div>
						<div class="waiting_video">
							<video class="relaxVideo" src="video/relax.mp4" autoplay muted loop></video>
						</div>

					</div>
				</div>
			</section>


		</main>
		<script src="scripts/slider.js"></script>
		<?php
			include_once('footer.php');
		?>
</body>

</html>