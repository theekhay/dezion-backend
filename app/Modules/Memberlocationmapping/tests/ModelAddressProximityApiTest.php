<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelAddressProximityApiTest extends TestCase
{
    use MakeModelAddressProximityTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateModelAddressProximity()
    {
        $modelAddressProximity = $this->fakeModelAddressProximityData();
        $this->json('POST', '/api/v1/modelAddressProximities', $modelAddressProximity);

        $this->assertApiResponse($modelAddressProximity);
    }

    /**
     * @test
     */
    public function testReadModelAddressProximity()
    {
        $modelAddressProximity = $this->makeModelAddressProximity();
        $this->json('GET', '/api/v1/modelAddressProximities/'.$modelAddressProximity->id);

        $this->assertApiResponse($modelAddressProximity->toArray());
    }

    /**
     * @test
     */
    public function testUpdateModelAddressProximity()
    {
        $modelAddressProximity = $this->makeModelAddressProximity();
        $editedModelAddressProximity = $this->fakeModelAddressProximityData();

        $this->json('PUT', '/api/v1/modelAddressProximities/'.$modelAddressProximity->id, $editedModelAddressProximity);

        $this->assertApiResponse($editedModelAddressProximity);
    }

    /**
     * @test
     */
    public function testDeleteModelAddressProximity()
    {
        $modelAddressProximity = $this->makeModelAddressProximity();
        $this->json('DELETE', '/api/v1/modelAddressProximities/'.$modelAddressProximity->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/modelAddressProximities/'.$modelAddressProximity->id);

        $this->assertResponseStatus(404);
    }
}
