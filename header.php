<?php
header("Cache-control: no-cache");

if(!isset($_COOKIE['id_cookies'])) 
{
$cookie_value = uniqid("ID");
setcookie("id_cookies", $cookie_value, time() + 60*60*24*14); 
}

?>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>

	<link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="styles/form.css">

<div class="wrapper">

		<header class="header">
			<div class="_container">
				<div class="header_con">
					<div class="header_left-bar">
						<div class="logo">
							<a href="index.php" class="logo_">healthSiberia</a>
						</div>
						<nav class="header_menu">
							<ul class="menu_list">
								<li class="menu_item"><a href="living.php" class="menu_link">Проживание</a></li>
							</ul>
						</nav>
					</div>
					<div class="header_right-bar">
						<div class="autorize_block">
						<?php
							if (session_status() == PHP_SESSION_NONE) {
									session_start();
							}
								
							if(!isset($_SESSION["user_id"]))
							{
								print '<a href="#popup" class="popup-link auto_link">Войти</a>';
							}
							if(isset($_SESSION["login"]))
							{
								print '<div class="logged username">'.$_SESSION["login"].'</div>';
								print '<a href="cabinet.php" class="logged">Кабинет</a>';
								print '<a href="exit.php" class="auto_link">Выход</a>';
								
							}
						
						?>
							
						</div>
					</div>

				</div>
			</div>
		</header>