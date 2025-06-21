<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMagicLinkRequest;
use App\Http\Requests\UpdateMagicLinkRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MagicLinkRepository;
use Illuminate\Http\Request;
use Flash;

class MagicLinkController extends AppBaseController
{
    /** @var MagicLinkRepository $magicLinkRepository*/
    private $magicLinkRepository;

    public function __construct(MagicLinkRepository $magicLinkRepo)
    {
        $this->magicLinkRepository = $magicLinkRepo;
    }

    /**
     * Display a listing of the MagicLink.
     */
    public function index(Request $request)
    {
        $magicLinks = $this->magicLinkRepository->paginate(10);

        return view('magic_links.index')
            ->with('magicLinks', $magicLinks);
    }

    /**
     * Show the form for creating a new MagicLink.
     */
    public function create()
    {
        return view('magic_links.create');
    }

    /**
     * Store a newly created MagicLink in storage.
     */
    public function store(CreateMagicLinkRequest $request)
    {
        $input = $request->all();

        $magicLink = $this->magicLinkRepository->create($input);

        Flash::success('Magic Link saved successfully.');

        return redirect(route('magicLinks.index'));
    }

    /**
     * Display the specified MagicLink.
     */
    public function show($id)
    {
        $magicLink = $this->magicLinkRepository->find($id);

        if (empty($magicLink)) {
            Flash::error('Magic Link not found');

            return redirect(route('magicLinks.index'));
        }

        return view('magic_links.show')->with('magicLink', $magicLink);
    }

    /**
     * Show the form for editing the specified MagicLink.
     */
    public function edit($id)
    {
        $magicLink = $this->magicLinkRepository->find($id);

        if (empty($magicLink)) {
            Flash::error('Magic Link not found');

            return redirect(route('magicLinks.index'));
        }

        return view('magic_links.edit')->with('magicLink', $magicLink);
    }

    /**
     * Update the specified MagicLink in storage.
     */
    public function update($id, UpdateMagicLinkRequest $request)
    {
        $magicLink = $this->magicLinkRepository->find($id);

        if (empty($magicLink)) {
            Flash::error('Magic Link not found');

            return redirect(route('magicLinks.index'));
        }

        $magicLink = $this->magicLinkRepository->update($request->all(), $id);

        Flash::success('Magic Link updated successfully.');

        return redirect(route('magicLinks.index'));
    }

    /**
     * Remove the specified MagicLink from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $magicLink = $this->magicLinkRepository->find($id);

        if (empty($magicLink)) {
            Flash::error('Magic Link not found');

            return redirect(route('magicLinks.index'));
        }

        $this->magicLinkRepository->delete($id);

        Flash::success('Magic Link deleted successfully.');

        return redirect(route('magicLinks.index'));
    }
}
