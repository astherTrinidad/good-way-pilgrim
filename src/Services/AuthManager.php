<?php
namespace App\Services;

class AuthManager {
    
    public function validatePassword($password){
        if (!$this->isPartLowercase($password) || !$this->isPartUppercase($password) || strlen($password) < 8) {
            return false;
        }
        return true;
    }
    function isPartUppercase($string)
    {
        return (bool) preg_match('/[A-Z]/', $string);
    }

    function isPartLowercase($string)
    {
        return (bool) preg_match('/[a-z]/', $string);
    }

}
