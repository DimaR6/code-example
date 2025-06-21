<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLuckyDrawRequest;
use App\Http\Requests\UpdateLuckyDrawRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LuckyDrawRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;

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
        $luckyDraws = $this->luckyDrawRepository->latestThree(Auth::id());

        return view('lucky_draws.index', compact('luckyDraws'));
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
}
