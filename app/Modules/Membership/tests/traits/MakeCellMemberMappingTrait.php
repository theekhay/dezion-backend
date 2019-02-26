<?php

use Faker\Factory as Faker;
use App\Modules\Membership\Models\CellMemberMapping;
use App\Modules\Membership\Repositories\CellMemberMappingRepository;

trait MakeCellMemberMappingTrait
{
    /**
     * Create fake instance of CellMemberMapping and save it in database
     *
     * @param array $cellMemberMappingFields
     * @return CellMemberMapping
     */
    public function makeCellMemberMapping($cellMemberMappingFields = [])
    {
        /** @var CellMemberMappingRepository $cellMemberMappingRepo */
        $cellMemberMappingRepo = App::make(CellMemberMappingRepository::class);
        $theme = $this->fakeCellMemberMappingData($cellMemberMappingFields);
        return $cellMemberMappingRepo->create($theme);
    }

    /**
     * Get fake instance of CellMemberMapping
     *
     * @param array $cellMemberMappingFields
     * @return CellMemberMapping
     */
    public function fakeCellMemberMapping($cellMemberMappingFields = [])
    {
        return new CellMemberMapping($this->fakeCellMemberMappingData($cellMemberMappingFields));
    }

    /**
     * Get fake data of CellMemberMapping
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCellMemberMappingData($cellMemberMappingFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cellMemberMappingFields);
    }
}
