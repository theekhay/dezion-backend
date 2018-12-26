<?php

use App\Modules\Membership\Models\MemberType;
use App\Modules\Membership\Repositories\MemberTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MemberTypeRepositoryTest extends TestCase
{
    use MakeMemberTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MemberTypeRepository
     */
    protected $memberTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->memberTypeRepo = App::make(MemberTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMemberType()
    {
        $memberType = $this->fakeMemberTypeData();
        $createdMemberType = $this->memberTypeRepo->create($memberType);
        $createdMemberType = $createdMemberType->toArray();
        $this->assertArrayHasKey('id', $createdMemberType);
        $this->assertNotNull($createdMemberType['id'], 'Created MemberType must have id specified');
        $this->assertNotNull(MemberType::find($createdMemberType['id']), 'MemberType with given id must be in DB');
        $this->assertModelData($memberType, $createdMemberType);
    }

    /**
     * @test read
     */
    public function testReadMemberType()
    {
        $memberType = $this->makeMemberType();
        $dbMemberType = $this->memberTypeRepo->find($memberType->id);
        $dbMemberType = $dbMemberType->toArray();
        $this->assertModelData($memberType->toArray(), $dbMemberType);
    }

    /**
     * @test update
     */
    public function testUpdateMemberType()
    {
        $memberType = $this->makeMemberType();
        $fakeMemberType = $this->fakeMemberTypeData();
        $updatedMemberType = $this->memberTypeRepo->update($fakeMemberType, $memberType->id);
        $this->assertModelData($fakeMemberType, $updatedMemberType->toArray());
        $dbMemberType = $this->memberTypeRepo->find($memberType->id);
        $this->assertModelData($fakeMemberType, $dbMemberType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMemberType()
    {
        $memberType = $this->makeMemberType();
        $resp = $this->memberTypeRepo->delete($memberType->id);
        $this->assertTrue($resp);
        $this->assertNull(MemberType::find($memberType->id), 'MemberType should not exist in DB');
    }
}
