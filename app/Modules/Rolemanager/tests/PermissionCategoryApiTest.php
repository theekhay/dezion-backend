<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionCategoryApiTest extends TestCase
{
    use MakePermissionCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePermissionCategory()
    {
        $permissionCategory = $this->fakePermissionCategoryData();
        $this->json('POST', '/api/v1/permissionCategories', $permissionCategory);

        $this->assertApiResponse($permissionCategory);
    }

    /**
     * @test
     */
    public function testReadPermissionCategory()
    {
        $permissionCategory = $this->makePermissionCategory();
        $this->json('GET', '/api/v1/permissionCategories/'.$permissionCategory->id);

        $this->assertApiResponse($permissionCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePermissionCategory()
    {
        $permissionCategory = $this->makePermissionCategory();
        $editedPermissionCategory = $this->fakePermissionCategoryData();

        $this->json('PUT', '/api/v1/permissionCategories/'.$permissionCategory->id, $editedPermissionCategory);

        $this->assertApiResponse($editedPermissionCategory);
    }

    /**
     * @test
     */
    public function testDeletePermissionCategory()
    {
        $permissionCategory = $this->makePermissionCategory();
        $this->json('DELETE', '/api/v1/permissionCategories/'.$permissionCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/permissionCategories/'.$permissionCategory->id);

        $this->assertResponseStatus(404);
    }
}
