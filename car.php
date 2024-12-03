<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
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
    <div class="container">
    <div class="section">
        <h2>Добавить машину</h2>
        <form action="submit2.php" method="POST">
            <label for="Brand">Марка:</label>
            <input type="text" id="Brand" name="Brand" required>
            
            <label for="Model">Модель:</label>
            <input type="text" id="Model" name="Model" required>

            <label for="Year">Год выпуска:</label>
            <input type="text" id="Year" name="Year" required>
            
            <label for="KPP">Трансмиссия:</label>
            <input type="text" id="KPP" name="KPP" required>

            <label for="Plate">Номерной знак:</label>
            <input type="text" id="Plate" name="Plate" required>
            
            <label for="Category">Класс:</label>
            <input type="text" id="Category" name="Category" required>

            <label for="Status">Статус:</label>
            <input type="text" id="Status" name="Status" required>

            <label for="Price">Цена:</label>
            <input type="text" id="Price" name="Price" required>

            <label for="image">Изображение:</label>
            <input type="text" id="image" name="image" required>

            <div class="button-container">
            <button class="button" type="submit">Подтвердить</button>
            </div>

    </div>
    <script src="app.js"></script>
</div>
</body>
</html>
