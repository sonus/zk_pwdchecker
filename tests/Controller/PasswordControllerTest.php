<?php

namespace App\Tests\Controller;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class PasswordControllerTest extends ApiTestCase
{
    private $client;
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->client = static::createClient();
    }

    public function testApiEndpoint(): void
    {
        $response = $this->client->request('GET', '/');
        $this->assertResponseIsSuccessful();
    }

    public function testEmptyPassword(): void
    {
        $body = ['password' => ''];
        $response = $this->client->request('POST', '/passwords', ['json' => $body]);
        $this->assertResponseStatusCodeSame(400);
    }

    public function testNoPasswordParameter(): void
    {
        $body = ['not_password_param' => 'iamssomeotherparam'];
        $response = $this->client->request('POST', '/passwords', ['json' => $body]);
        $this->assertResponseStatusCodeSame(400);
    }

    public function testSomePassword(): void
    {
        $body = ['password' => 'sdfsdfsdfs'];
        $response = $this->client->request('POST', '/passwords', ['json' => $body]);
        $this->assertResponseStatusCodeSame(204);
    }
}
