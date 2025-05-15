<?php
// Выполнение GET-запроса для получения записи
function GetRequest(string $url): void {
    echo "--- GET-запрос ---\n";
    $curlHandler = curl_init($url);   
    curl_setopt_array($curlHandler, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FAILONERROR => true
    ]); 
    $response = curl_exec($curlHandler);
    if ($response === false) {
        echo "Ошибка при GET-запросе: ".curl_error($curlHandler)."\n";
    } else {
        echo "Ответ:\n$response\n";
    }
    curl_close($curlHandler);
    echo "------------------\n\n";
}

// Выполнение POST-запроса для создания записи
function PostRequest(string $url, array $payload): void {
    echo "--- POST-запрос ---\n";
    $curlHandler = curl_init($url);
    curl_setopt_array($curlHandler, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_FAILONERROR => true
    ]);
    $response = curl_exec($curlHandler);
    if ($response === false) {
        echo "Ошмбка при POST-запросе: ".curl_error($curlHandler) . "\n";
    } else {
        echo "Ответ:\n$response\n";
    } 
    curl_close($curlHandler);
    echo "-------------------\n\n";
}

// Выполнение PUT-запроса для обновления записи
function PutRequest(string $url, array $payload): void {
    echo "--- PUT-запрос ---\n";
    $curlHandler = curl_init($url);
    curl_setopt_array($curlHandler, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_FAILONERROR => true
    ]);
    $response = curl_exec($curlHandler); 
    if ($response === false) {
        echo "Ошибка при PUT-запросе: ".curl_error($curlHandler)."\n";
    } else {
        echo "Ответ:\n$response\n";
    } 
    curl_close($curlHandler);
    echo "------------------\n\n";
}

// Выполнение DELETE-запроса
function DeleteRequest(string $url): void {
    echo "--- DELETE-запрос ---\n";
    $curlHandler = curl_init($url);
    curl_setopt_array($curlHandler, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_FAILONERROR => true
    ]);
    $response = curl_exec($curlHandler);  
    if ($response === false) {
        echo "Ошибка при DELETE-запросе: ".curl_error($curlHandler). "\n";
    } else {
        echo "Ответ:\n".($response ?: 'Удалено, тело ответа отсутствует')."\n";
    } 
    curl_close($curlHandler);
    echo "----------------------\n\n";
}