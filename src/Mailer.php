<?php

class Mailer
{
    public function sendMessage($email, $message)
    {
        if (empty($email) === true) {
            throw new Exception();
        }
        // Use mail() or PHPMailer for example
        sleep(3);

        echo "send '$message' to '$email'";
        return true;
    }
}