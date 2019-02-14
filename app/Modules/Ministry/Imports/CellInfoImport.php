<?php

namespace App\Modules\Ministry\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Modules\Membership\Models\MemberDetail;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

use Maatwebsite\Excel\Concerns\WithChunkReading;

use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use function GuzzleHttp\json_encode;
use Maatwebsite\Excel\Validators\ValidationException;

use Maatwebsite\Excel\Validators\Failure;

use App\Modules\Membership\Models\BulkMemberImport;

use Ramsey\Uuid\Uuid;
use App\Modules\ministry\Models\Cell as MinistryCell;
use App\Models\ModelStatus;


//class MemberDetailImport implements ToCollection, WithHeadingRow, WithValidation, WithChunkReading, WithBatchInserts
Class CellInfoImport implements ToModel, WithHeadingRow, WithValidation, WithChunkReading, WithBatchInserts
{
    use Importable;

    public function model(array $row)
    {
        return new MinistryCell([
            'leader_name'     => $row['leader_name'],
            'leader_phone_number'    => $row['leader_phone_number'],
            'leader_mobile_number' => $row['leader_mobile_number'],

            'address' => $row['address'],
            'district_name' => $row['district_name'],
            'zone_name' => $row['zone_name'],
            'community_name' => $row['community_name'],
            'uuid' => Uuid::uuid4()->toString(),
            'status' => ModelStatus::ACTIVE,
            'created_by' => Auth::id(),
        ]);
    }



    public function rules(): array
    {
      return MinistryCell::$rules;
    }


    public function batchSize(): int
    {
        return 50;
    }

    public function chunkSize(): int
    {
        return 50;
    }




}
