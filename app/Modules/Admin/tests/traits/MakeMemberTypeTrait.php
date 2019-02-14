<?php

use Faker\Factory as Faker;
use App\Modules\Membership\Models\MemberType;
use App\Modules\Membership\Repositories\MemberTypeRepository;

trait MakeMemberTypeTrait
{
    /**
     * Create fake instance of MemberType and save it in database
     *
     * @param array $memberTypeFields
     * @return MemberType
     */
    public function makeMemberType($memberTypeFields = [])
    {
        /** @var MemberTypeRepository $memberTypeRepo */
        $memberTypeRepo = App::make(MemberTypeRepository::class);
        $theme = $this->fakeMemberTypeData($memberTypeFields);
        return $memberTypeRepo->create($theme);
    }

    /**
     * Get fake instance of MemberType
     *
     * @param array $memberTypeFields
     * @return MemberType
     */
    public function fakeMemberType($memberTypeFields = [])
    {
        return new MemberType($this->fakeMemberTypeData($memberTypeFields));
    }

    /**
     * Get fake data of MemberType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMemberTypeData($memberTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $memberTypeFields);
    }
}
