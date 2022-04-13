<?php

namespace App\Service\Password;

class PasswordDto
{
    /**
     * @Assert\Type(type={"string", "null"})
     * @var string|null
     */
    public $password;
}