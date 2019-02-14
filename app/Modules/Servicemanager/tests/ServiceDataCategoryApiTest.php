<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceDataCategoryApiTest extends TestCase
{
    use MakeServiceDataCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateServiceDataCategory()
    {
        $serviceDataCategory = $this->fakeServiceDataCategoryData();
        $this->json('POST', '/api/v1/serviceDataCategories', $serviceDataCategory);

        $this->assertApiResponse($serviceDataCategory);
    }

    /**
     * @test
     */
    public function testReadServiceDataCategory()
    {
        $serviceDataCategory = $this->makeServiceDataCategory();
        $this->json('GET', '/api/v1/serviceDataCategories/'.$serviceDataCategory->id);

        $this->assertApiResponse($serviceDataCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateServiceDataCategory()
    {
        $serviceDataCategory = $this->makeServiceDataCategory();
        $editedServiceDataCategory = $this->fakeServiceDataCategoryData();

        $this->json('PUT', '/api/v1/serviceDataCategories/'.$serviceDataCategory->id, $editedServiceDataCategory);

        $this->assertApiResponse($editedServiceDataCategory);
    }

    /**
     * @test
     */
    public function testDeleteServiceDataCategory()
    {
        $serviceDataCategory = $this->makeServiceDataCategory();
        $this->json('DELETE', '/api/v1/serviceDataCategories/'.$serviceDataCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/serviceDataCategories/'.$serviceDataCategory->id);

        $this->assertResponseStatus(404);
    }
}
