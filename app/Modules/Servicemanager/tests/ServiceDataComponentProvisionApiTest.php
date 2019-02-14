<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceDataComponentProvisionApiTest extends TestCase
{
    use MakeServiceDataComponentProvisionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateServiceDataComponentProvision()
    {
        $serviceDataComponentProvision = $this->fakeServiceDataComponentProvisionData();
        $this->json('POST', '/api/v1/serviceDataComponentProvisions', $serviceDataComponentProvision);

        $this->assertApiResponse($serviceDataComponentProvision);
    }

    /**
     * @test
     */
    public function testReadServiceDataComponentProvision()
    {
        $serviceDataComponentProvision = $this->makeServiceDataComponentProvision();
        $this->json('GET', '/api/v1/serviceDataComponentProvisions/'.$serviceDataComponentProvision->id);

        $this->assertApiResponse($serviceDataComponentProvision->toArray());
    }

    /**
     * @test
     */
    public function testUpdateServiceDataComponentProvision()
    {
        $serviceDataComponentProvision = $this->makeServiceDataComponentProvision();
        $editedServiceDataComponentProvision = $this->fakeServiceDataComponentProvisionData();

        $this->json('PUT', '/api/v1/serviceDataComponentProvisions/'.$serviceDataComponentProvision->id, $editedServiceDataComponentProvision);

        $this->assertApiResponse($editedServiceDataComponentProvision);
    }

    /**
     * @test
     */
    public function testDeleteServiceDataComponentProvision()
    {
        $serviceDataComponentProvision = $this->makeServiceDataComponentProvision();
        $this->json('DELETE', '/api/v1/serviceDataComponentProvisions/'.$serviceDataComponentProvision->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/serviceDataComponentProvisions/'.$serviceDataComponentProvision->id);

        $this->assertResponseStatus(404);
    }
}
