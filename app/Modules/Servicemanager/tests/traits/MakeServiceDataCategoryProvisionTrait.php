<?php

use Faker\Factory as Faker;
use App\Modules\Servicemanager\Models\ServiceDataCategoryProvision;
use App\Modules\Servicemanager\Repositories\ServiceDataCategoryProvisionRepository;

trait MakeServiceDataCategoryProvisionTrait
{
    /**
     * Create fake instance of ServiceDataCategoryProvision and save it in database
     *
     * @param array $serviceDataCategoryProvisionFields
     * @return ServiceDataCategoryProvision
     */
    public function makeServiceDataCategoryProvision($serviceDataCategoryProvisionFields = [])
    {
        /** @var ServiceDataCategoryProvisionRepository $serviceDataCategoryProvisionRepo */
        $serviceDataCategoryProvisionRepo = App::make(ServiceDataCategoryProvisionRepository::class);
        $theme = $this->fakeServiceDataCategoryProvisionData($serviceDataCategoryProvisionFields);
        return $serviceDataCategoryProvisionRepo->create($theme);
    }

    /**
     * Get fake instance of ServiceDataCategoryProvision
     *
     * @param array $serviceDataCategoryProvisionFields
     * @return ServiceDataCategoryProvision
     */
    public function fakeServiceDataCategoryProvision($serviceDataCategoryProvisionFields = [])
    {
        return new ServiceDataCategoryProvision($this->fakeServiceDataCategoryProvisionData($serviceDataCategoryProvisionFields));
    }

    /**
     * Get fake data of ServiceDataCategoryProvision
     *
     * @param array $postFields
     * @return array
     */
    public function fakeServiceDataCategoryProvisionData($serviceDataCategoryProvisionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $serviceDataCategoryProvisionFields);
    }
}
