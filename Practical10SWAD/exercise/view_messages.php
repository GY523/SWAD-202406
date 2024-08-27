<?php
$key = "my-secret-key";
$commentLog = 'log_entries.txt';

function decryptData($data, $key) {
    $method = 'aes-256-cbc';
    $ivLength = openssl_cipher_iv_length($method);
    $iv = substr($data, 0, $ivLength);
    $iv = str_pad($iv, $ivLength, "\0");
    $encryptedData = substr($data, $ivLength);
    $decrypted = openssl_decrypt($encryptedData, $method, $key, OPENSSL_RAW_DATA, $iv);
    return rtrim($decrypted, "\0");
}


$messages = array();

$encryptedMessages = file($commentLog, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if ($encryptedMessages !== false) {
    foreach ($encryptedMessages as $encryptedMessage) {
        $messages[] = decryptData(base64_decode($encryptedMessage), $key);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Comment Log Message</title>
</head>
<body>
    <h1>View Comment Log Message</h1>
    <?php if (empty($messages)) : ?>
        <p>No messages found.</p>
    <?php else : ?>
        <ul>
            <?php foreach ($messages as $message) : ?>
                <li><?php echo htmlspecialchars($message); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <p><a href="comment_log.php">Go back to Insert Comment Log</a></p>
</body>
</html>
