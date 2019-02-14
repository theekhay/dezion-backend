<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SystemPermissionApiTest extends TestCase
{
    use MakeSystemPermissionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSystemPermission()
    {
        $systemPermission = $this->fakeSystemPermissionData();
        $this->json('POST', '/api/v1/systemPermissions', $systemPermission);

        $this->assertApiResponse($systemPermission);
    }

    /**
     * @test
     */
    public function testReadSystemPermission()
    {
        $systemPermission = $this->makeSystemPermission();
        $this->json('GET', '/api/v1/systemPermissions/'.$systemPermission->id);

        $this->assertApiResponse($systemPermission->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSystemPermission()
    {
        $systemPermission = $this->makeSystemPermission();
        $editedSystemPermission = $this->fakeSystemPermissionData();

        $this->json('PUT', '/api/v1/systemPermissions/'.$systemPermission->id, $editedSystemPermission);

        $this->assertApiResponse($editedSystemPermission);
    }

    /**
     * @test
     */
    public function testDeleteSystemPermission()
    {
        $systemPermission = $this->makeSystemPermission();
        $this->json('DELETE', '/api/v1/systemPermissions/'.$systemPermission->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/systemPermissions/'.$systemPermission->id);

        $this->assertResponseStatus(404);
    }
}
