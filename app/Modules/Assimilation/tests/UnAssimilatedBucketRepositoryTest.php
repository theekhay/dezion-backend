<?php

use App\Modules\Assimilation\Models\UnAssimilatedBucket;
use App\Modules\Assimilation\Repositories\UnAssimilatedBucketRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UnAssimilatedBucketRepositoryTest extends TestCase
{
    use MakeUnAssimilatedBucketTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UnAssimilatedBucketRepository
     */
    protected $unAssimilatedBucketRepo;

    public function setUp()
    {
        parent::setUp();
        $this->unAssimilatedBucketRepo = App::make(UnAssimilatedBucketRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUnAssimilatedBucket()
    {
        $unAssimilatedBucket = $this->fakeUnAssimilatedBucketData();
        $createdUnAssimilatedBucket = $this->unAssimilatedBucketRepo->create($unAssimilatedBucket);
        $createdUnAssimilatedBucket = $createdUnAssimilatedBucket->toArray();
        $this->assertArrayHasKey('id', $createdUnAssimilatedBucket);
        $this->assertNotNull($createdUnAssimilatedBucket['id'], 'Created UnAssimilatedBucket must have id specified');
        $this->assertNotNull(UnAssimilatedBucket::find($createdUnAssimilatedBucket['id']), 'UnAssimilatedBucket with given id must be in DB');
        $this->assertModelData($unAssimilatedBucket, $createdUnAssimilatedBucket);
    }

    /**
     * @test read
     */
    public function testReadUnAssimilatedBucket()
    {
        $unAssimilatedBucket = $this->makeUnAssimilatedBucket();
        $dbUnAssimilatedBucket = $this->unAssimilatedBucketRepo->find($unAssimilatedBucket->id);
        $dbUnAssimilatedBucket = $dbUnAssimilatedBucket->toArray();
        $this->assertModelData($unAssimilatedBucket->toArray(), $dbUnAssimilatedBucket);
    }

    /**
     * @test update
     */
    public function testUpdateUnAssimilatedBucket()
    {
        $unAssimilatedBucket = $this->makeUnAssimilatedBucket();
        $fakeUnAssimilatedBucket = $this->fakeUnAssimilatedBucketData();
        $updatedUnAssimilatedBucket = $this->unAssimilatedBucketRepo->update($fakeUnAssimilatedBucket, $unAssimilatedBucket->id);
        $this->assertModelData($fakeUnAssimilatedBucket, $updatedUnAssimilatedBucket->toArray());
        $dbUnAssimilatedBucket = $this->unAssimilatedBucketRepo->find($unAssimilatedBucket->id);
        $this->assertModelData($fakeUnAssimilatedBucket, $dbUnAssimilatedBucket->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUnAssimilatedBucket()
    {
        $unAssimilatedBucket = $this->makeUnAssimilatedBucket();
        $resp = $this->unAssimilatedBucketRepo->delete($unAssimilatedBucket->id);
        $this->assertTrue($resp);
        $this->assertNull(UnAssimilatedBucket::find($unAssimilatedBucket->id), 'UnAssimilatedBucket should not exist in DB');
    }
}
