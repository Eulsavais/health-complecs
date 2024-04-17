<?php
session_start();

require('connect.php');

// Получение данных из формы
$login = $_POST['login'];
$password = $_POST['password'];

// Подготовка запроса
$stmt = $mysqli->prepare("SELECT user_id, login, password FROM users WHERE login = ?");
$stmt->bind_param("s", $login);

// Выполнение запроса
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Пользователь найден, проверка пароля
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Пароль верный, сохранение данных в сессии
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['login'] = $row['login'];
				
				header("Location: cabinet.php?success=0");
				exit();

    } else {
			// неправильный пароль
				header("Location: index.php?success=2");
				exit();
    }
} else {
    // пользователь не найден
		header("Location: index.php?success=1");
		exit();
}

// Закрытие соединения
$stmt->close();
$mysqli->close();
?>
