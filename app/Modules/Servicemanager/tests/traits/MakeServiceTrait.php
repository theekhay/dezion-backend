<?php

use Faker\Factory as Faker;
use App\Modules\ServiceManager\Models\Service;
use App\Modules\ServiceManager\Repositories\ServiceRepository;

trait MakeServiceTrait
{
    /**
     * Create fake instance of Service and save it in database
     *
     * @param array $serviceFields
     * @return Service
     */
    public function makeService($serviceFields = [])
    {
        /** @var ServiceRepository $serviceRepo */
        $serviceRepo = App::make(ServiceRepository::class);
        $theme = $this->fakeServiceData($serviceFields);
        return $serviceRepo->create($theme);
    }

    /**
     * Get fake instance of Service
     *
     * @param array $serviceFields
     * @return Service
     */
    public function fakeService($serviceFields = [])
    {
        return new Service($this->fakeServiceData($serviceFields));
    }

    /**
     * Get fake data of Service
     *
     * @param array $postFields
     * @return array
     */
    public function fakeServiceData($serviceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $serviceFields);
    }
}
