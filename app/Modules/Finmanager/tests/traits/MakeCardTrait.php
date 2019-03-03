<?php

use Faker\Factory as Faker;
use App\Modules\finmanager\Models\Card;
use App\Modules\finmanager\Repositories\CardRepository;

trait MakeCardTrait
{
    /**
     * Create fake instance of Card and save it in database
     *
     * @param array $cardFields
     * @return Card
     */
    public function makeCard($cardFields = [])
    {
        /** @var CardRepository $cardRepo */
        $cardRepo = App::make(CardRepository::class);
        $theme = $this->fakeCardData($cardFields);
        return $cardRepo->create($theme);
    }

    /**
     * Get fake instance of Card
     *
     * @param array $cardFields
     * @return Card
     */
    public function fakeCard($cardFields = [])
    {
        return new Card($this->fakeCardData($cardFields));
    }

    /**
     * Get fake data of Card
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCardData($cardFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cardFields);
    }
}
