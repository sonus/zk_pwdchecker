<?php

declare(strict_types=1);

namespace App\Service\Password;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class PasswordDto
{
    #[Assert\NotBlank()]
    #[Assert\Regex(['pattern' => '/\d/', 'match' => true, 'message' => 'Your password should contain a number'])]
    #[Assert\Regex(['pattern' => '/^.{5,}$/', 'match' => true, 'message' => 'Your password should 5 characters length'])]
    #[Assert\Regex(['pattern' => '/(.)\1\1/', 'match' => false, 'message' => 'Repeating consecutive characters are not allowed.'])]
    #[Assert\Regex(['pattern' => '/(?=.*[A-Z]|[^a-zA-Z0-9])/', 'match' => true, 'message' => 'Atleast one uppercase or special characters in required'])]
    #[Assert\NotCompromisedPassword()]
    public string $password;
}
