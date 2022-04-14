<?php

namespace App\Service\Password;

class PasswordService
{
    public static function checkPassword(string $password): bool
    {
        return !('' == $password);
    }
}
