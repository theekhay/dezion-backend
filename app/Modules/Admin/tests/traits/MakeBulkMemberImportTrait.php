<?php

use Faker\Factory as Faker;
use App\Modules\Membership\Models\BulkMemberImport;
use App\Modules\Membership\Repositories\BulkMemberImportRepository;

trait MakeBulkMemberImportTrait
{
    /**
     * Create fake instance of BulkMemberImport and save it in database
     *
     * @param array $bulkMemberImportFields
     * @return BulkMemberImport
     */
    public function makeBulkMemberImport($bulkMemberImportFields = [])
    {
        /** @var BulkMemberImportRepository $bulkMemberImportRepo */
        $bulkMemberImportRepo = App::make(BulkMemberImportRepository::class);
        $theme = $this->fakeBulkMemberImportData($bulkMemberImportFields);
        return $bulkMemberImportRepo->create($theme);
    }

    /**
     * Get fake instance of BulkMemberImport
     *
     * @param array $bulkMemberImportFields
     * @return BulkMemberImport
     */
    public function fakeBulkMemberImport($bulkMemberImportFields = [])
    {
        return new BulkMemberImport($this->fakeBulkMemberImportData($bulkMemberImportFields));
    }

    /**
     * Get fake data of BulkMemberImport
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBulkMemberImportData($bulkMemberImportFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $bulkMemberImportFields);
    }
}
