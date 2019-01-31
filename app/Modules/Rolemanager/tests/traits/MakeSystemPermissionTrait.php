<?php

use Faker\Factory as Faker;
use App\Modules\rolemanager\Models\SystemPermission;
use App\Modules\rolemanager\Repositories\SystemPermissionRepository;

trait MakeSystemPermissionTrait
{
    /**
     * Create fake instance of SystemPermission and save it in database
     *
     * @param array $systemPermissionFields
     * @return SystemPermission
     */
    public function makeSystemPermission($systemPermissionFields = [])
    {
        /** @var SystemPermissionRepository $systemPermissionRepo */
        $systemPermissionRepo = App::make(SystemPermissionRepository::class);
        $theme = $this->fakeSystemPermissionData($systemPermissionFields);
        return $systemPermissionRepo->create($theme);
    }

    /**
     * Get fake instance of SystemPermission
     *
     * @param array $systemPermissionFields
     * @return SystemPermission
     */
    public function fakeSystemPermission($systemPermissionFields = [])
    {
        return new SystemPermission($this->fakeSystemPermissionData($systemPermissionFields));
    }

    /**
     * Get fake data of SystemPermission
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSystemPermissionData($systemPermissionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $systemPermissionFields);
    }
}
