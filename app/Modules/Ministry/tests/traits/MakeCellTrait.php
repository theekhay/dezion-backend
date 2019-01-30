<?php

use Faker\Factory as Faker;
use App\Modules\ministry\Models\Cell;
use App\Modules\ministry\Repositories\CellRepository;

trait MakeCellTrait
{
    /**
     * Create fake instance of Cell and save it in database
     *
     * @param array $cellFields
     * @return Cell
     */
    public function makeCell($cellFields = [])
    {
        /** @var CellRepository $cellRepo */
        $cellRepo = App::make(CellRepository::class);
        $theme = $this->fakeCellData($cellFields);
        return $cellRepo->create($theme);
    }

    /**
     * Get fake instance of Cell
     *
     * @param array $cellFields
     * @return Cell
     */
    public function fakeCell($cellFields = [])
    {
        return new Cell($this->fakeCellData($cellFields));
    }

    /**
     * Get fake data of Cell
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCellData($cellFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cellFields);
    }
}
