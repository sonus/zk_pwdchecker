<?php

namespace App\Entity;

use App\Repository\PasswordsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PasswordsRepository::class)]
class Passwords
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 20)]
    private $password;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $valid;

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getValid(): ?int
    {
        return $this->valid;
    }

    public function setValid(?int $valid): self
    {
        $this->valid = $valid;

        return $this;
    }
}
