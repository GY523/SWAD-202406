<?php session_start();

$commentLog = 'log_entries.txt';
$key = "my-secret-key";

$errors = array();
$status = "";

// Add function for data encryption
function encryptData($data, $key) {
    $method = 'aes-256-cbc';
    $ivLength = openssl_cipher_iv_length($method);
    $iv = openssl_random_pseudo_bytes($ivLength);
    
    if (strlen($iv) !== $ivLength) {
        $iv = openssl_random_pseudo_bytes($ivLength);
    }

    $paddedData = $data . str_repeat("\0", 16 - (strlen($data) % 16));
    $encrypted	=	openssl_encrypt($paddedData, $method, $key, OPENSSL_RAW_DATA, $iv);
    $encryptedWithIV = $iv . $encrypted; 
    return base64_encode($encryptedWithIV);
}   

// Add handle form submission and data encryption
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = trim($_POST['message']); 
    if (empty($message)) {
        $errors['message'] = "Message is required.";
    } elseif (strlen($message) > 255) {
        $errors['message'] = "Message must be less than 255 characters.";
    }
    
    if (empty($errors)) {
        $encryptedMessage = encryptData($message, $key);
    
        if	(file_put_contents($commentLog,	$encryptedMessage . PHP_EOL, FILE_APPEND) === false) {
            $errors['file'] = "Failed to save the message. Please try again.";
        } else {
            $status = "Message submitted successfully!";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Encrypted Comment Log</title>
</head>
<body>
    <h1>Encrypted Comment Log</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <textarea	name="message" placeholder="Leave	a	comment  here..."
        required></textarea><br>
        <?php if (!empty($errors['message'])) : ?>
        <p style="color: red;"><?php echo $errors['message']; ?></p>
        <?php endif; ?>
        <?php if (!empty($status)) : ?>
        <p style="color: green;"><?php echo $status; ?></p>
        <?php endif; ?>
        <input type="submit" value="Submit">
    </form>

    <?php if (!empty($errors['file'])) : ?>
    <p style="color: red;"><?php echo $errors['file']; ?></p>
    <?php endif; ?>
</body>
</html>


