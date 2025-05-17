<?php
if (!isset($_POST["email"], $_POST["category"], $_POST["title"], $_POST["description"])) {
    header('Location: /');
    exit();
}
$email = $_POST["email"];
$category = $_POST["category"];
$title = $_POST["title"];
$description = $_POST["description"];
$categoryDir = "categories/$category";
if (!is_dir($categoryDir)) {
    mkdir($categoryDir, 0777, true);
}
$file_path = "$categoryDir/{$title}.txt";
$content = $email . "\n" . $description;
if (false === file_put_contents($file_path, $content)) {
    throw new Exception("Something went wrong");
}
header("Location: /");
exit();
?>
