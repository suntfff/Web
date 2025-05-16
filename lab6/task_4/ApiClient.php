<?php

require __DIR__ . '/../task_3.php';

class ApiClient {
    private string $baseUrl;
    private array $defaultHeaders = [];

    public function __construct(string $baseUrl, array $auth = []) {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->setAuth($auth);
    }
    public function setAuth(array $auth): void {
        if (isset($auth['token'])) {
            $this->defaultHeaders[] = "Authorization: Bearer {$auth['token']}";
        } elseif (isset($auth['user']) && isset($auth['pass'])) {
            $this->defaultHeaders[] = "Authorization: Basic ".base64_encode("{$auth['user']}:{$auth['pass']}");
        }
    }
    public function get(string $endpoint, array $params = []): array {
        return $this->executeRequest('GET', $endpoint, $params);
    }
    public function post(string $endpoint, array $data): array {
        return $this->executeRequest('POST', $endpoint, $data);
    }
    public function put(string $endpoint, array $data): array {
        return $this->executeRequest('PUT', $endpoint, $data);
    }
    public function delete(string $endpoint): array {
        return $this->executeRequest('DELETE', $endpoint);
    }
    private function executeRequest(string $method, string $endpoint, array $data = []): array {
        $url = $this->baseUrl . '/' . ltrim($endpoint, '/');
        $curl = curl_init();
        try {
            $options = [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_HTTPHEADER => $this->defaultHeaders,
            ];
            if ($method === 'GET' && !empty($data)) {
                $url .= '?' . http_build_query($data);
            } elseif (in_array($method, ['POST', 'PUT'])) {
                $options[CURLOPT_POSTFIELDS] = json_encode($data);
                $this->defaultHeaders[] = 'Content-Type: application/json';
            }

            $options[CURLOPT_URL] = $url;
            curl_setopt_array($curl, $options);

            return executeCurlRequest($curl);
        } finally {
            curl_close($curl);
        }
    }
}
?>
