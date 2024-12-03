<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="login.php">Войти</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="login-container">
            <h1>Вход</h1>
            <?php if (!empty($error_message)): ?>
                <p class="error"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
            <form method="post" action="login.php" class="login-form">
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="username" maxlength="20" placeholder="Введите имя (макс. 20 символов)" required>
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" class="btn-submit">Войти</button>
            </form>
        </div>
    </main>

</body>
</html>
