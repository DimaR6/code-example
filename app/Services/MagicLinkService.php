<?php

namespace App\Services;

use App\Repositories\MagicLinkRepository;

class MagicLinkService
{
    private $magicLinkRepository;

    public function __construct(MagicLinkRepository $magicLinkRepository)
    {
        $this->magicLinkRepository = $magicLinkRepository;
    }

    /**
     * Create a new magic link.
     *
     * @param array $data
     * @return \App\Models\MagicLink
     */
    public function createMagicLink(array $data)
    {
        return $this->magicLinkRepository->create($data);
    }
}
