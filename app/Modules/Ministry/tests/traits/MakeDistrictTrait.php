<?php

use Faker\Factory as Faker;
use App\Modules\Ministry\Models\District;
use App\Modules\Ministry\Repositories\DistrictRepository;

trait MakeDistrictTrait
{
    /**
     * Create fake instance of District and save it in database
     *
     * @param array $districtFields
     * @return District
     */
    public function makeDistrict($districtFields = [])
    {
        /** @var DistrictRepository $districtRepo */
        $districtRepo = App::make(DistrictRepository::class);
        $theme = $this->fakeDistrictData($districtFields);
        return $districtRepo->create($theme);
    }

    /**
     * Get fake instance of District
     *
     * @param array $districtFields
     * @return District
     */
    public function fakeDistrict($districtFields = [])
    {
        return new District($this->fakeDistrictData($districtFields));
    }

    /**
     * Get fake data of District
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDistrictData($districtFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $districtFields);
    }
}
