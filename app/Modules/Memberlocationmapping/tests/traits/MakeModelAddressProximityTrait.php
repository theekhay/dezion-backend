<?php

use Faker\Factory as Faker;
use App\Modules\memberlocationmapping\Models\ModelAddressProximity;
use App\Modules\memberlocationmapping\Repositories\ModelAddressProximityRepository;

trait MakeModelAddressProximityTrait
{
    /**
     * Create fake instance of ModelAddressProximity and save it in database
     *
     * @param array $modelAddressProximityFields
     * @return ModelAddressProximity
     */
    public function makeModelAddressProximity($modelAddressProximityFields = [])
    {
        /** @var ModelAddressProximityRepository $modelAddressProximityRepo */
        $modelAddressProximityRepo = App::make(ModelAddressProximityRepository::class);
        $theme = $this->fakeModelAddressProximityData($modelAddressProximityFields);
        return $modelAddressProximityRepo->create($theme);
    }

    /**
     * Get fake instance of ModelAddressProximity
     *
     * @param array $modelAddressProximityFields
     * @return ModelAddressProximity
     */
    public function fakeModelAddressProximity($modelAddressProximityFields = [])
    {
        return new ModelAddressProximity($this->fakeModelAddressProximityData($modelAddressProximityFields));
    }

    /**
     * Get fake data of ModelAddressProximity
     *
     * @param array $postFields
     * @return array
     */
    public function fakeModelAddressProximityData($modelAddressProximityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $modelAddressProximityFields);
    }
}
