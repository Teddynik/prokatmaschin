
<!DOCTYPE html>
<html lang="ru">
<?php
// Подключение внешнего файла
$items = include 'process.php';

$defaultCarID = $items[0]['CarID'];
$defaultPrice = $items[0]['Price'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оплата бронирования автомобиля</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Создание объекта цен для динамического обновления
        const carPrices = <?= json_encode(array_column($items, 'Price', 'CarID')) ?>;

        function updatePrice() {
            const selectedCarID = document.getElementById('item').value;
            const priceDisplay = document.getElementById('priceDisplay');
            priceDisplay.textContent = carPrices[selectedCarID] + ' тг.';
        }
    </script>
</head>
<body onload="updatePrice()">
    
<header>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="login.php">Войти</a></li>
            </ul>
        </nav>
    </header>

<div class="container">
    <h1>Оплата бронирования</h1>

    <!-- Информация о бронировании -->
    <div class="section">
        <h2>Информация о бронировании</h2>
        <p><strong>Модель автомобиля:</strong>
         
<form action="process.php" method="post">
                <select name="item" id="item" onchange="updatePrice()">
                    <?php foreach ($items as $item): ?>
                        <option value="<?= htmlspecialchars($item['CarID']) ?>" 
                                <?= $item['CarID'] === $defaultCarID ? 'selected' : '' ?>>
                            <?= htmlspecialchars($item['full_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
             </p>
<p><strong>Дата начала аренды:</strong><input type="date" id="start-date" name="start_date" required></p>   
<p><strong>Дата окончания аренды:</strong><input type="date" id="end-date" name="end_date" required></p>
        <p><strong>Место получения:</strong> Где то</p>
        <p><strong>Стоимость аренды:</strong> <span id="priceDisplay"><?= $defaultPrice ?>—</span></p>
    </form>
    </div>

    <!-- Контактные данные клиента -->
    <div class="section">
        <h2>Контактные данные</h2>
        <form action="submit.php" method="POST">
            <label for="FirstName">Имя:</label>
            <input type="text" id="FirstName" name="FirstName" required>
            
            <label for="LastName">Фамилия:</label>
            <input type="text" id="LastName" name="LastName" required>

            <label for="IIN">ИИН:</label>
            <input type="text" id="IIN" name="IIN" required>
            
            <label for="PhoneNumber">Телефон:</label>
            <input type="text" id="pPhoneNumber" name="PhoneNumber" required>

            <label for="Email">Почта:</label>
            <input type="text" id="Email" name="Email" required>

        
    

    

    <!-- Кнопки подтверждения и возврата -->
    <div class="button-container">
        <button class="button" type="submit">Подтвердить</button>
        <button class="button back-button" a href="pay.php">Вернуться на главную</button>
    </div>
    </form>

</div>

</div>





</body>
</html>
