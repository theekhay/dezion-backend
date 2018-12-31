<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UnAssimilatedBucketApiTest extends TestCase
{
    use MakeUnAssimilatedBucketTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUnAssimilatedBucket()
    {
        $unAssimilatedBucket = $this->fakeUnAssimilatedBucketData();
        $this->json('POST', '/api/v1/unAssimilatedBuckets', $unAssimilatedBucket);

        $this->assertApiResponse($unAssimilatedBucket);
    }

    /**
     * @test
     */
    public function testReadUnAssimilatedBucket()
    {
        $unAssimilatedBucket = $this->makeUnAssimilatedBucket();
        $this->json('GET', '/api/v1/unAssimilatedBuckets/'.$unAssimilatedBucket->id);

        $this->assertApiResponse($unAssimilatedBucket->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUnAssimilatedBucket()
    {
        $unAssimilatedBucket = $this->makeUnAssimilatedBucket();
        $editedUnAssimilatedBucket = $this->fakeUnAssimilatedBucketData();

        $this->json('PUT', '/api/v1/unAssimilatedBuckets/'.$unAssimilatedBucket->id, $editedUnAssimilatedBucket);

        $this->assertApiResponse($editedUnAssimilatedBucket);
    }

    /**
     * @test
     */
    public function testDeleteUnAssimilatedBucket()
    {
        $unAssimilatedBucket = $this->makeUnAssimilatedBucket();
        $this->json('DELETE', '/api/v1/unAssimilatedBuckets/'.$unAssimilatedBucket->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/unAssimilatedBuckets/'.$unAssimilatedBucket->id);

        $this->assertResponseStatus(404);
    }
}
