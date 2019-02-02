<?php

use Faker\Factory as Faker;
use App\Modules\rolemanager\Models\PermissionCategory;
use App\Modules\rolemanager\Repositories\PermissionCategoryRepository;

trait MakePermissionCategoryTrait
{
    /**
     * Create fake instance of PermissionCategory and save it in database
     *
     * @param array $permissionCategoryFields
     * @return PermissionCategory
     */
    public function makePermissionCategory($permissionCategoryFields = [])
    {
        /** @var PermissionCategoryRepository $permissionCategoryRepo */
        $permissionCategoryRepo = App::make(PermissionCategoryRepository::class);
        $theme = $this->fakePermissionCategoryData($permissionCategoryFields);
        return $permissionCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of PermissionCategory
     *
     * @param array $permissionCategoryFields
     * @return PermissionCategory
     */
    public function fakePermissionCategory($permissionCategoryFields = [])
    {
        return new PermissionCategory($this->fakePermissionCategoryData($permissionCategoryFields));
    }

    /**
     * Get fake data of PermissionCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakePermissionCategoryData($permissionCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $permissionCategoryFields);
    }
}
