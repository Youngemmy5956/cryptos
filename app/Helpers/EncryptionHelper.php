<?php

namespace App\Helpers;

class EncryptionHelper
{

    private static function encrypt_decrypt($action, $string, $key, $secret)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        // hash
        $hashed_key = hash('sha256', $key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret), 0, 16);
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $hashed_key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $hashed_key, 0, $iv);
        }
        return $output;
    }

    static function encrypt($string, $key, $secret)
    {
        return self::encrypt_decrypt("encrypt", $string, $key, $secret);
    }

    static function decrypt($string, $key, $secret)
    {
        return self::encrypt_decrypt("decrypt", $string, $key, $secret);
    }
}
