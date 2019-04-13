<?php

use Faker\Factory as Faker;
use App\Modules\finmanager\Models\Bank;
use App\Modules\finmanager\Repositories\BankRepository;

trait MakeBankTrait
{
    /**
     * Create fake instance of Bank and save it in database
     *
     * @param array $bankFields
     * @return Bank
     */
    public function makeBank($bankFields = [])
    {
        /** @var BankRepository $bankRepo */
        $bankRepo = App::make(BankRepository::class);
        $theme = $this->fakeBankData($bankFields);
        return $bankRepo->create($theme);
    }

    /**
     * Get fake instance of Bank
     *
     * @param array $bankFields
     * @return Bank
     */
    public function fakeBank($bankFields = [])
    {
        return new Bank($this->fakeBankData($bankFields));
    }

    /**
     * Get fake data of Bank
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBankData($bankFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $bankFields);
    }
}
