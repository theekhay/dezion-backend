<?php

use Faker\Factory as Faker;
use App\Modules\Servicemanager\Models\ServiceDataComponentProvision;
use App\Modules\Servicemanager\Repositories\ServiceDataComponentProvisionRepository;

trait MakeServiceDataComponentProvisionTrait
{
    /**
     * Create fake instance of ServiceDataComponentProvision and save it in database
     *
     * @param array $serviceDataComponentProvisionFields
     * @return ServiceDataComponentProvision
     */
    public function makeServiceDataComponentProvision($serviceDataComponentProvisionFields = [])
    {
        /** @var ServiceDataComponentProvisionRepository $serviceDataComponentProvisionRepo */
        $serviceDataComponentProvisionRepo = App::make(ServiceDataComponentProvisionRepository::class);
        $theme = $this->fakeServiceDataComponentProvisionData($serviceDataComponentProvisionFields);
        return $serviceDataComponentProvisionRepo->create($theme);
    }

    /**
     * Get fake instance of ServiceDataComponentProvision
     *
     * @param array $serviceDataComponentProvisionFields
     * @return ServiceDataComponentProvision
     */
    public function fakeServiceDataComponentProvision($serviceDataComponentProvisionFields = [])
    {
        return new ServiceDataComponentProvision($this->fakeServiceDataComponentProvisionData($serviceDataComponentProvisionFields));
    }

    /**
     * Get fake data of ServiceDataComponentProvision
     *
     * @param array $postFields
     * @return array
     */
    public function fakeServiceDataComponentProvisionData($serviceDataComponentProvisionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $serviceDataComponentProvisionFields);
    }
}
