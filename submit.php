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
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $iin = $_POST['IIN'];
    $phone = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];

    // Подготовка SQL-запроса для вставки данных
    $stmt = $pdo->prepare("INSERT INTO customer (FirstName, LastName, IIN, PhoneNumber, Email) VALUES (:FirstName, :LastName, :IIN, :PhoneNumber, :Email)");
    $stmt->bindParam(':FirstName', $fname);
    $stmt->bindParam(':LastName', $lname);
    $stmt->bindParam(':IIN', $iin);
    $stmt->bindParam(':PhoneNumber', $phone);
    $stmt->bindParam(':Email', $Email);

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