<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBoholInfoRequest;
use App\Http\Requests\UpdateBoholInfoRequest;
use App\Repositories\BoholInfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BoholInfoController extends AppBaseController
{
    /** @var  BoholInfoRepository */
    private $boholInfoRepository;

    public function __construct(BoholInfoRepository $boholInfoRepo)
    {
        $this->boholInfoRepository = $boholInfoRepo;
    }

    /**
     * Display a listing of the BoholInfo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $boholInfos = $this->boholInfoRepository->all();

        return view('bohol_infos.index')
            ->with('boholInfos', $boholInfos);
    }

    /**
     * Show the form for creating a new BoholInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('bohol_infos.create');
    }

    /**
     * Store a newly created BoholInfo in storage.
     *
     * @param CreateBoholInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateBoholInfoRequest $request)
    {
        $input = $request->all();

        $boholInfo = $this->boholInfoRepository->create($input);

        Flash::success('Bohol Info saved successfully.');

        return redirect(route('boholInfos.index'));
    }

    /**
     * Display the specified BoholInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $boholInfo = $this->boholInfoRepository->find($id);

        if (empty($boholInfo)) {
            Flash::error('Bohol Info not found');

            return redirect(route('boholInfos.index'));
        }

        return view('bohol_infos.show')->with('boholInfo', $boholInfo);
    }

    /**
     * Show the form for editing the specified BoholInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $boholInfo = $this->boholInfoRepository->find($id);

        if (empty($boholInfo)) {
            Flash::error('Bohol Info not found');

            return redirect(route('boholInfos.index'));
        }

        return view('bohol_infos.edit')->with('boholInfo', $boholInfo);
    }

    /**
     * Update the specified BoholInfo in storage.
     *
     * @param int $id
     * @param UpdateBoholInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBoholInfoRequest $request)
    {
        $boholInfo = $this->boholInfoRepository->find($id);

        if (empty($boholInfo)) {
            Flash::error('Bohol Info not found');

            return redirect(route('boholInfos.index'));
        }

        $boholInfo = $this->boholInfoRepository->update($request->all(), $id);

        Flash::success('Bohol Info updated successfully.');

        return redirect(route('boholInfos.index'));
    }

    /**
     * Remove the specified BoholInfo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $boholInfo = $this->boholInfoRepository->find($id);

        if (empty($boholInfo)) {
            Flash::error('Bohol Info not found');

            return redirect(route('boholInfos.index'));
        }

        $this->boholInfoRepository->delete($id);

        Flash::success('Bohol Info deleted successfully.');

        return redirect(route('boholInfos.index'));
    }
}
