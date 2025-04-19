<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avito</title>
</head>
<body>
    <div id="form">
        <form action="save.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" required><br><br>
            <label for="category">Category</label>
            <select name="category" required>
                <?php
                    $categories = ['business', 'equipment', 'materials', 'other'];
                    foreach ($categories as $category) {
                        echo "<option value=\"$category\">" . htmlspecialchars($category) . "</option>";
                    }
                ?>
            </select><br><br>
            <label for="title">Title</label>
            <input type="text" name="title" required>
            <label for="description">Decsription</label>
            <textarea rows="3" name="description" required></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Decsroption</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $dir = 'categories';
                    foreach (['business', 'equipment', 'materials', 'other'] as $category) {
                        $categoryDir = "$dir/$category";
                        if (is_dir($categoryDir)) {
                            $files = scandir($categoryDir);
                            foreach ($files as $file) {
                                if (in_array($file, ['.', '..'])) continue;
                                $filePath = "$categoryDir/$file";
                                $content = file_get_contents($filePath);
                                $lines = explode("\n", $content);
                                $email = $lines[0];
                                $description = implode("\n", array_slice($lines, 1));
                                $title = basename($file, '.txt');
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($email) . "</td>";
                                echo "<td>" . htmlspecialchars($category) . "</td>";
                                echo "<td>" . htmlspecialchars($title) . "</td>";
                                echo "<td>" . nl2br(htmlspecialchars($description)) . "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

