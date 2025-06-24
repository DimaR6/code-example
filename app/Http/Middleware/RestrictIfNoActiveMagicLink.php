<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\MagicLinkRepository;
use Flash;

class RestrictIfNoActiveMagicLink
{

    private $magicLinkRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MagicLinkRepository $magicLinkRepository)
    {
        $this->magicLinkRepository = $magicLinkRepository;
    }


    public function handle(Request $request, Closure $next)
    {
        $userId = Auth::id(); 

        $magicLink = $this->magicLinkRepository->getFirtsActiveMagicLinkByUserId($userId);

        $hashFromUrl = session('active_magic_link_hash');

        if (is_null($magicLink) || $magicLink->hash !== $hashFromUrl) {
            Flash::error('You should access the application through a valid magic link.');

            return redirect()->route('home');
        }

        return $next($request);
    }
}