<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceDataComponentApiTest extends TestCase
{
    use MakeServiceDataComponentTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateServiceDataComponent()
    {
        $serviceDataComponent = $this->fakeServiceDataComponentData();
        $this->json('POST', '/api/v1/serviceDataComponents', $serviceDataComponent);

        $this->assertApiResponse($serviceDataComponent);
    }

    /**
     * @test
     */
    public function testReadServiceDataComponent()
    {
        $serviceDataComponent = $this->makeServiceDataComponent();
        $this->json('GET', '/api/v1/serviceDataComponents/'.$serviceDataComponent->id);

        $this->assertApiResponse($serviceDataComponent->toArray());
    }

    /**
     * @test
     */
    public function testUpdateServiceDataComponent()
    {
        $serviceDataComponent = $this->makeServiceDataComponent();
        $editedServiceDataComponent = $this->fakeServiceDataComponentData();

        $this->json('PUT', '/api/v1/serviceDataComponents/'.$serviceDataComponent->id, $editedServiceDataComponent);

        $this->assertApiResponse($editedServiceDataComponent);
    }

    /**
     * @test
     */
    public function testDeleteServiceDataComponent()
    {
        $serviceDataComponent = $this->makeServiceDataComponent();
        $this->json('DELETE', '/api/v1/serviceDataComponents/'.$serviceDataComponent->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/serviceDataComponents/'.$serviceDataComponent->id);

        $this->assertResponseStatus(404);
    }
}
