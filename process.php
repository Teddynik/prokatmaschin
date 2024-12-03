<?php
// Параметры подключения к базе данных
$host = 'localhost';  // сервер
$dbname = 'prokat car';  // имя базы данных
$user = 'root';  // имя пользователя
$password = '';  // пароль

try {
    // Установите соединение с базой данных
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Выполните запрос для получения данных
    $stmt = $pdo->query("SELECT CarID, CONCAT(Brand, ' ', Model) AS full_name, Category, image, Price, KPP FROM cars");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Выведите ошибку подключения
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
return $items;
?>