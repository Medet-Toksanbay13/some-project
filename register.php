<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);
        echo "Регистрация прошла успешно!";
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Навигация -->
    <header>
        <div class="logo">
            <h1>LineGames</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.html">Главная</a></li>
                <li><a href="games.html">Игры</a></li>
                <li><a href="community.html">Сообщество</a></li>
                <li><a href="profile.html">Профиль</a></li>
            </ul>
        </nav>
    </header>

    <!-- Форма регистрации -->
    <section class="register-form">
        <form action="register.php" method="POST">
            <h1>Регистрация</h1>
            <input type="text" name="username" placeholder="Логин" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Зарегистрироваться</button>
            <a href="login.php">Уже есть аккаунт? Войти</a>
        </form>
    </section>

    <!-- Футер -->
    <footer>
        <p>&copy; 2024 LineGames. Все права защищены.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>