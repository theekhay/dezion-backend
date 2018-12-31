<?php

use Faker\Factory as Faker;
use App\Modules\Assimilation\Models\UnAssimilatedBucket;
use App\Modules\Assimilation\Repositories\UnAssimilatedBucketRepository;

trait MakeUnAssimilatedBucketTrait
{
    /**
     * Create fake instance of UnAssimilatedBucket and save it in database
     *
     * @param array $unAssimilatedBucketFields
     * @return UnAssimilatedBucket
     */
    public function makeUnAssimilatedBucket($unAssimilatedBucketFields = [])
    {
        /** @var UnAssimilatedBucketRepository $unAssimilatedBucketRepo */
        $unAssimilatedBucketRepo = App::make(UnAssimilatedBucketRepository::class);
        $theme = $this->fakeUnAssimilatedBucketData($unAssimilatedBucketFields);
        return $unAssimilatedBucketRepo->create($theme);
    }

    /**
     * Get fake instance of UnAssimilatedBucket
     *
     * @param array $unAssimilatedBucketFields
     * @return UnAssimilatedBucket
     */
    public function fakeUnAssimilatedBucket($unAssimilatedBucketFields = [])
    {
        return new UnAssimilatedBucket($this->fakeUnAssimilatedBucketData($unAssimilatedBucketFields));
    }

    /**
     * Get fake data of UnAssimilatedBucket
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUnAssimilatedBucketData($unAssimilatedBucketFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $unAssimilatedBucketFields);
    }
}
