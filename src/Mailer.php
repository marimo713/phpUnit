<?php

class Mailer
{
    public function sendMessage($email, $message)
    {
        // Use mail() or PHPMailer for example
        sleep(3);

        echo "send '$message' to '$email'";
        return true;
    }
}