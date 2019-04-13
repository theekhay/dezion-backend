<?php

use App\Modules\finmanager\Models\CardTransaction;
use App\Modules\finmanager\Repositories\CardTransactionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CardTransactionRepositoryTest extends TestCase
{
    use MakeCardTransactionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CardTransactionRepository
     */
    protected $cardTransactionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cardTransactionRepo = App::make(CardTransactionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCardTransaction()
    {
        $cardTransaction = $this->fakeCardTransactionData();
        $createdCardTransaction = $this->cardTransactionRepo->create($cardTransaction);
        $createdCardTransaction = $createdCardTransaction->toArray();
        $this->assertArrayHasKey('id', $createdCardTransaction);
        $this->assertNotNull($createdCardTransaction['id'], 'Created CardTransaction must have id specified');
        $this->assertNotNull(CardTransaction::find($createdCardTransaction['id']), 'CardTransaction with given id must be in DB');
        $this->assertModelData($cardTransaction, $createdCardTransaction);
    }

    /**
     * @test read
     */
    public function testReadCardTransaction()
    {
        $cardTransaction = $this->makeCardTransaction();
        $dbCardTransaction = $this->cardTransactionRepo->find($cardTransaction->id);
        $dbCardTransaction = $dbCardTransaction->toArray();
        $this->assertModelData($cardTransaction->toArray(), $dbCardTransaction);
    }

    /**
     * @test update
     */
    public function testUpdateCardTransaction()
    {
        $cardTransaction = $this->makeCardTransaction();
        $fakeCardTransaction = $this->fakeCardTransactionData();
        $updatedCardTransaction = $this->cardTransactionRepo->update($fakeCardTransaction, $cardTransaction->id);
        $this->assertModelData($fakeCardTransaction, $updatedCardTransaction->toArray());
        $dbCardTransaction = $this->cardTransactionRepo->find($cardTransaction->id);
        $this->assertModelData($fakeCardTransaction, $dbCardTransaction->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCardTransaction()
    {
        $cardTransaction = $this->makeCardTransaction();
        $resp = $this->cardTransactionRepo->delete($cardTransaction->id);
        $this->assertTrue($resp);
        $this->assertNull(CardTransaction::find($cardTransaction->id), 'CardTransaction should not exist in DB');
    }
}
