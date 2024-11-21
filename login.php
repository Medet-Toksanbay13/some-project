<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Неверный логин или пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Навигация -->
    <header>
        <div class="logo">
            <h1>LineGames</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home_page.html">Главная</a></li> 
                <li><a href="games_page.html">Игры</a></li>
                <li><a href="library_page.html">Библиотека</a></li>
                <li><a href="communication_page.html">Сообщество</a></li>
                <li><a href="profile_page.html">Профиль</a></li>
            </ul>
        </nav>
    </header>

    <!-- Форма для входа -->
    <section class="login-form">
        <form action="login.php" method="POST">
            <h1>Вход</h1>
            <input type="text" name="username" placeholder="Логин" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Войти</button>
            <a href="register.php">Нет аккаунта? Зарегистрироваться</a>
        </form>
    </section>

    <!-- Футер -->
    <footer>
        <p>&copy; 2024 LineGames. Все права защищены.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>


