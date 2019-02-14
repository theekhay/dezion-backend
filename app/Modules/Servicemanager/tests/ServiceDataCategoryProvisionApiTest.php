<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceDataCategoryProvisionApiTest extends TestCase
{
    use MakeServiceDataCategoryProvisionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateServiceDataCategoryProvision()
    {
        $serviceDataCategoryProvision = $this->fakeServiceDataCategoryProvisionData();
        $this->json('POST', '/api/v1/serviceDataCategoryProvisions', $serviceDataCategoryProvision);

        $this->assertApiResponse($serviceDataCategoryProvision);
    }

    /**
     * @test
     */
    public function testReadServiceDataCategoryProvision()
    {
        $serviceDataCategoryProvision = $this->makeServiceDataCategoryProvision();
        $this->json('GET', '/api/v1/serviceDataCategoryProvisions/'.$serviceDataCategoryProvision->id);

        $this->assertApiResponse($serviceDataCategoryProvision->toArray());
    }

    /**
     * @test
     */
    public function testUpdateServiceDataCategoryProvision()
    {
        $serviceDataCategoryProvision = $this->makeServiceDataCategoryProvision();
        $editedServiceDataCategoryProvision = $this->fakeServiceDataCategoryProvisionData();

        $this->json('PUT', '/api/v1/serviceDataCategoryProvisions/'.$serviceDataCategoryProvision->id, $editedServiceDataCategoryProvision);

        $this->assertApiResponse($editedServiceDataCategoryProvision);
    }

    /**
     * @test
     */
    public function testDeleteServiceDataCategoryProvision()
    {
        $serviceDataCategoryProvision = $this->makeServiceDataCategoryProvision();
        $this->json('DELETE', '/api/v1/serviceDataCategoryProvisions/'.$serviceDataCategoryProvision->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/serviceDataCategoryProvisions/'.$serviceDataCategoryProvision->id);

        $this->assertResponseStatus(404);
    }
}
