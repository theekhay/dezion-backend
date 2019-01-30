<?php

use App\Modules\ministry\Models\Community;
use App\Modules\ministry\Repositories\CommunityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommunityRepositoryTest extends TestCase
{
    use MakeCommunityTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CommunityRepository
     */
    protected $communityRepo;

    public function setUp()
    {
        parent::setUp();
        $this->communityRepo = App::make(CommunityRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCommunity()
    {
        $community = $this->fakeCommunityData();
        $createdCommunity = $this->communityRepo->create($community);
        $createdCommunity = $createdCommunity->toArray();
        $this->assertArrayHasKey('id', $createdCommunity);
        $this->assertNotNull($createdCommunity['id'], 'Created Community must have id specified');
        $this->assertNotNull(Community::find($createdCommunity['id']), 'Community with given id must be in DB');
        $this->assertModelData($community, $createdCommunity);
    }

    /**
     * @test read
     */
    public function testReadCommunity()
    {
        $community = $this->makeCommunity();
        $dbCommunity = $this->communityRepo->find($community->id);
        $dbCommunity = $dbCommunity->toArray();
        $this->assertModelData($community->toArray(), $dbCommunity);
    }

    /**
     * @test update
     */
    public function testUpdateCommunity()
    {
        $community = $this->makeCommunity();
        $fakeCommunity = $this->fakeCommunityData();
        $updatedCommunity = $this->communityRepo->update($fakeCommunity, $community->id);
        $this->assertModelData($fakeCommunity, $updatedCommunity->toArray());
        $dbCommunity = $this->communityRepo->find($community->id);
        $this->assertModelData($fakeCommunity, $dbCommunity->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCommunity()
    {
        $community = $this->makeCommunity();
        $resp = $this->communityRepo->delete($community->id);
        $this->assertTrue($resp);
        $this->assertNull(Community::find($community->id), 'Community should not exist in DB');
    }
}
