<?php

namespace App\Modules\Assimilation\Http\Controllers;

use App\Modules\Assimilation\Http\Requests\CreateUnAssimilatedBucketRequest;
use App\Modules\Assimilation\Http\Requests\UpdateUnAssimilatedBucketRequest;
use App\Modules\Assimilation\Repositories\UnAssimilatedBucketRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UnAssimilatedBucketController extends AppBaseController
{
    /** @var  UnAssimilatedBucketRepository */
    private $unAssimilatedBucketRepository;

    public function __construct(UnAssimilatedBucketRepository $unAssimilatedBucketRepo)
    {
        $this->unAssimilatedBucketRepository = $unAssimilatedBucketRepo;
    }

    /**
     * Display a listing of the UnAssimilatedBucket.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->unAssimilatedBucketRepository->pushCriteria(new RequestCriteria($request));
        $unAssimilatedBuckets = $this->unAssimilatedBucketRepository->all();

        return view('un_assimilated_buckets.index')
            ->with('unAssimilatedBuckets', $unAssimilatedBuckets);
    }

    /**
     * Show the form for creating a new UnAssimilatedBucket.
     *
     * @return Response
     */
    public function create()
    {
        return view('un_assimilated_buckets.create');
    }

    /**
     * Store a newly created UnAssimilatedBucket in storage.
     *
     * @param CreateUnAssimilatedBucketRequest $request
     *
     * @return Response
     */
    public function store(CreateUnAssimilatedBucketRequest $request)
    {
        $input = $request->all();

        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->create($input);

        Flash::success('Un Assimilated Bucket saved successfully.');

        return redirect(route('unAssimilatedBuckets.index'));
    }

    /**
     * Display the specified UnAssimilatedBucket.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->findWithoutFail($id);

        if (empty($unAssimilatedBucket)) {
            Flash::error('Un Assimilated Bucket not found');

            return redirect(route('unAssimilatedBuckets.index'));
        }

        return view('un_assimilated_buckets.show')->with('unAssimilatedBucket', $unAssimilatedBucket);
    }

    /**
     * Show the form for editing the specified UnAssimilatedBucket.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->findWithoutFail($id);

        if (empty($unAssimilatedBucket)) {
            Flash::error('Un Assimilated Bucket not found');

            return redirect(route('unAssimilatedBuckets.index'));
        }

        return view('un_assimilated_buckets.edit')->with('unAssimilatedBucket', $unAssimilatedBucket);
    }

    /**
     * Update the specified UnAssimilatedBucket in storage.
     *
     * @param  int              $id
     * @param UpdateUnAssimilatedBucketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnAssimilatedBucketRequest $request)
    {
        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->findWithoutFail($id);

        if (empty($unAssimilatedBucket)) {
            Flash::error('Un Assimilated Bucket not found');

            return redirect(route('unAssimilatedBuckets.index'));
        }

        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->update($request->all(), $id);

        Flash::success('Un Assimilated Bucket updated successfully.');

        return redirect(route('unAssimilatedBuckets.index'));
    }

    /**
     * Remove the specified UnAssimilatedBucket from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->findWithoutFail($id);

        if (empty($unAssimilatedBucket)) {
            Flash::error('Un Assimilated Bucket not found');

            return redirect(route('unAssimilatedBuckets.index'));
        }

        $this->unAssimilatedBucketRepository->delete($id);

        Flash::success('Un Assimilated Bucket deleted successfully.');

        return redirect(route('unAssimilatedBuckets.index'));
    }
}
