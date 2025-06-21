<?php

namespace App\Repositories;

use App\Models\LuckyDraw;
use App\Repositories\BaseRepository;

class LuckyDrawRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'random_number',
        'result',
        'win_amount'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return LuckyDraw::class;
    }
}
