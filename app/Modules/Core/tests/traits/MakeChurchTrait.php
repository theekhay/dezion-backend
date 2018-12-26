<?php

use Faker\Factory as Faker;
use App\Modules\Core\Models\Church;
use App\Modules\Core\Repositories\ChurchRepository;

trait MakeChurchTrait
{
    /**
     * Create fake instance of Church and save it in database
     *
     * @param array $churchFields
     * @return Church
     */
    public function makeChurch($churchFields = [])
    {
        /** @var ChurchRepository $churchRepo */
        $churchRepo = App::make(ChurchRepository::class);
        $theme = $this->fakeChurchData($churchFields);
        return $churchRepo->create($theme);
    }

    /**
     * Get fake instance of Church
     *
     * @param array $churchFields
     * @return Church
     */
    public function fakeChurch($churchFields = [])
    {
        return new Church($this->fakeChurchData($churchFields));
    }

    /**
     * Get fake data of Church
     *
     * @param array $postFields
     * @return array
     */
    public function fakeChurchData($churchFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $churchFields);
    }
}
