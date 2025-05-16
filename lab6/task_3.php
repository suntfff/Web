<?php
// Парсит JSON и при ошибке бросает исключение
function parseJson(string $body): array {
    $data = json_decode($body, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new RuntimeException('JSON parse error: ' . json_last_error_msg());
    }
    return $data;
}

// Проверяет HTTP-код и при ошибках бросает исключение
function assertHttpStatus(int $code, string $body): void {
    if ($code >= 200 && $code < 300) {
        return;
    }
    if ($code >= 400 && $code < 500) {
        throw new RuntimeException("Client error ({$code}):\n{$body}");
    }
    if ($code >= 500) {
        throw new RuntimeException("Server error ({$code}):\n{$body}");
    }
    throw new RuntimeException("Unexpected HTTP status {$code}:\n{$body}");
}

// Выполняет cURL-запрос, проверяет ошибки, код и JSON; возвращает массив
function executeCurlRequest($curl): array {
    // вернуть тело как строку
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $body = curl_exec($curl);
    if ($body === false) {
        throw new RuntimeException('cURL error: ' . curl_error($curl));
    }

    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    assertHttpStatus($httpCode, $body);

    return parseJson($body);
}
?>