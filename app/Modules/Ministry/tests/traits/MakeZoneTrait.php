<?php

use Faker\Factory as Faker;
use App\Modules\ministry\Models\Zone;
use App\Modules\ministry\Repositories\ZoneRepository;

trait MakeZoneTrait
{
    /**
     * Create fake instance of Zone and save it in database
     *
     * @param array $zoneFields
     * @return Zone
     */
    public function makeZone($zoneFields = [])
    {
        /** @var ZoneRepository $zoneRepo */
        $zoneRepo = App::make(ZoneRepository::class);
        $theme = $this->fakeZoneData($zoneFields);
        return $zoneRepo->create($theme);
    }

    /**
     * Get fake instance of Zone
     *
     * @param array $zoneFields
     * @return Zone
     */
    public function fakeZone($zoneFields = [])
    {
        return new Zone($this->fakeZoneData($zoneFields));
    }

    /**
     * Get fake data of Zone
     *
     * @param array $postFields
     * @return array
     */
    public function fakeZoneData($zoneFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $zoneFields);
    }
}
