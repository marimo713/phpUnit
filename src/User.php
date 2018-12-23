<?php

class User
{
    public $first_name;
    public $sure_name;
    public $email;

    public function getFullName()
    {
        return trim("$this->first_name $this->sure_name");
    }

    public function notify($message)
    {
        $mailer = new Mailer;

        return $mailer->sendMessage($this->email, $message);
    }
}