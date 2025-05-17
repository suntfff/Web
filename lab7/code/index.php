<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Avito</title>
</head>
<body>
<h1>Новая запись</h1>
<form action="save.php" method="post">
    <label>Email<br>
        <input type="email" name="email" required>
    </label><br><br>
    <label>Category<br>
        <select name="category" required>
            <?php
            $categories = ['business', 'equipment', 'materials', 'other'];
            foreach ($categories as $category) {
                echo '<option value="'.htmlspecialchars($category).'">'.htmlspecialchars($category).'</option>';
            }
            ?>
        </select>
    </label><br><br>
    <label>Title<br>
        <input type="text" name="title" required>
    </label><br><br>
    <label>Description<br>
        <textarea name="description" rows="3" required></textarea>
    </label><br><br>
    <input type="submit" value="Submit">
</form>
<h2>Все объявления</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
    <tr>
        <th>Email</th>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $mysqli = new mysqli('db', 'root', 'helloworld', 'web');
    if ($mysqli->connect_errno) {
        echo 'Ошибка подключения к БД: ' . htmlspecialchars($mysqli->connect_error);
        exit;
    }
    $query = "SELECT email, category, title, description FROM ad ORDER BY created DESC";
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
            echo '<td>' . htmlspecialchars($row['category']) . '</td>';
            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
            echo '<td>' . nl2br(htmlspecialchars($row['description'])) . '</td>';
            echo '</tr>';
        }
        $result->free();
    }
    $mysqli->close();
    ?>
    </tbody>
</table>
</body>
</html>


