<?php

namespace App\Controller;

use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;
use App\Service\Password\PasswordDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PasswordController extends AbstractController
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
    ) {
    }

    public function __invoke(Request $request): Response
    {
        try {
            $searchLogDto = $this->serializer->deserialize(
                $request->getContent(),
                PasswordDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new \InvalidArgumentException($e->getMessage());
        }
        $errors = $this->validator->validate($searchLogDto);
        if (count($errors)) {
            throw new ValidationException($errors);
        }

        return $this->json(data: [], status: Response::HTTP_NO_CONTENT);
    }
}
