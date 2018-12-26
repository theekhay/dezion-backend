<?php

use App\Modules\Membership\Models\MemberDetail;
use App\Modules\Membership\Repositories\MemberDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MemberDetailRepositoryTest extends TestCase
{
    use MakeMemberDetailTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MemberDetailRepository
     */
    protected $memberDetailRepo;

    public function setUp()
    {
        parent::setUp();
        $this->memberDetailRepo = App::make(MemberDetailRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMemberDetail()
    {
        $memberDetail = $this->fakeMemberDetailData();
        $createdMemberDetail = $this->memberDetailRepo->create($memberDetail);
        $createdMemberDetail = $createdMemberDetail->toArray();
        $this->assertArrayHasKey('id', $createdMemberDetail);
        $this->assertNotNull($createdMemberDetail['id'], 'Created MemberDetail must have id specified');
        $this->assertNotNull(MemberDetail::find($createdMemberDetail['id']), 'MemberDetail with given id must be in DB');
        $this->assertModelData($memberDetail, $createdMemberDetail);
    }

    /**
     * @test read
     */
    public function testReadMemberDetail()
    {
        $memberDetail = $this->makeMemberDetail();
        $dbMemberDetail = $this->memberDetailRepo->find($memberDetail->id);
        $dbMemberDetail = $dbMemberDetail->toArray();
        $this->assertModelData($memberDetail->toArray(), $dbMemberDetail);
    }

    /**
     * @test update
     */
    public function testUpdateMemberDetail()
    {
        $memberDetail = $this->makeMemberDetail();
        $fakeMemberDetail = $this->fakeMemberDetailData();
        $updatedMemberDetail = $this->memberDetailRepo->update($fakeMemberDetail, $memberDetail->id);
        $this->assertModelData($fakeMemberDetail, $updatedMemberDetail->toArray());
        $dbMemberDetail = $this->memberDetailRepo->find($memberDetail->id);
        $this->assertModelData($fakeMemberDetail, $dbMemberDetail->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMemberDetail()
    {
        $memberDetail = $this->makeMemberDetail();
        $resp = $this->memberDetailRepo->delete($memberDetail->id);
        $this->assertTrue($resp);
        $this->assertNull(MemberDetail::find($memberDetail->id), 'MemberDetail should not exist in DB');
    }
}
