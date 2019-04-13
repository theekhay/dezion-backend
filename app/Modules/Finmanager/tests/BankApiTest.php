<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BankApiTest extends TestCase
{
    use MakeBankTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBank()
    {
        $bank = $this->fakeBankData();
        $this->json('POST', '/api/v1/banks', $bank);

        $this->assertApiResponse($bank);
    }

    /**
     * @test
     */
    public function testReadBank()
    {
        $bank = $this->makeBank();
        $this->json('GET', '/api/v1/banks/'.$bank->id);

        $this->assertApiResponse($bank->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBank()
    {
        $bank = $this->makeBank();
        $editedBank = $this->fakeBankData();

        $this->json('PUT', '/api/v1/banks/'.$bank->id, $editedBank);

        $this->assertApiResponse($editedBank);
    }

    /**
     * @test
     */
    public function testDeleteBank()
    {
        $bank = $this->makeBank();
        $this->json('DELETE', '/api/v1/banks/'.$bank->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/banks/'.$bank->id);

        $this->assertResponseStatus(404);
    }
}
