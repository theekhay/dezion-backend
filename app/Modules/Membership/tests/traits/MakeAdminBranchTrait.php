<?php

use Faker\Factory as Faker;
use App\Modules\Membership\Models\AdminBranch;
use App\Modules\Membership\Repositories\AdminBranchRepository;

trait MakeAdminBranchTrait
{
    /**
     * Create fake instance of AdminBranch and save it in database
     *
     * @param array $adminBranchFields
     * @return AdminBranch
     */
    public function makeAdminBranch($adminBranchFields = [])
    {
        /** @var AdminBranchRepository $adminBranchRepo */
        $adminBranchRepo = App::make(AdminBranchRepository::class);
        $theme = $this->fakeAdminBranchData($adminBranchFields);
        return $adminBranchRepo->create($theme);
    }

    /**
     * Get fake instance of AdminBranch
     *
     * @param array $adminBranchFields
     * @return AdminBranch
     */
    public function fakeAdminBranch($adminBranchFields = [])
    {
        return new AdminBranch($this->fakeAdminBranchData($adminBranchFields));
    }

    /**
     * Get fake data of AdminBranch
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAdminBranchData($adminBranchFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $adminBranchFields);
    }
}
