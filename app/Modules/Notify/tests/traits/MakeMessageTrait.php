<?php

use Faker\Factory as Faker;
use App\Modules\Notify\Models\Message;
use App\Modules\Notify\Repositories\MessageRepository;

trait MakeMessageTrait
{
    /**
     * Create fake instance of Message and save it in database
     *
     * @param array $messageFields
     * @return Message
     */
    public function makeMessage($messageFields = [])
    {
        /** @var MessageRepository $messageRepo */
        $messageRepo = App::make(MessageRepository::class);
        $theme = $this->fakeMessageData($messageFields);
        return $messageRepo->create($theme);
    }

    /**
     * Get fake instance of Message
     *
     * @param array $messageFields
     * @return Message
     */
    public function fakeMessage($messageFields = [])
    {
        return new Message($this->fakeMessageData($messageFields));
    }

    /**
     * Get fake data of Message
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMessageData($messageFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $messageFields);
    }
}
