<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommunityApiTest extends TestCase
{
    use MakeCommunityTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCommunity()
    {
        $community = $this->fakeCommunityData();
        $this->json('POST', '/api/v1/communities', $community);

        $this->assertApiResponse($community);
    }

    /**
     * @test
     */
    public function testReadCommunity()
    {
        $community = $this->makeCommunity();
        $this->json('GET', '/api/v1/communities/'.$community->id);

        $this->assertApiResponse($community->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCommunity()
    {
        $community = $this->makeCommunity();
        $editedCommunity = $this->fakeCommunityData();

        $this->json('PUT', '/api/v1/communities/'.$community->id, $editedCommunity);

        $this->assertApiResponse($editedCommunity);
    }

    /**
     * @test
     */
    public function testDeleteCommunity()
    {
        $community = $this->makeCommunity();
        $this->json('DELETE', '/api/v1/communities/'.$community->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/communities/'.$community->id);

        $this->assertResponseStatus(404);
    }
}
