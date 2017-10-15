<?php

class Encryption
{
    var $skey = "SuPerEncKey2010";
    const EMAIL_SECRET_KEY = '1xx6LQETAaaABd38CYPGh7rKtzUfumbyc63';
    const EMAIL_SECRET_IV = 'uu8mmlxxx1xQETa4Agfv986ebvgbvC7_rDb';
    const MAIL_KEY = "SuPerEncKey2014b";
    const MAIL_EXPIRE_TIME = 1209600; //INCLUDED IN VERIFY URL LINK 2 weeks
    const ENCRYPT_METHOD = "AES-256-CBC";
    const ENCRYPT_HASH_ALGO = "sha256";

    public function safe_b64encode($string)
    {

        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }

    public function safe_b64decode($string)
    {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public function encode2($value)
    {

        if (!$value) {
            return false;
        }
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext));
    }

    public function decode2($value)
    {

        if (!$value) {
            return false;
        }
        $crypttext = $this->safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }

    /**
     * Encryption decryption for verifying accounts
     * @uses Constant EMAIL_SECRET_KEY
     * @uses Constant EMAIL_SECRET_IV
     * @uses Constant ENCRYPT_METHOD
     * @uses Constant ENCRYPT_HASH_ALGO
     *
     * @param string $action: 'encrypt' or 'decrypt' (ONLY)
     * @param string $string: string to encrypt or decrypt
     *
     * @return string
     */
    public function encode($string) {
        $output = false;
        $key = hash(self::ENCRYPT_HASH_ALGO, self::EMAIL_SECRET_KEY);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash(self::ENCRYPT_HASH_ALGO, self::EMAIL_SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, self::ENCRYPT_METHOD, $key, 0, $iv);
        $output = $this->safe_b64encode($output);
        return trim($output);
    }
    public function decode($string) {
        $output = false;
        $key = hash(self::ENCRYPT_HASH_ALGO, self::EMAIL_SECRET_KEY);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash(self::ENCRYPT_HASH_ALGO, self::EMAIL_SECRET_IV), 0, 16);
        $output = openssl_decrypt($this->safe_b64decode($string), self::ENCRYPT_METHOD, $key, 0, $iv);
        return trim($output);
    }
}

