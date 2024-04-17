<?php
session_start();
$username = &$_SESSION["username"];
$user_id = &$_SESSION["user_id"];
$id_mem = $_COOKIE["id_cookies"];
$id_room = $_GET["id_ком"];

require('connect.php');

if (!isset($user_id)) {
	$query = "TRUNCATE `booking_memory`";
	$mysqli->query($query);

	header("Location: index.php?success=9");
	exit();
} else {

		$stmt_logged = $mysqli->prepare("SELECT name, surname FROM users WHERE user_id = ?");		
		$stmt_logged->bind_param("i", $user_id);
		$stmt_logged->execute();
		$stmt_logged->bind_result($name, $surname);
		$stmt_logged->fetch();
		$stmt_logged->close();

		if (empty($name) && empty($surname)) {
			header("Location: cabinet.php?success=11");
			exit();
		}

		$strSQL1 = "SELECT COUNT(*) as count FROM booking_memory WHERE id_cookies='".$id_mem."'";
		$result1 = $mysqli->query($strSQL1) or die("Не могу выполнить запрос2!");
		$row = $result1->fetch_assoc();


		if ($row["count"] == 0) {
			echo 'ни одна комната не выбрана!';

		} else {

			$order = uniqid("OR");
			echo $order;
			$stmt = $mysqli->prepare("SELECT check_in_date, check_out_date, meal_option FROM booking_memory WHERE id_cookies = ? and FK_room = ?");
			$stmt->bind_param("si", $id_mem, $id_room);
			$stmt->execute();
			$stmt->bind_result($check_in_date, $check_out_date, $meal_option);
			$stmt->fetch();
			$stmt->close();

			$startDate = new DateTime($check_in_date);
			$endDate = new DateTime($check_out_date);
			$interval = $startDate->diff($endDate);
			$nights = $interval->format('%a');

			$stmt_price = $mysqli->prepare("SELECT цена, название, цена_питание FROM rooms WHERE id_комната = ?");
			$stmt_price->bind_param("i", $id_room);
			$stmt_price->execute();
			$stmt_price->bind_result($total_price, $room_name, $meal_coast);
			$stmt_price->fetch();
			$stmt_price->close();

		

			if ($id_room == '1' && $meal_option == 'включено') {
				$total_price += $meal_coast;
			} else if ($id_room == '2' && $meal_option == 'включено') {
				$total_price += $meal_coast;
			} elseif ($id_room == '3' && $meal_option == 'включено') {
				$total_price += $meal_coast;
			}

			$total_sum = $total_price * $nights;

			$stmt = $mysqli->prepare("INSERT INTO bookings (id_booking, FK_room, FK_покупатель, check_in_date, check_out_date, nights, meal_option, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("siissisi", $order, $id_room, $user_id, $check_in_date, $check_out_date, $nights, $meal_option, $total_sum);
			$stmt->execute();




			$query = "TRUNCATE `booking_memory`";
			$mysqli->query($query);
			$mysqli->close();
			header("Location: cabinet.php?success=10");
			exit();

		}
}

?>