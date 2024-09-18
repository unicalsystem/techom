<?php
$apiKey = "secret-key";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'];

    $data = [
        'model' => 'gpt-4',
        'messages' => [
            ['role' => 'user', 'content' => $question]
        ]
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ]);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        error_log('cURL error: ' . curl_error($ch));
        echo 'Error: ' . curl_error($ch);
        exit();
    }
    curl_close($ch);

    $response = json_decode($result, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON decode error: ' . json_last_error_msg());
        echo 'JSON decode error: ' . json_last_error_msg();
        exit();
    }

    if (isset($response['error'])) {
        error_log('API error: ' . $response['error']['message']);
        echo 'API error: ' . $response['error']['message'];
        exit();
    }

    $aiResponse = $response['choices'][0]['message']['content'];

    header("Location: index.html?response=" . urlencode($aiResponse));
    exit();
}
?>
