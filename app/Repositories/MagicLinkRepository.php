<?php

namespace App\Repositories;

use App\Models\MagicLink;
use App\Repositories\BaseRepository;

class MagicLinkRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return MagicLink::class;
    }
}
