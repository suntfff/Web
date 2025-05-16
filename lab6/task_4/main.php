<?php

require 'ApiClient.php';

// Инициализация клиента
$client = new ApiClient('https://jsonplaceholder.typicode.com', [
    'user' => 'test',
    'pass' => '12345'
]);

try {
    // Пример GET-запроса
    $posts = $client->get('/posts', ['userId' => 1]);
    echo "Последние посты:\n";
    foreach (array_slice($posts, 0, 3) as $post) {
        echo "- {$post['title']}\n";
    }
    $newPost = $client->post('/posts', [
        'title' => 'Новый пост',
        'body' => 'Содержание поста',
        'userId' => 1
    ]);
    echo "\nСоздан пост ID: {$newPost['id']}\n";
    $updatedPost = $client->put("/posts/{$newPost['id']}", [
        'title' => 'Обновленный заголовок'
    ]);
    echo "Обновлен пост: {$updatedPost['title']}\n";
    $result = $client->delete("/posts/{$newPost['id']}");
    echo "Результат удаления: ".($result ? 'Успешно' : 'Ошибка')."\n";

} catch (RuntimeException $e) {
    echo "Ошибка API: ".$e->getMessage()."\n";
}
?>