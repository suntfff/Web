<?php
if (!isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description'])) {
    header('Location: /');
    exit;
}
$email       = $_POST['email'];
$category    = $_POST['category'];
$title       = $_POST['title'];
$description = $_POST['description'];
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');
if (mysqli_connect_errno()) {
    printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}
$stmt = $mysqli->prepare(
    'INSERT INTO ad (email, category, title, description) VALUES (?, ?, ?, ?)'
);
$stmt->bind_param('ssss', $email, $category, $title, $description);

if (!$stmt->execute()) {
    throw new Exception('Ошибка вставки в БД: ' . $stmt->error);
}
$stmt->close();
$mysqli->close();
header('Location: /');
exit;
