<?php

namespace Ilinuminates\Hashes;

class Hash
{


    /**
     * @param string $value
     * 
     * @return string
     */
    public static  function encrypt(string $value): string
    {
        $cipher = config('session.encryption_mode');
        $key = config('session.encryption_key');
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($value, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
        $chipertext = base64_encode($iv . $hmac . $ciphertext_raw);
        return $chipertext;
    }

    /**
     * @param string $chipertext
     * 
     * @return string
     */
    public static   function decrypt(string $chipertext): string
    {
        $cipher = config('session.encryption_mode');
        $key = config('session.encryption_key');
        $convert = base64_decode($chipertext);
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($convert, 0, $ivlen);
        $hmac = substr($convert, $ivlen, 32);
        $ciphertext_raw = substr($convert, $ivlen + 32);
        $original_text = openssl_decrypt($ciphertext_raw, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
        if (hash_equals($hmac, $calcmac)) {
            return $original_text;
        }
        return '';
    }

    /**
     * @param string $password
     * 
     * @return string
     */
    public static function make(string $password): string
    {
        return password_hash($password, config('hash.bcrypt_algo'));
    }
    /**
     * @param string $password
     * @param string $hash
     * 
     * @return bool
     */
    public static  function check(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
