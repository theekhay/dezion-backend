<?php

use Faker\Factory as Faker;
use App\Modules\Membership\Models\MemberDetail;
use App\Modules\Membership\Repositories\MemberDetailRepository;

trait MakeMemberDetailTrait
{
    /**
     * Create fake instance of MemberDetail and save it in database
     *
     * @param array $memberDetailFields
     * @return MemberDetail
     */
    public function makeMemberDetail($memberDetailFields = [])
    {
        /** @var MemberDetailRepository $memberDetailRepo */
        $memberDetailRepo = App::make(MemberDetailRepository::class);
        $theme = $this->fakeMemberDetailData($memberDetailFields);
        return $memberDetailRepo->create($theme);
    }

    /**
     * Get fake instance of MemberDetail
     *
     * @param array $memberDetailFields
     * @return MemberDetail
     */
    public function fakeMemberDetail($memberDetailFields = [])
    {
        return new MemberDetail($this->fakeMemberDetailData($memberDetailFields));
    }

    /**
     * Get fake data of MemberDetail
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMemberDetailData($memberDetailFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $memberDetailFields);
    }
}
