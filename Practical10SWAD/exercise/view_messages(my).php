<?php
//read the cipher text from log

$commentLog = 'log_entries.txt';
$key = "my-secret-key";

$errors = array();
$status = "";
$ciphertxt = file_get_contents($commentLog);
echo $ciphertxt;

//decrypt 
function decryptdata($ciphertxt,$key){
    $method = 'aes-256-cbc';
    $ivLength = openssl_cipher_iv_length($method);
}
//display to plaintext
?>