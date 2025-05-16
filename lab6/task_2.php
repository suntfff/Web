<?php
// 1. GET-запрос с кастомными HTTP-заголовками
function getWithHeaders(string $url, array $headers): void {
    echo "--- GET с заголовками ---\n";
    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_FAILONERROR => true,
    ]);
    $body = curl_exec($curl);
    if ($body === false) {
        echo "Ошибка GET: ".curl_error($curl)."\n";
    } else {
        echo "Ответ:\n$body\n";
    }
    curl_close($curl);
    echo "-------------------------\n\n";
}

 //Отправляет JSON-данные в теле POST-запроса.
function postJson(string $url, array $data, array $extraHeaders = []): void {
    echo "--- POST JSON ---\n";
    $json = json_encode($data);
    $headers = array_merge(
        ['Content-Type: application/json', 'Content-Length '.strlen($json)],
        $extraHeaders
    );
    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $json,
        CURLOPT_FAILONERROR => true,
    ]);
    $body = curl_exec($curl);
    if ($body === false) {
        echo "Ошибка POST: ".curl_error($curl)."\n";
    } else {
        echo "Ответ:\n$body\n";
    }
    curl_close($curl);
    echo "------------------\n\n";
}

 //Отправляет GET-запрос с параметрами URL.
function getWithParams(string $baseUrl, array $params): void {
    echo "--- GET с параметрами ---\n";
    $query = http_build_query($params);
    $url   = $baseUrl . (strpos($baseUrl, '?') === false ? '?' : '&').$query;
    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FAILONERROR => true,
    ]);
    $body = curl_exec($curl);
    if ($body === false) {
        echo "Ошибка GET с параметрами ".curl_error($curl)."\n";
    } else {
        echo "URL: $url\n";
        echo "Ответ:\n$body\n";
    }
    curl_close($curl);
    echo "---------------------------\n\n";
}
?>