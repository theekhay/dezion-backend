<?php

use Faker\Factory as Faker;
use App\Modules\Servicemanager\Models\ServiceDataComponent;
use App\Modules\Servicemanager\Repositories\ServiceDataComponentRepository;

trait MakeServiceDataComponentTrait
{
    /**
     * Create fake instance of ServiceDataComponent and save it in database
     *
     * @param array $serviceDataComponentFields
     * @return ServiceDataComponent
     */
    public function makeServiceDataComponent($serviceDataComponentFields = [])
    {
        /** @var ServiceDataComponentRepository $serviceDataComponentRepo */
        $serviceDataComponentRepo = App::make(ServiceDataComponentRepository::class);
        $theme = $this->fakeServiceDataComponentData($serviceDataComponentFields);
        return $serviceDataComponentRepo->create($theme);
    }

    /**
     * Get fake instance of ServiceDataComponent
     *
     * @param array $serviceDataComponentFields
     * @return ServiceDataComponent
     */
    public function fakeServiceDataComponent($serviceDataComponentFields = [])
    {
        return new ServiceDataComponent($this->fakeServiceDataComponentData($serviceDataComponentFields));
    }

    /**
     * Get fake data of ServiceDataComponent
     *
     * @param array $postFields
     * @return array
     */
    public function fakeServiceDataComponentData($serviceDataComponentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $serviceDataComponentFields);
    }
}
