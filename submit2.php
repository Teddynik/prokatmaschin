<?php
// Параметры подключения к базе данных
$host = 'localhost';  // сервер
$dbname = 'prokat car';  // имя базы данных
$user = 'root';  // имя пользователя
$password = '';  // пароль

try {
    // Подключаемся к базе данных
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получаем данные из формы
    $brand = $_POST['Brand'];
    $model = $_POST['Model'];
    $year = $_POST['Year'];
    $kpp = $_POST['KPP'];
    $plate = $_POST['Plate'];
    $category = $_POST['Category'];
    $status = $_POST['Status'];
    $price = $_POST['Price'];
    $image = $_POST['image'];

    // Подготовка SQL-запроса для вставки данных
    $stmt = $pdo->prepare("INSERT INTO cars (Brand, Model, Year, KPP, Plate, Category, Status, Price, image) VALUES (:Brand, :Model, :Year, :KPP, :Plate, :Category, :Status, :Price, :image)");
    $stmt->bindParam(':Brand', $brand);
    $stmt->bindParam(':Model', $model);
    $stmt->bindParam(':Year', $year);
    $stmt->bindParam(':KPP', $kpp);
    $stmt->bindParam(':Plate', $plate);
    $stmt->bindParam(':Category', $category);
    $stmt->bindParam(':Status', $status);
    $stmt->bindParam(':Price', $price);
    $stmt->bindParam(':image', $image);
    

    // Выполнение запроса
    if ($stmt->execute()) {
        echo "<p>Данные успешно отправлены!</p>";
    } else {
        echo "<p>Произошла ошибка при отправке данных. Попробуйте снова.</p>";
    }
} catch (PDOException $e) {
    // Если ошибка подключения
    echo "Ошибка подключения: " . $e->getMessage();
}
?>