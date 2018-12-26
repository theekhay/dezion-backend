<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MemberTypeApiTest extends TestCase
{
    use MakeMemberTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMemberType()
    {
        $memberType = $this->fakeMemberTypeData();
        $this->json('POST', '/api/v1/memberTypes', $memberType);

        $this->assertApiResponse($memberType);
    }

    /**
     * @test
     */
    public function testReadMemberType()
    {
        $memberType = $this->makeMemberType();
        $this->json('GET', '/api/v1/memberTypes/'.$memberType->id);

        $this->assertApiResponse($memberType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMemberType()
    {
        $memberType = $this->makeMemberType();
        $editedMemberType = $this->fakeMemberTypeData();

        $this->json('PUT', '/api/v1/memberTypes/'.$memberType->id, $editedMemberType);

        $this->assertApiResponse($editedMemberType);
    }

    /**
     * @test
     */
    public function testDeleteMemberType()
    {
        $memberType = $this->makeMemberType();
        $this->json('DELETE', '/api/v1/memberTypes/'.$memberType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/memberTypes/'.$memberType->id);

        $this->assertResponseStatus(404);
    }
}
