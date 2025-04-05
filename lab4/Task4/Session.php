<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['phone_brand'] = $_POST['phone_brand'];
    $_SESSION['phone_model'] = $_POST['phone_model'];
    $_SESSION['price'] = $_POST['price'];
    echo "Phone brand: " . $_SESSION['phone_brand'] . "<br>";
    echo "Phone model: " . $_SESSION['phone_model'] . "<br>";
    echo "Price: " . $_SESSION['price'] . "<br>";
}
?>
