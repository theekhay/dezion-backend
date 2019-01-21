<?php

namespace App\Modules\Membership\Imports;

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


//class MemberDetailImport implements ToCollection, WithHeadingRow, WithValidation, WithChunkReading, WithBatchInserts
Class MemberDetailImport implements ToModel, WithHeadingRow, WithValidation, WithChunkReading, WithBatchInserts
{
    use Importable;

    private $data;

    public function __construct( $data = [] )
    {
        $this->data = $data;
        $this->data['is_bulk'] = true;
        $this->data['created_by'] = Auth::id();
    }


    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
    //     foreach ($collection as $row)
    //     {
    //         MemberDetail::create([

    //             'firstname'         => $row['firstname'],
    //             'surname'           => $row['surname'],
    //             'middlename'        => $row['middlename'],
    //             'address'           => $row['address'],
    //             'telephone'         => $row['telephone'],
    //             'email'             => $row['email'],

    //         ] + $this->data);
    //     }
    // }


    public function model(array $row)
    {
            // $memb =  [
            //     'firstname'         => $row['firstname'],
            //     'surname'           => $row['surname'],
            //     'middlename'        => $row['middlename'],
            //     'address'           => $row['address'],
            //     'telephone'         => $row['telephone'],
            //     'email'             => $row['email'],

            // ] + $this->data ;

            $m = [];

            foreach( $row as $k => $v)
            {
                $m[$k] = $v ;
            }


            $memb =  $m ;
           return new MemberDetail($memb + $this->data + ['data' => json_encode($memb) ]);
            //return new MemberDetail( $this->data + ['data' => json_encode($memb) ]);

    }


    /**
     * This would set the values of the optional fields
     */
    public function setAdditionalFields()
    {
        ///for each additionaLField as field
    }


    public function rules(): array
    {
      //return  MemberDetail::$rules;

      return [
        // 'firstname' => 'nullable|alpha',
        // 'surname'   => 'nullable|alpha',
        // 'middlename'   => 'nullable|alpha',
        // 'address'   => 'nullable|string',
        // 'email'   => 'nullable|email',
        //'branch_id' => 'required|numeric|exists:branches,id',
        //'telephone'   => 'nullable|string',
      ];
    }


    // public function onFailure(Failure $f )
    // {
    //     Illuminate\Support\Facades\Log::info('error occured');
    // }

    public function batchSize(): int
    {
        return 50;
    }

    public function chunkSize(): int
    {
        return 50;
    }




}
