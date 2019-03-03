<?php

use App\Modules\finmanager\Models\Bank;
use App\Modules\finmanager\Repositories\BankRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BankRepositoryTest extends TestCase
{
    use MakeBankTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BankRepository
     */
    protected $bankRepo;

    public function setUp()
    {
        parent::setUp();
        $this->bankRepo = App::make(BankRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBank()
    {
        $bank = $this->fakeBankData();
        $createdBank = $this->bankRepo->create($bank);
        $createdBank = $createdBank->toArray();
        $this->assertArrayHasKey('id', $createdBank);
        $this->assertNotNull($createdBank['id'], 'Created Bank must have id specified');
        $this->assertNotNull(Bank::find($createdBank['id']), 'Bank with given id must be in DB');
        $this->assertModelData($bank, $createdBank);
    }

    /**
     * @test read
     */
    public function testReadBank()
    {
        $bank = $this->makeBank();
        $dbBank = $this->bankRepo->find($bank->id);
        $dbBank = $dbBank->toArray();
        $this->assertModelData($bank->toArray(), $dbBank);
    }

    /**
     * @test update
     */
    public function testUpdateBank()
    {
        $bank = $this->makeBank();
        $fakeBank = $this->fakeBankData();
        $updatedBank = $this->bankRepo->update($fakeBank, $bank->id);
        $this->assertModelData($fakeBank, $updatedBank->toArray());
        $dbBank = $this->bankRepo->find($bank->id);
        $this->assertModelData($fakeBank, $dbBank->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBank()
    {
        $bank = $this->makeBank();
        $resp = $this->bankRepo->delete($bank->id);
        $this->assertTrue($resp);
        $this->assertNull(Bank::find($bank->id), 'Bank should not exist in DB');
    }
}
