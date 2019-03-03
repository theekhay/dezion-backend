<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CardTransactionApiTest extends TestCase
{
    use MakeCardTransactionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCardTransaction()
    {
        $cardTransaction = $this->fakeCardTransactionData();
        $this->json('POST', '/api/v1/cardTransactions', $cardTransaction);

        $this->assertApiResponse($cardTransaction);
    }

    /**
     * @test
     */
    public function testReadCardTransaction()
    {
        $cardTransaction = $this->makeCardTransaction();
        $this->json('GET', '/api/v1/cardTransactions/'.$cardTransaction->id);

        $this->assertApiResponse($cardTransaction->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCardTransaction()
    {
        $cardTransaction = $this->makeCardTransaction();
        $editedCardTransaction = $this->fakeCardTransactionData();

        $this->json('PUT', '/api/v1/cardTransactions/'.$cardTransaction->id, $editedCardTransaction);

        $this->assertApiResponse($editedCardTransaction);
    }

    /**
     * @test
     */
    public function testDeleteCardTransaction()
    {
        $cardTransaction = $this->makeCardTransaction();
        $this->json('DELETE', '/api/v1/cardTransactions/'.$cardTransaction->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cardTransactions/'.$cardTransaction->id);

        $this->assertResponseStatus(404);
    }
}
