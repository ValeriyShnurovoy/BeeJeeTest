<?php
namespace App\Lib;

class Validator
{
    /**
     * @param string $email
     *
     * @return bool
     */
    public static function validateEmail($email)
    {
        $result = false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }

        return $result;
    }

}