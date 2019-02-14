<?php

use Faker\Factory as Faker;
use App\Modules\ministry\Models\Community;
use App\Modules\ministry\Repositories\CommunityRepository;

trait MakeCommunityTrait
{
    /**
     * Create fake instance of Community and save it in database
     *
     * @param array $communityFields
     * @return Community
     */
    public function makeCommunity($communityFields = [])
    {
        /** @var CommunityRepository $communityRepo */
        $communityRepo = App::make(CommunityRepository::class);
        $theme = $this->fakeCommunityData($communityFields);
        return $communityRepo->create($theme);
    }

    /**
     * Get fake instance of Community
     *
     * @param array $communityFields
     * @return Community
     */
    public function fakeCommunity($communityFields = [])
    {
        return new Community($this->fakeCommunityData($communityFields));
    }

    /**
     * Get fake data of Community
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCommunityData($communityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $communityFields);
    }
}
