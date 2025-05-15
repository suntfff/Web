<?php
//Выполняет GET-запрос с кастомными HTTP-заголовками.
function getRequestWithHeaders(string $url, array $headers)
{
    $options = [
        'http' => [
            'method' => 'GET',
            'header' => implode("\r\n", $headers),
        ],
    ];
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

 //Отправляет JSON-данные в теле POST-запроса.
function postJson(string $url, array $data, array $headers = [])
{
    $jsonData = json_encode($data);
    $defaultHeaders = [
        'Content-Type: application/json',
        'Content-Length: '.strlen($jsonData),
    ];
    $allHeaders = array_merge($headers, $defaultHeaders);
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => implode("\r\n", $allHeaders),
            'content' => $jsonData,
        ],
    ];
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}


 //Отправляет GET-запрос с параметрами URL.
function getRequestWithParams(string $url, array $params)
{
    $queryString = http_build_query($params);
    $fullUrl = $url . (str_contains($url, '?') ? '&' : '?') . $queryString;
    return file_get_contents($fullUrl);
}
?>