<?php
$apiKey = "sk-proj-xg7fgV4HZUNPdKkVg3JOT3BlbkFJPoWPAfh9pHRTjdC1otVb";

$response = '';
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
        $response = 'Error: ' . curl_error($ch);
    } else {
        curl_close($ch);

        $response = json_decode($result, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log('JSON decode error: ' . json_last_error_msg());
            $response = 'JSON decode error: ' . json_last_error_msg();
        } elseif (isset($response['error'])) {
            error_log('API error: ' . $response['error']['message']);
            $response = 'API error: ' . $response['error']['message'];
        } else {
            $response = $response['choices'][0]['message']['content'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI Integration</title>
</head>
<body>
    <h1>Ask OpenAI</h1>
    <form id="aiForm" method="post" action="">
        <label for="question">Enter your question:</label>
        <textarea id="question" name="question" rows="4" cols="50" required></textarea>
        <br><br>
        <input type="submit" value="Get Response">
    </form>
    <br>
    <div id="response">
        <?php if ($response): ?>
            <h2>AI Response:</h2>
            <p><?php echo htmlspecialchars($response); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
