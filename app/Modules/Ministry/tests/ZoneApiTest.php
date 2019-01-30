<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ZoneApiTest extends TestCase
{
    use MakeZoneTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateZone()
    {
        $zone = $this->fakeZoneData();
        $this->json('POST', '/api/v1/zones', $zone);

        $this->assertApiResponse($zone);
    }

    /**
     * @test
     */
    public function testReadZone()
    {
        $zone = $this->makeZone();
        $this->json('GET', '/api/v1/zones/'.$zone->id);

        $this->assertApiResponse($zone->toArray());
    }

    /**
     * @test
     */
    public function testUpdateZone()
    {
        $zone = $this->makeZone();
        $editedZone = $this->fakeZoneData();

        $this->json('PUT', '/api/v1/zones/'.$zone->id, $editedZone);

        $this->assertApiResponse($editedZone);
    }

    /**
     * @test
     */
    public function testDeleteZone()
    {
        $zone = $this->makeZone();
        $this->json('DELETE', '/api/v1/zones/'.$zone->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/zones/'.$zone->id);

        $this->assertResponseStatus(404);
    }
}
