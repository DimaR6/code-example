<?php

namespace App\Repositories;

use App\Models\MagicLink;
use App\Repositories\BaseRepository;

class MagicLinkRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'hash',
        'user_id',
        'expires_at',
        'is_active'
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
