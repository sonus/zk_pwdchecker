<?php

declare(strict_types=1);

namespace App\Service\Password;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class PasswordDto
{
    #[Assert\NotBlank()]
    public string $password;

    #[Assert\Callback()]
    public function validate(ExecutionContextInterface $context): void
    {
        if (isset($this->password) && !PasswordService::checkPassword($this->password)) {
            $context
                    ->buildViolation('The password is not valid')
                    ->atPath('password')
                    ->addViolation();
        }
    }
}
