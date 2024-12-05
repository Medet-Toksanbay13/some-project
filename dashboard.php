<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Цифровая платформа для игр</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
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
</body>
</html>


<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Добро пожаловать, " . htmlspecialchars($_SESSION['username']);
?>

<a href="logout.php">Выйти</a>