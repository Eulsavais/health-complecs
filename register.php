<?php
session_start();

// Проверяем, была ли отправлена форма методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, были ли переданы все необходимые поля
    if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        // Получаем данные из формы
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Проверяем, совпадают ли пароли
        if ($password !== $confirm_password) {						
						header("Location: index.php?success=6");
            exit();
        }

        // Подключение к базе данных
				require('connect.php');

        // Проверяем, существует ли пользователь с таким же логином или email
        $stmt = $mysqli->prepare("SELECT user_id FROM users WHERE login = ? OR email = ?");
        $stmt->bind_param("ss", $login, $email);
        $stmt->execute();
        $stmt->store_result();

        // Если пользователь существует, выводим сообщение об ошибке
        if ($stmt->num_rows > 0) {
						header("Location: index.php?success=5");
            exit();
        }

        // Закрываем запрос
        $stmt->close();

        // Хэшируем пароль
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Подготовка запроса для добавления нового пользователя
        $stmt = $mysqli->prepare("INSERT INTO users (login, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $login, $email, $hashed_password);

        // Выполнение запроса
        if ($stmt->execute()) {
            header("Location: index.php?success=3");
            exit();
        } else {
            echo "Ошибка при регистрации: " . $stmt->error;
            header("Location: index.php");
            exit();
        }

        // Закрытие соединения
        $stmt->close();
        $mysqli->close();
    } else {
        echo "Не все поля были заполнены.";
        exit();
    }
}
?>
