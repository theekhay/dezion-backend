<?php

use Faker\Factory as Faker;
use App\Modules\finmanager\Models\CardTransaction;
use App\Modules\finmanager\Repositories\CardTransactionRepository;

trait MakeCardTransactionTrait
{
    /**
     * Create fake instance of CardTransaction and save it in database
     *
     * @param array $cardTransactionFields
     * @return CardTransaction
     */
    public function makeCardTransaction($cardTransactionFields = [])
    {
        /** @var CardTransactionRepository $cardTransactionRepo */
        $cardTransactionRepo = App::make(CardTransactionRepository::class);
        $theme = $this->fakeCardTransactionData($cardTransactionFields);
        return $cardTransactionRepo->create($theme);
    }

    /**
     * Get fake instance of CardTransaction
     *
     * @param array $cardTransactionFields
     * @return CardTransaction
     */
    public function fakeCardTransaction($cardTransactionFields = [])
    {
        return new CardTransaction($this->fakeCardTransactionData($cardTransactionFields));
    }

    /**
     * Get fake data of CardTransaction
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCardTransactionData($cardTransactionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cardTransactionFields);
    }
}
