<?php

namespace App\Lib;


class Mailer
{
    /**
     * @param string $email E mail address
     * @param string $subject Message subject
     * @param string $message
     *
     * @return bool
     */
    public function sendMail($email, $subject, $message)
    {
        if (mail($email, $subject, $message)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}