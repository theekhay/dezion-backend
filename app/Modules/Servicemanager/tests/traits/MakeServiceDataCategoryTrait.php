<?php

use Faker\Factory as Faker;
use App\Modules\Servicemanager\Models\ServiceDataCategory;
use App\Modules\Servicemanager\Repositories\ServiceDataCategoryRepository;

trait MakeServiceDataCategoryTrait
{
    /**
     * Create fake instance of ServiceDataCategory and save it in database
     *
     * @param array $serviceDataCategoryFields
     * @return ServiceDataCategory
     */
    public function makeServiceDataCategory($serviceDataCategoryFields = [])
    {
        /** @var ServiceDataCategoryRepository $serviceDataCategoryRepo */
        $serviceDataCategoryRepo = App::make(ServiceDataCategoryRepository::class);
        $theme = $this->fakeServiceDataCategoryData($serviceDataCategoryFields);
        return $serviceDataCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of ServiceDataCategory
     *
     * @param array $serviceDataCategoryFields
     * @return ServiceDataCategory
     */
    public function fakeServiceDataCategory($serviceDataCategoryFields = [])
    {
        return new ServiceDataCategory($this->fakeServiceDataCategoryData($serviceDataCategoryFields));
    }

    /**
     * Get fake data of ServiceDataCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeServiceDataCategoryData($serviceDataCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $serviceDataCategoryFields);
    }
}
