<?php
session_start();
if (empty($_SESSION['logged_in'])) {
    header('Location: login.php'); // Перенаправление на страницу входа
    exit();
}
// Подключение внешнего файла
$items = include 'process.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Service</title>
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

    <main>
        <div class="marquee">
            Добро пожаловать в наш прокат автомобилей! Специальные предложения на аренду уже сегодня!
          </div>
        <section class="about-us">
            <h2>О нас</h2>
            <p>
                Мы являемся ведущей компанией по прокату автомобилей с более чем 10-летним опытом работы в этой отрасли. 
                Наша миссия - предоставлять высококачественные транспортные средства по конкурентоспособным ценам. Нужен ли вам автомобиль 
                для деловой поездки, отпуска или ежедневных поездок на работу у нас есть идеальное транспортное средство для вас.
            </p>
            <p>
                Наш автопарк включает в себя множество моделей, начиная от автомобилей эконом-класса и заканчивая автомобилями класса люкс, это гарантирует, что вы найдете то что 
                наилучшим образом соответствует вашим потребностям. Все транспортные средства проходят регулярное техническое обслуживание для обеспечения безопасности и комфорта на дороге.
            </p>
        </section>
        <h2>Доступные машины</h2>
        <section class="cars" id="cars">
        
            <div class="products">
                <?php foreach ($items as $item): ?>
                    <div class="product">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['full_name']) ?>">
                        <h2><?= htmlspecialchars($item['full_name']) ?></h2>
                        <p><strong>Класс:</strong> <?= htmlspecialchars($item['Category']) ?></p>
                        <p><strong>Трансмиссия:</strong> <?= htmlspecialchars($item['KPP']) ?></p>
                        <p><strong>Цена:</strong> <?= htmlspecialchars($item['Price']) ?> тг.</p>
                        <button class="book-now"><a href="pay.php">Забронировать</a></button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="services">
            <h2>Наши услуги</h2>
            <ul>
                <li>24/7 Поддержка</li>
            </ul>
        </section>

        <section class="contact-us">
            <h2>Связаться с нами</h2>
            <ul>
                <li>Почта: support@carrental.com</li>
                <li>Телефон: +7 (700) 123-4567</li>
                <li>Адрес: Car City</li>
                <li> <div id="chat">
                    <ul id="messages"></ul>
                    <form id="form">
                        <input id="input" autocomplete="off" placeholder="Введите сообщение..." />
                        <button id="send" type="submit">Отправить</button>
                    </form>
                </div>
            </li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Car Rental Service</p>
    </footer>

    <script src="app.js"></script>
</body>
</html>
