<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MemberDetailApiTest extends TestCase
{
    use MakeMemberDetailTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMemberDetail()
    {
        $memberDetail = $this->fakeMemberDetailData();
        $this->json('POST', '/api/v1/memberDetails', $memberDetail);

        $this->assertApiResponse($memberDetail);
    }

    /**
     * @test
     */
    public function testReadMemberDetail()
    {
        $memberDetail = $this->makeMemberDetail();
        $this->json('GET', '/api/v1/memberDetails/'.$memberDetail->id);

        $this->assertApiResponse($memberDetail->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMemberDetail()
    {
        $memberDetail = $this->makeMemberDetail();
        $editedMemberDetail = $this->fakeMemberDetailData();

        $this->json('PUT', '/api/v1/memberDetails/'.$memberDetail->id, $editedMemberDetail);

        $this->assertApiResponse($editedMemberDetail);
    }

    /**
     * @test
     */
    public function testDeleteMemberDetail()
    {
        $memberDetail = $this->makeMemberDetail();
        $this->json('DELETE', '/api/v1/memberDetails/'.$memberDetail->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/memberDetails/'.$memberDetail->id);

        $this->assertResponseStatus(404);
    }
}
