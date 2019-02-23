<?php

namespace App\Modules\Membership\Http\Controllers\API;

//request
use App\Modules\Membership\Http\Requests\API\CreateBulkMemberImportAPIRequest;
use App\Modules\Membership\Http\Requests\API\UpdateBulkMemberImportAPIRequest;
use Illuminate\Http\Request;


//models
use App\Modules\Membership\Models\BulkMemberImport;
use App\Modules\Membership\Models\MemberDetail;


//repos
use App\Modules\Membership\Repositories\BulkMemberImportRepository;

//comtrollers
use App\Http\Controllers\AppBaseController;

use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

//eports and imports
// use App\Exports\YourExport;
// use App\Imports\YourImport;
//use Maatwebsite\Excel\Excel;

use Maatwebsite\Excel\Importer;
use Maatwebsite\Excel\Exporter;
use App\Modules\Membership\Imports\MemberDetailImport;
use Maatwebsite\Excel\HeadingRowImport;

/**
 * Class BulkMemberImportController
 * @package App\Modules\Membership\Http\Controllers\API
 * @group Membership
 */


 //UPDATE THIS CLASS TO CONTACT MANAGER CLASS
class BulkMemberImportAPIController extends AppBaseController
{

    private $bulkMemberImportRepository;


    /**
     * The import property
     */
    private $importer;



    public function __construct(BulkMemberImportRepository $bulkMemberImportRepo, Importer $importer)
    {
        $this->bulkMemberImportRepository = $bulkMemberImportRepo;
        $this->importer = $importer;
    }


    /**
     * @param CreateBulkMemberImportAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/bulkMemberImports",
     *      summary="Store a newly created BulkMemberImport in storage",
     *      tags={"BulkMemberImport"},
     *      description="Store BulkMemberImport",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BulkMemberImport that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BulkMemberImport")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/BulkMemberImport"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function import(CreateBulkMemberImportAPIRequest $request)
    {
        $batch = time();

        if( $request->file('import') )
        {
            $filename = $_FILES['import']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION); //get the extension

            try{

                //check the file format
                if( ! in_array( strtolower( $ext), BulkMemberImport::$allowedFileFormats ) )
                   throw new exception('Invalid file type. The file you are trying to import is not supported');

                    //import the file
                ( new MemberDetailImport(['member_type_id' => $request->member_type_id, 'branch_id' => $request->branch_id, 'batch' => $batch ]) )->import( request()->file('import'));

                return response()->json(['status' => 'success', 'message' => "Import succesful" ], 200);

            }
            catch ( \Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();

                $error = []; //should store the errors

                foreach ($failures as $failure) {
                    $row = $failure->row();
                    $col = $failure->attribute();

                    foreach ($failure->errors() as $err) {
                       $error[] =  "There was a problem on row $row, $err. Kindly reimport this sheet from row $row";
                    }
                }

                return $this->sendError($error);
            }
            catch( \Exception $e){
                //return $this->sendError("There was an error while trying to import this file!", 500);
                return $this->sendError($e->getMessage(), 500);
            }

        }
        else{
            return $this->sendError("No file selected for import.");
        }
    }


    /**
     * This would handle any export on the membership module
     * @ToDo
     * Create a request for this
     * set the export format - excel, PDF, csv, word
     */
    public function export()
    {

    }





}
