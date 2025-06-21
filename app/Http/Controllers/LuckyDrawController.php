<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLuckyDrawRequest;
use App\Http\Requests\UpdateLuckyDrawRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LuckyDrawRepository;
use Illuminate\Http\Request;
use Flash;

class LuckyDrawController extends AppBaseController
{
    /** @var LuckyDrawRepository $luckyDrawRepository*/
    private $luckyDrawRepository;

    public function __construct(LuckyDrawRepository $luckyDrawRepo)
    {
        $this->luckyDrawRepository = $luckyDrawRepo;
    }

    /**
     * Display a listing of the LuckyDraw.
     */
    public function index(Request $request)
    {
        $luckyDraws = $this->luckyDrawRepository->paginate(10);

        return view('lucky_draws.index')
            ->with('luckyDraws', $luckyDraws);
    }

    /**
     * Show the form for creating a new LuckyDraw.
     */
    public function create()
    {
        return view('lucky_draws.create');
    }

    /**
     * Store a newly created LuckyDraw in storage.
     */
    public function store(CreateLuckyDrawRequest $request)
    {
        $input = $request->all();

        $luckyDraw = $this->luckyDrawRepository->create($input);

        Flash::success('Lucky Draw saved successfully.');

        return redirect(route('luckyDraws.index'));
    }

    /**
     * Display the specified LuckyDraw.
     */
    public function show($id)
    {
        $luckyDraw = $this->luckyDrawRepository->find($id);

        if (empty($luckyDraw)) {
            Flash::error('Lucky Draw not found');

            return redirect(route('luckyDraws.index'));
        }

        return view('lucky_draws.show')->with('luckyDraw', $luckyDraw);
    }

    /**
     * Show the form for editing the specified LuckyDraw.
     */
    public function edit($id)
    {
        $luckyDraw = $this->luckyDrawRepository->find($id);

        if (empty($luckyDraw)) {
            Flash::error('Lucky Draw not found');

            return redirect(route('luckyDraws.index'));
        }

        return view('lucky_draws.edit')->with('luckyDraw', $luckyDraw);
    }

    /**
     * Update the specified LuckyDraw in storage.
     */
    public function update($id, UpdateLuckyDrawRequest $request)
    {
        $luckyDraw = $this->luckyDrawRepository->find($id);

        if (empty($luckyDraw)) {
            Flash::error('Lucky Draw not found');

            return redirect(route('luckyDraws.index'));
        }

        $luckyDraw = $this->luckyDrawRepository->update($request->all(), $id);

        Flash::success('Lucky Draw updated successfully.');

        return redirect(route('luckyDraws.index'));
    }

    /**
     * Remove the specified LuckyDraw from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $luckyDraw = $this->luckyDrawRepository->find($id);

        if (empty($luckyDraw)) {
            Flash::error('Lucky Draw not found');

            return redirect(route('luckyDraws.index'));
        }

        $this->luckyDrawRepository->delete($id);

        Flash::success('Lucky Draw deleted successfully.');

        return redirect(route('luckyDraws.index'));
    }
}
