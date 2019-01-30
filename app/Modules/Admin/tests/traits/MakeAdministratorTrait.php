<?php

use Faker\Factory as Faker;
use App\Modules\Membership\Models\Administrator;
use App\Modules\Membership\Repositories\AdministratorRepository;

trait MakeAdministratorTrait
{
    /**
     * Create fake instance of Administrator and save it in database
     *
     * @param array $administratorFields
     * @return Administrator
     */
    public function makeAdministrator($administratorFields = [])
    {
        /** @var AdministratorRepository $administratorRepo */
        $administratorRepo = App::make(AdministratorRepository::class);
        $theme = $this->fakeAdministratorData($administratorFields);
        return $administratorRepo->create($theme);
    }

    /**
     * Get fake instance of Administrator
     *
     * @param array $administratorFields
     * @return Administrator
     */
    public function fakeAdministrator($administratorFields = [])
    {
        return new Administrator($this->fakeAdministratorData($administratorFields));
    }

    /**
     * Get fake data of Administrator
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAdministratorData($administratorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $administratorFields);
    }
}
